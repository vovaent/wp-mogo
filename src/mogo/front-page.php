<?php
/**
 * The front page template file
 *
 * @package mogo
 */

get_header();
?>

	<div class="base">

		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				the_content();
			}
		}
		?>

	</div>

<?php
get_footer();