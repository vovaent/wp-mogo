<?php
/**
 * Team Section Block template.
 *
 * @param array $block The block settings and attributes.
 *
 * @package mogo
 */

// Load values and assign defaults.
$top_title   = get_field( 'top_title' );
$main_title  = get_field( 'main_title' );
$description = get_field( 'description' );
$members     = get_field( 'members' );

// Support custom "anchor" values.
$anchor = 'team';
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
	<?php if ( ! mogo_is_array_empty( $members ) ) : ?>
		<ul class="team_list">
			<?php foreach ( $members as $member ) : ?>
				<li class="team_l_item">
					<div class="teammate_block">
						<figure class="image_wrap effect1_mod">
							<?php
							echo get_the_post_thumbnail(
								$member['id'],
								'medium',
								array(
									'alt'   => get_the_title( $member['id'] ),
									'title' => get_the_title( $member['id'] ),
									'class' => 'img',
								)
							);
							?>
							<figcaption class="image_caption">
								<?php $member_soc_links = get_field( 'social_links', $member['id'] ); ?>
								<?php if ( ! mogo_is_array_empty( $member_soc_links ) ) : ?>
									<ul class="teammate_socials">
										<?php foreach ( $member_soc_links as $member_soc_link ) : ?>
											<li class="teammate_s_item">
												<a
														href="<?php echo esc_html( $member_soc_link['url'] ); ?>"
														class="teammate_s_link <?php echo esc_html( $member_soc_link['icon_name'] ); ?>_mod"
												></a>
											</li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
							</figcaption>
						</figure>
						<span class="image_c_title">Matthew Dix</span><span class="image_c_text">Graphic Design</span>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</section>
