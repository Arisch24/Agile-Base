<?php
/**
 * Agile Base functions and definitions.
 *
 * @package Agile_Base
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'agile_base_setup' ) ) :
	/**
	 * Theme setup.
	 *
	 * @return void
	 */
	function agile_base_setup(): void {
		load_theme_textdomain( 'agile-base', get_template_directory() . '/languages' );

		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'editor-styles' );
		// Block styles are loaded on demand on the front end, which skips the
		// editor, so the per-block stylesheet is added to the editor here.
		add_editor_style( array( 'style.css', 'assets/styles/core-post-terms.css', 'assets/styles/legacy-presets.css' ) );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 100,
				'width'       => 400,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'agile_base_setup' );

if ( ! function_exists( 'agile_base_register_pattern_category' ) ) :
	/**
	 * Register the theme's block pattern category.
	 *
	 * @return void
	 */
	function agile_base_register_pattern_category(): void {
		register_block_pattern_category(
			'agile-base',
			array( 'label' => __( 'Agile Base', 'agile-base' ) )
		);
	}
endif;
add_action( 'init', 'agile_base_register_pattern_category' );

if ( ! function_exists( 'agile_base_enqueue_block_styles' ) ) :
	/**
	 * Load each assets/styles/core-<block>.css file only on pages that render
	 * that block. For example, core-post-terms.css is attached to core/post-terms.
	 *
	 * @return void
	 */
	function agile_base_enqueue_block_styles(): void {
		$files = glob( get_theme_file_path( 'assets/styles/core-*.css' ) );

		if ( ! $files ) {
			return;
		}

		foreach ( $files as $file ) {
			$filename = basename( $file, '.css' );

			wp_enqueue_block_style(
				preg_replace( '/^core-/', 'core/', $filename ),
				array(
					'handle' => "agile-base-block-{$filename}",
					'src'    => get_theme_file_uri( "assets/styles/{$filename}.css" ),
					'path'   => get_theme_file_path( "assets/styles/{$filename}.css" ),
					'ver'    => wp_get_theme()->get( 'Version' ),
				)
			);
		}
	}
endif;
add_action( 'init', 'agile_base_enqueue_block_styles' );

if ( ! function_exists( 'agile_base_register_block_styles' ) ) :
	/**
	 * Register block style variations.
	 *
	 * Tag lists are pills by default (assets/styles/core-post-terms.css).
	 * "Pill" is marked as the default so the Styles panel shows it selected,
	 * and "Plain" switches a Tags block back to WordPress's regular list.
	 *
	 * @return void
	 */
	function agile_base_register_block_styles(): void {
		register_block_style(
			'core/post-terms',
			array(
				'name'       => 'pill',
				'label'      => __( 'Pill', 'agile-base' ),
				'is_default' => true,
			)
		);

		register_block_style(
			'core/post-terms',
			array(
				'name'  => 'plain',
				'label' => __( 'Plain', 'agile-base' ),
			)
		);
	}
endif;
add_action( 'init', 'agile_base_register_block_styles' );

if ( ! function_exists( 'agile_base_enqueue_assets' ) ) :
	/**
	 * Enqueue front-end styles and scripts.
	 *
	 * @return void
	 */
	function agile_base_enqueue_assets(): void {
		wp_enqueue_style(
			'agile-base-style',
			get_stylesheet_uri(),
			array(),
			wp_get_theme()->get( 'Version' )
		);

		wp_enqueue_style(
			'agile-base-legacy-presets',
			get_theme_file_uri( 'assets/styles/legacy-presets.css' ),
			array(),
			wp_get_theme()->get( 'Version' )
		);

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
endif;
add_action( 'wp_enqueue_scripts', 'agile_base_enqueue_assets' );

if ( ! function_exists( 'agile_base_preload_resources' ) ) :
	/**
	 * Preload the first-paint font files (latin, normal style) of the body and
	 * display roles, but only while those roles still use the bundled families.
	 * A font preset, the System preset or Velocity points the roles elsewhere,
	 * and then nothing is preloaded that the page won't use.
	 *
	 * @param array $resources Resources to preload.
	 * @return array
	 */
	function agile_base_preload_resources( $resources ): array {
		$preloads = array(
			'body'    => array(
				'family' => 'Public Sans',
				'file'   => 'public-sans/public-sans-latin-wght-normal',
			),
			'display' => array(
				'family' => 'Archivo',
				'file'   => 'archivo/archivo-latin-wght-normal',
			),
		);

		// Later origins (the site's saved styles) override earlier ones (the theme).
		$families = array();
		foreach ( (array) wp_get_global_settings( array( 'typography', 'fontFamilies' ) ) as $origin_families ) {
			foreach ( (array) $origin_families as $family ) {
				$families[ $family['slug'] ] = $family['fontFamily'];
			}
		}
		$tokens = wp_get_global_settings( array( 'custom', 'font' ) );

		foreach ( $preloads as $role => $font ) {
			$slug = isset( $tokens[ $role ] ) && preg_match( '/--font-family--([a-z0-9-]+)\)$/', $tokens[ $role ], $matches ) ? $matches[1] : '';
			if ( isset( $families[ $slug ] ) && false !== strpos( $families[ $slug ], $font['family'] ) ) {
				$resources[] = array(
					'href'        => get_theme_file_uri( "assets/fonts/{$font['file']}.woff2" ),
					'as'          => 'font',
					'type'        => 'font/woff2',
					'crossorigin' => 'anonymous',
				);
			}
		}

		return $resources;
	}
endif;
add_filter( 'wp_preload_resources', 'agile_base_preload_resources' );

if ( ! function_exists( 'agile_base_query_ignore_sticky' ) ) :
	/**
	 * Keep sticky posts, in date order, in a Query Loop set to ignore stickiness (the
	 * Latest Posts sections). WordPress 6.8 added that setting; before it, core treats
	 * it as "exclude" and leaves sticky posts out.
	 *
	 * @param array    $query Query vars for the Query Loop.
	 * @param WP_Block $block The Post Template block.
	 * @return array
	 */
	function agile_base_query_ignore_sticky( $query, $block ): array {
		if ( is_wp_version_compatible( '6.8' ) || 'ignore' !== ( $block->context['query']['sticky'] ?? '' ) ) {
			return $query;
		}

		// Sticky posts the owner also excluded by hand stay excluded.
		$excluded = array_map( 'intval', (array) ( $block->context['query']['exclude'] ?? array() ) );
		$sticky   = array_diff( array_map( 'intval', (array) get_option( 'sticky_posts' ) ), $excluded );

		$query['post__not_in']        = array_values( array_diff( (array) ( $query['post__not_in'] ?? array() ), $sticky ) );
		$query['ignore_sticky_posts'] = 1;

		return $query;
	}
endif;
add_filter( 'query_loop_block_query_vars', 'agile_base_query_ignore_sticky', 10, 2 );
