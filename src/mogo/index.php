<?php
/**
 * The main template file
 *
 * @package mogo
 */

get_header();
?>

	<div class="base">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<h1><?php single_post_title(); ?></h1>
				<?php
			endif;

			while ( have_posts() ) :
				the_post();
				the_content();
			endwhile;

			the_posts_navigation();

		else :

			echo 'No content';

		endif;
		?>

	</div>
<?php
get_footer();