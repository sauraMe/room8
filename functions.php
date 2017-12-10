<?php
/**
 * Child theme functions
 *
 * Functions file for child theme, enqueues parent and child stylesheets by default.
 *
 * @since	1.0.0
 * @package aa
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'aa_enqueue_styles' ) ) {
	// Add enqueue function to the desired action.
	add_action( 'wp_enqueue_scripts', 'aa_enqueue_styles' );

	/**
	 * Enqueue Styles.
	 *
	 * Enqueue parent style and child styles where parent are the dependency
	 * for child styles so that parent styles always get enqueued first.
	 *
	 * @since 1.0.0
	 */
	function aa_enqueue_styles() {
		// Parent style variable.
		$parent_style = 'parent-style';

		// Enqueue Parent theme's stylesheet.
		wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

		// Enqueue Child theme's stylesheet.
		// Setting 'parent-style' as a dependency will ensure that the child theme stylesheet loads after it.
		wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );
	}
}

/* Para encolar fuentes http://www.wpbeginner.com/wp-themes/how-add-google-web-fonts-wordpress-themes/ */

function wpb_add_google_fonts() {

wp_enqueue_style( 'wpb-google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:700,400,300|Roboto:700,400,300', false );
}

add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

	/**
	 * Cambia los créditos al pie.
	 *
	 * Se ejecutará en el pie
	 *
	 * @since 2.0.0
	 */
function r8_cambia_creditos() {
		$my_theme = wp_get_theme( 'twentyten' );
		if ( $my_theme->exists() )
			echo $my_theme;
		echo '<a href="https://bitbucket.org/pepesaura/room8_child_theme">room8_child_theme</a>';
}

add_action('twentysixteen_credits', 'r8_cambia_creditos');

// Añadir aquí nuevas funciones
