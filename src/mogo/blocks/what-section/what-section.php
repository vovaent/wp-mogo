<?php
/**
 * What Section Block template.
 *
 * @param array $block The block settings and attributes.
 *
 * @package mogo
 */

// Load values and assign defaults.
$top_title   = get_field( 'top_title' );
$main_title  = get_field( 'main_title' );
$description = get_field( 'description' );
$services    = get_field( 'services' );

// Support custom "anchor" values.
$anchor = 'what';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'section';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
?>

<section id="<?php echo esc_attr( $anchor ); ?>" class="<?php echo esc_attr( $class_name ); ?>">
	<h2 class="section_title"><span class="title1"><?php echo esc_html( $top_title ); ?></span><span
				class="title2"><?php echo esc_html( $main_title ); ?></span>
	</h2>
	<div class="section_descr">
		<?php echo wp_kses_post( $description ); ?>
	</div>
	<div class="what">
		<figure class="image_wrap what_mod">
			<?php
			echo wp_get_attachment_image( $services['image'], 'large', false, array( 'class' => 'img' ) );
			?>
		</figure>
		<?php if ( ! mogo_is_array_empty( $services['list'] ) ) : ?>
			<ul class="accordion">
				<?php foreach ( $services['list'] as $service ) : ?>
					<li class="accordion_item">
						<h3 class="accordion_title photo_mod"><?php echo esc_html( $service['title'] ); ?></h3>
						<div class="accordion_content">
							<?php echo wp_kses_post( $service['description'] ); ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>