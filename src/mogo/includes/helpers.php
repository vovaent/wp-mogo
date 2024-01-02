<?php
/**
 * Helpers
 *
 * @package Mogo
 */

/**
 * Check for empty values in the array.
 *
 * @param array|null $arr Array.
 *
 * @return bool
 */
function mogo_is_array_empty( array $arr = null ): bool {
	if ( ! $arr ) {
		return true;
	}

	$arr_filtered = array_filter(
		$arr,
		null,
	);

	return count( $arr ) !== count( $arr_filtered );
}

/**
 * Check if plugin is installed by getting all plugins from the plugins dir
 *
 * @param string $plugin_slug Plugin slug.
 *
 * @return bool
 */
function mogo_check_plugin_installed( string $plugin_slug ): bool {
	$installed_plugins = get_plugins();

	return array_key_exists( $plugin_slug, $installed_plugins ) ||
			in_array( $plugin_slug, $installed_plugins, true );
}

/**
 * Check if plugin is installed
 *
 * @param string $plugin_slug Plugin slug.
 *
 * @return bool
 */
function mogo_check_plugin_active( string $plugin_slug ): bool {
	return is_plugin_active( $plugin_slug );
}
