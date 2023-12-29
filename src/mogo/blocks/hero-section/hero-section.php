<?php
/**
 * Hero Section Block template.
 *
 * @param array $block The block settings and attributes.
 * @package mogo
 */

// Load values and assign defaults.
$background_image_url = get_field( 'background_image_url' );
$top_title            = get_field( 'top_title' );
$main_title           = get_field( 'main_title' );

// Support custom "anchor" values.
$anchor = 'home';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'section intro_mod';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
?>

<section id="<?php echo esc_attr( $anchor ); ?>" class="<?php echo esc_attr( $class_name ); ?>"
		style="background-image: url(<?php echo esc_attr( $background_image_url ); ?>)">
	<h2 class="section_title intro_mod"><span class="title1 intro_mod"><?php echo esc_html( $top_title ); ?></span><span
				class="title2 intro_mod"><?php echo esc_html( $main_title ); ?></span>
	</h2>
</section>
