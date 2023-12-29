<?php
/**
 * About Section Block template.
 *
 * @param array $block The block settings and attributes.
 *
 * @package mogo
 */

// Load values and assign defaults.
$top_title      = get_field( 'top_title' );
$main_title     = get_field( 'main_title' );
$description    = get_field( 'description' );
$selected_posts = get_field( 'posts' );
$facts          = get_field( 'facts' );

// Support custom "anchor" values.
$anchor = 'about';
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

	<?php if ( ! empty( $selected_posts ) ) : ?>
		<ul class="stories_list">
			<?php foreach ( $selected_posts as $selected_post ) : ?>
				<?php
				if ( mogo_is_array_empty( $selected_post ) ) {
					continue;
				}
				?>
				<li class="stories_l_item"><a href="<?php the_permalink( $selected_post['id'] ); ?>" class="image_link">
						<figure class="image_wrap effect1_mod">
							<?php echo get_the_post_thumbnail( $selected_post['id'], 'medium', array( 'class' => 'img' ) ); ?>
							<figcaption
									class="image_caption story_mod"><?php echo esc_html( get_the_title( $selected_post['id'] ) ); ?></figcaption>
						</figure>
					</a></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

	<?php if ( ! empty( $facts ) ) : ?>
		<ul class="facts_list">
			<?php foreach ( $facts as $fact ) : ?>
				<?php
				if ( mogo_is_array_empty( $fact ) ) {
					continue;
				}
				?>
				<li class="facts_l_item">
					<dl class="fact_block">
						<dt class="fact_text"><?php echo esc_html( $fact['description'] ); ?></dt>
						<dd class="fact_num"><?php echo esc_html( $fact['number'] ); ?></dd>
					</dl>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</section>
