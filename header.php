<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package tumbleweeds2015
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0'>
<link rel="shortcut icon" type="image/ico" href="<?=_THEME_IMAGES;?>/favicon.ico" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" type="image/ico" href="/favicon.ico" />
<!-- Styles -->
<link href='http://fonts.googleapis.com/css?family=Vast+Shadow' rel='stylesheet' type='text/css'>
<script src="//use.edgefonts.net/bitter:n4,i4,n7.js"></script> 
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header class="wrapper-masthead"> 
		<nav class="nav-wrap nav-collapse">
			<?php wp_nav_menu(array('theme_location'  => 'primary',
									'container'       => 'div',
									'container_class' => 'nav-menu-basic-left',
									'container_id'    => 'basic-left',
									'menu_class'      => 'nav-basic-left container'
								) ); 
			?>
			<a class="nav-toggle-basic-left" data-nav-toggle="#basic-left" href="#">Menu</a>
			<div class="container"> <a class="logo logo-basic-left" href="<?=_HOME_URI;?>"><img src="<?=_THEME_IMAGES;?>/tw-logo.png" alt="The Tumbleweeds" /></a> </div>
		</nav>
	</header>

	<main id="main">        
		<div class="container">
		<!-- Content block, child page inject content -->
