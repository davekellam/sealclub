<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Seal Club
 */

/**
 * Remove Jetpack widget styles
 */
function sealclub_remove_jetpack_styles() {
	wp_deregister_style( 'jetpack-widgets' ); // Widgets
}
add_action( 'wp_print_styles', 'sealclub_remove_jetpack_styles' );

/**
 * Remove Jetpack devicepx script
 */
function sealclub_remove_jetpack_devicepx() {
    wp_dequeue_script( 'devicepx' );
}
add_action( 'wp_enqueue_scripts', 'sealclub_remove_jetpack_devicepx' );