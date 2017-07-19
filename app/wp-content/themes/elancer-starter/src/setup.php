<?php

/**
 * Theme assets
 */
add_action( 'wp_enqueue_scripts', function () {

	// TODO: Remove Line if no child theme
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

	wp_enqueue_style( 'elancer-team/fonts.css', elancerteam_fonts_url(), array(), null );

	wp_enqueue_style( 'elancer-team/main.css', get_stylesheet_directory_uri() . '/dist/styles/main.css',
		false, null );
	wp_enqueue_script( 'elancer-team/main.js', get_stylesheet_directory_uri() . '/dist/scripts/main.js',
		[ 'jquery' ], null, true );

}, 100 );

/**
 * Register custom fonts.
 */
function elancerteam_fonts_url() {
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Open Sans font: on or off', 'elancerteam' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Open Sans:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Theme setup
 */
add_action( 'after_setup_theme', function () {
	/**
	 * Enable features from Soil when plugin is activated
	 * @link https://roots.io/plugins/soil/
	 */
	add_theme_support( 'soil-clean-up' );
	add_theme_support( 'soil-disable-asset-versioning' );
	add_theme_support( 'soil-disable-trackbacks' );
	add_theme_support( 'soil-google-analytics', 'UA-XXXXXXXX-XX', 'wp_head' );
	add_theme_support( 'soil-jquery-cdn' );
	add_theme_support( 'soil-js-to-footer' );
	add_theme_support( 'soil-nav-walker' );
	add_theme_support( 'soil-nice-search' );
	add_theme_support( 'soil-relative-urls' );

	/**
	 * Enable plugins to manage the document title
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Enable post thumbnails
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * Enable HTML5 markup support
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
	 */
	add_theme_support( 'html5', [ 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ] );

	/**
	 * Enable selective refresh for widgets in customizer
	 * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
	 */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Use main stylesheet for visual editor
	 * @see assets/styles/layouts/_tinymce.scss
	 */
	add_editor_style( get_theme_file_uri( 'styles/main.css' ) );

	/**
	 * Disable Emoji
	 */
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
}, 20 );