<?php
/**
 * Service Section Block template.
 *
 * @param array $block The block settings and attributes.
 *
 * @package mogo
 */

// Load values and assign defaults.
$top_title  = get_field( 'top_title' );
$main_title = get_field( 'main_title' );
$services   = get_field( 'services' );

// Support custom "anchor" values.
$anchor = 'service';
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
	<?php if ( ! empty( $services ) ) : ?>
		<ul class="services_list">
			<?php foreach ( $services as $service ) : ?>
				<?php
				if ( mogo_is_array_empty( $service ) ) {
					continue;
				}
				?>
				<li class="services_l_item">
					<div class="service_block photo_mod"
						style="--icon-code: '<?php echo esc_html( ( $service['icon_code'] ) ); ?>'">
						<h3 class="service_title"><?php echo esc_html( ( $service['title'] ) ); ?></h3>
						<div class="service_text">
							<p><?php echo esc_html( ( $service['description'] ) ); ?></p>
						</div>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</section>