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
		add_editor_style( 'style.css' );

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

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
endif;
add_action( 'wp_enqueue_scripts', 'agile_base_enqueue_assets' );

if ( ! function_exists( 'agile_base_preload_resources' ) ) :
	/**
	 * Preload the critical (latin, normal) Figtree font to speed up text LCP.
	 *
	 * Only the one face needed for first paint is preloaded; italic and
	 * latin-ext are left to download on demand via their unicode-range.
	 *
	 * @param array $resources Resources to preload.
	 * @return array
	 */
	function agile_base_preload_resources( $resources ): array {
		foreach ( array( 'figtree/figtree-latin', 'space-grotesk/space-grotesk-latin' ) as $font ) {
			$resources[] = array(
				'href'        => get_theme_file_uri( "assets/fonts/{$font}.woff2" ),
				'as'          => 'font',
				'type'        => 'font/woff2',
				'crossorigin' => 'anonymous',
			);
		}

		return $resources;
	}
endif;
add_filter( 'wp_preload_resources', 'agile_base_preload_resources' );
