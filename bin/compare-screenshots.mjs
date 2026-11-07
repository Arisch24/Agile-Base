#!/usr/bin/env node
/** Compare complete screenshot sets produced by check-frontend.mjs. */
import { existsSync, readdirSync, readFileSync } from 'node:fs';
import { resolve } from 'node:path';
import { fileURLToPath } from 'node:url';

const root = fileURLToPath(new URL('../build/checks/', import.meta.url));
const [a, b] = process.argv.slice(2);
if (!a || !b || ![a, b].every((label) => /^[a-zA-Z0-9_-]+$/.test(label))) {
  console.error('usage: node bin/compare-screenshots.mjs <labelA> <labelB>');
  process.exit(2);
}
const folder = (label) => resolve(root, label);
const names = (label) => existsSync(folder(label))
  ? readdirSync(folder(label)).filter((name) => name.endsWith('.png')).sort() : [];
const left = names(a);
const right = names(b);
const all = [...new Set([...left, ...right])].sort();
let differs = 0;
if (!all.length) {
  console.error('no screenshots to compare');
  process.exit(1);
}
for (const name of all) {
  if (!left.includes(name) || !right.includes(name) ||
      !readFileSync(resolve(folder(a), name)).equals(readFileSync(resolve(folder(b), name)))) {
    console.log(`differs ${name}`);
    differs++;
  }
}
console.log(differs ? `${differs} of ${all.length} screenshots differ` : `all ${all.length} screenshots identical`);
process.exitCode = differs ? 1 : 0;
