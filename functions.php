<?php

if ( ! function_exists( 'eskil_child_theme_enqueue_scripts' ) ) {
	/**
	 * Function that enqueue theme's child style
	 */
	function eskil_child_theme_enqueue_scripts() {
		$main_style = 'eskil-main';

		wp_enqueue_style( 'eskil-child-style', get_stylesheet_directory_uri() . '/style.css', array( $main_style ) );
	}

	add_action( 'wp_enqueue_scripts', 'eskil_child_theme_enqueue_scripts' );
}
