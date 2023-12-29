<?php
/**
 * Testimonials Section Block template.
 *
 * @param array $block The block settings and attributes.
 *
 * @package mogo
 */

// Load values and assign defaults.
$background_image_url = get_field( 'background_image_url' );
$top_title            = get_field( 'top_title' );
$main_title           = get_field( 'main_title' );
$clients              = get_field( 'clients' );

// Support custom "anchor" values.
$anchor = 'testimonials';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'section what_mod';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
?>

<?php if ( ! empty( $clients ) ) : ?>
	<section
			id="<?php echo esc_attr( $anchor ); ?>"
			class="<?php echo esc_attr( $class_name ); ?>"
			style="--testimonials-bg-image: url('<?php echo esc_attr( $background_image_url ); ?>')"
	>
		<h2 class="section_title"><span class="title1"><?php echo esc_html( $top_title ); ?></span><span
					class="title2"><?php echo esc_html( $main_title ); ?></span>
		</h2>
		<div class="clients">
			<?php foreach ( $clients as $client ) : ?>
				<div class="client_block">
					<div class="client_image">
						<?php echo get_the_post_thumbnail( $client, 'medium', array( 'class' => 'img' ) ); ?>
					</div>
					<div class="text_wrap">
						<div class="image_c_title"><?php echo esc_html( get_the_title( $client ) ); ?></div>
						<div class="image_c_text"><?php echo esc_html( get_field( 'position', $client ) ); ?></div>
						<div class="text">
							<?php echo wp_kses_post( get_the_content( '', '', $client ) ); ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
<?php endif; ?>