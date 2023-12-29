<?php
/**
 * The header for our theme
 *
 * @package mogo
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<title>
		<?php echo esc_html( wp_get_document_title() ); ?>
	</title>
	<meta name="viewport" content="width=device-width"/>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="header">
	<div class="header_main_row">
		<h1 class="logo_wrap header_mod"><a href="<?php home_url(); ?>" class="logo_text header_mod">MoGo</a></h1>
	</div>
	<div class="menu_trigger_wrap">
		<div id="menu_trigger" class="menu_trigger"><span class="menu_trigger_decor"></span></div>
	</div>
	<?php
	wp_nav_menu(
		array(
			'theme_location'  => 'header_primary_menu',
			'container'       => 'nav',
			'container_class' => 'header_menu_row',
			'menu_id'         => 'header-primary-menu',
			'menu_class'      => 'header_menu_list',
			'add_li_class'    => 'header_menu_item',
			'add_link_class'  => 'header_menu_link',
		)
	);
	?>
</header>
<div class="wrapper">