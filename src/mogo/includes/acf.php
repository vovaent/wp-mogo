<?php
/**
 *  ACF's functions and definitions
 *
 * @package Mogo
 */

if ( ! defined( 'ACF_PRO_PLUGIN_NAME' ) ) {
	define( 'ACF_PRO_PLUGIN_NAME', 'advanced-custom-fields-pro/acf.php' );
}

// Check if needed functions exists - if not, require them.
if ( ! function_exists( 'get_plugins' ) || ! function_exists( 'is_plugin_active' ) ) {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

/**
 * Custom admin notice
 *
 * @return void
 */
function mogo_acf_admin_notice(): void {
	global $pagenow;

	$error_message = 'Mogo Theme requires Advanced Custom Fields Pro plugin.';

	if ( 'plugins.php' !== $pagenow ) {
		$error_message .= ' <a href="' . network_admin_url( 'plugins.php' ) . '" rel="nofollow ugc">Go to Plugins page.</a>';
	}

	echo '<div class="notice notice-warning is-dismissible">
             <p>' . wp_kses_post( $error_message ) . '</p>
         </div>';
}

/**
 * We use WordPress's init hook to make sure
 * our blocks are registered early in the loading
 * process.
 *
 * @link https://developer.wordpress.org/reference/hooks/init/
 */
function mogo_register_acf_blocks(): void {
	$is_acf_pro_installed = mogo_check_plugin_installed( ACF_PRO_PLUGIN_NAME );
	$is_acf_pro_active    = mogo_check_plugin_active( ACF_PRO_PLUGIN_NAME );

	if ( ! $is_acf_pro_installed || ! $is_acf_pro_active ) {
		add_action( 'admin_notices', 'mogo_acf_admin_notice' );

		return;
	}

	register_block_type( get_template_directory() . '/blocks/hero-section' );
	register_block_type( get_template_directory() . '/blocks/about-section' );
	register_block_type( get_template_directory() . '/blocks/service-section' );
	register_block_type( get_template_directory() . '/blocks/what-section' );
	register_block_type( get_template_directory() . '/blocks/team-section' );
	register_block_type( get_template_directory() . '/blocks/testimonials-section' );
	register_block_type( get_template_directory() . '/blocks/blog-section' );
}

add_action( 'init', 'mogo_register_acf_blocks' );
