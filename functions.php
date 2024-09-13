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


if ( ! function_exists( 'eskil_elementor_display_header_footer' ) ) {
	/**
	 * Check whether to display header footer.
	 *
	 * @return bool
	 */
	function eskil_elementor_display_header_footer() {
		$eskil_elementor_header_footer = true;

		return apply_filters( 'eskil_elementor_header_footer', $eskil_elementor_header_footer );
	}
}

/**
 * Helper function to check if Header & Footer Experiment is Active/Inactive
 */
function eskil_header_footer_experiment_active() {
	// If Elementor is not active, return false
	if ( ! did_action( 'elementor/loaded' ) ) {
		return false;
	}
	// Backwards compat.
	if ( ! method_exists( \Elementor\Plugin::$instance->experiments, 'is_feature_active' ) ) {
		return false;
	}

	return (bool) ( \Elementor\Plugin::$instance->experiments->is_feature_active( 'hello-theme-header-footer' ) );
}
