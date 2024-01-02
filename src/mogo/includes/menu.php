<?php
/**
 * Menu modifictions
 *
 * @package Mogo
 */

/**
 * Adding additional classes to a menu item.
 *
 * @param string[] $classes Array of the CSS classes that are applied to the menu item's `<li>` element.
 * @param WP_Post  $menu_item The current menu item object.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 *
 * @return array
 */
function mogo_add_additional_class_on_li(
	array $classes,
	WP_Post $menu_item,
	stdClass $args
): array {
	if ( property_exists( $args, 'add_li_class' ) ) {
		$classes[] = $args->add_li_class;
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'mogo_add_additional_class_on_li', 1, 3 );

/**
 * Adding additional classes to a menu item link.
 *
 * @param array    $atts The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
 * @param WP_Post  $menu_item The current menu item object.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 *
 * @return array
 */
function mogo_add_additional_class_on_a(
	array $atts,
	WP_Post $menu_item,
	stdClass $args
): array {
	if ( property_exists( $args, 'add_link_class' ) ) {
		$atts['class'] = $args->add_link_class;
	}

	return $atts;
}

add_filter( 'nav_menu_link_attributes', 'mogo_add_additional_class_on_a', 1, 3 );
