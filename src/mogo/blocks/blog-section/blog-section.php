<?php
/**
 * Blog Section Block template.
 *
 * @param array $block The block settings and attributes.
 *
 * @package mogo
 */

// Load values and assign defaults.
$top_title  = get_field( 'top_title' );
$main_title = get_field( 'main_title' );

$raw_latest_posts = get_posts(
	array(
		'numberposts' => 3,
		'order'       => 'DESC',
	)
);

$latest_posts = array_reverse( $raw_latest_posts );

// Support custom "anchor" values.
$anchor = 'blog';
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
	<?php if ( ! empty( $latest_posts ) ) : ?>
		<ul class="recent_list">
			<?php foreach ( $latest_posts as $latest_post ) : ?>
				<li class="recent_item">
					<article class="post">
						<div class="image_wrap blog_mod">
							<?php echo get_the_post_thumbnail( $latest_post, 'medium', array( 'class' => 'img blog_mod' ) ); ?>
						</div>
						<h2 class="post_title"><a href="<?php echo esc_attr( get_permalink( $latest_post ) ); ?>"
													class="post_link"><?php echo esc_html( get_the_title( $latest_post ) ); ?></a>
						</h2>
						<div class="post_text">
							<?php echo wp_kses_post( get_the_content( $latest_post ) ); ?>
						</div>
						<a href="<?php echo esc_attr( get_permalink( $latest_post ) ); ?>" class="post_date"><span
									class="post_d_day"><?php echo esc_html( get_the_date( 'd' ) ); ?></span><span
									class="post_d_month"><?php echo esc_html( get_the_date( 'M' ) ); ?></span></a>
						<div class="post_stat_wrap"><a href="#views" class="post_stat views_mod">123</a><a
									href="#comments"
									class="post_stat comm_mod">20</a>
						</div>
					</article>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</section>
