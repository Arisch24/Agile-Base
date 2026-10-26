#!/usr/bin/env node
/**
 * Bundle a Fontsource font in the theme: copy its latin and latin-ext woff2
 * files and its OFL license into assets/fonts/, then print the theme.json
 * fontFamilies entry and the readme.txt credit to paste in.
 *
 * Usage: node bin/add-font.mjs <package> [--weights 400,700] [--styles normal,italic] [--fallback "<css stack>"]
 *   <package>   @fontsource-variable/<id> (preferred: one file per subset) or @fontsource/<id>
 *   --weights   static fonts only: the weights to bundle (default 400,700)
 *   --styles    default: normal
 *   --fallback  CSS fallback stack (default: from the font's category)
 */
import { execFileSync } from 'node:child_process';
import { copyFileSync, existsSync, mkdirSync, mkdtempSync, readFileSync, rmSync } from 'node:fs';
import { tmpdir } from 'node:os';
import { join } from 'node:path';
import { fileURLToPath } from 'node:url';

const ROOT = fileURLToPath(new URL('..', import.meta.url));
const args = process.argv.slice(2);
const option = (name, fallback) => {
  const at = args.indexOf(`--${name}`);
  return at >= 0 ? args.splice(at, 2)[1] : fallback;
};
const weights = option('weights', '400,700').split(',');
const styles = option('styles', 'normal').split(',');
const fallbackOption = option('fallback', null);
const [pkg] = args;
if (!pkg) {
  console.error('usage: node bin/add-font.mjs <@fontsource-variable/id | @fontsource/id> [--weights …] [--styles …] [--fallback …]');
  process.exit(2);
}

const SUBSETS = ['latin', 'latin-ext'];
const FALLBACKS = {
  'sans-serif': 'sans-serif',
  serif: 'serif',
  monospace: "ui-monospace, 'SFMono-Regular', Menlo, monospace",
  display: 'sans-serif',
  handwriting: 'cursive',
};

const tmp = mkdtempSync(join(tmpdir(), 'agile-base-font-'));
try {
  const tarball = execFileSync('npm', ['pack', pkg, '--silent', '--pack-destination', tmp], { encoding: 'utf8' }).trim().split('\n').pop();
  execFileSync('tar', ['-xzf', join(tmp, tarball), '-C', tmp]);
  const dir = join(tmp, 'package');
  const meta = JSON.parse(readFileSync(join(dir, 'metadata.json'), 'utf8'));
  if (meta.license?.type !== 'OFL-1.1') throw new Error(`${pkg} is ${meta.license?.type}; only OFL-1.1 fonts are bundled`);
  const ranges = JSON.parse(readFileSync(join(dir, 'unicode.json'), 'utf8'));
  const variable = Boolean(meta.variable && meta.variable.wght);
  const out = `assets/fonts/${meta.id}`;
  mkdirSync(join(ROOT, out), { recursive: true });

  const faces = [];
  for (const style of styles) {
    for (const subset of SUBSETS.filter((s) => meta.subsets.includes(s))) {
      for (const weight of variable ? ['wght'] : weights) {
        const file = `${meta.id}-${subset}-${weight}-${style}.woff2`;
        if (!existsSync(join(dir, 'files', file))) throw new Error(`${pkg} has no ${file}`);
        copyFileSync(join(dir, 'files', file), join(ROOT, out, file));
        faces.push({
          fontFamily: meta.family,
          fontStyle: style,
          fontWeight: variable ? `${meta.variable.wght.min} ${meta.variable.wght.max}` : weight,
          fontDisplay: 'swap',
          src: [`file:./${out}/${file}`],
          unicodeRange: ranges[subset],
        });
      }
    }
  }
  const licenseFile = `assets/fonts/OFL-${meta.family.replace(/\s+/g, '-')}.txt`;
  copyFileSync(join(dir, 'LICENSE'), join(ROOT, licenseFile));

  const fallback = fallbackOption || FALLBACKS[meta.category] || 'sans-serif';
  const entry = { name: meta.family, slug: meta.id, fontFamily: `'${meta.family}', ${fallback}`, fontFace: faces };
  const [, year, authors, source] = meta.license.attribution.match(/Copyright (\d{4}) (.+?) \((https?:\/\/[^)]+)\)/) || [];
  console.log(`theme.json settings.typography.fontFamilies entry:\n\n${JSON.stringify(entry, null, '\t')}\n`);
  console.log(`readme.txt "== Resources ==" entry:\n
${meta.family} font, Copyright ${year} ${authors}
* Source: ${source}
* License: SIL Open Font License, 1.1
* License URI: https://scripts.sil.org/OFL
* License bundled at: ${licenseFile}\n`);
  console.log(`Copied ${faces.length} file(s) to ${out}/ and the license to ${licenseFile}.`);
} finally {
  rmSync(tmp, { recursive: true, force: true });
}
