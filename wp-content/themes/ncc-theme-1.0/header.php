<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!-- <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,600' rel='stylesheet' type='text/css'> -->
<?php wp_head(); ?>



<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo('template_url'); ?>/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('template_url'); ?>/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('template_url'); ?>/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php bloginfo('template_url'); ?>/ico/apple-touch-icon-57-precomposed.png">

<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/ico/favicon.png">
</head>

<body <?php body_class('text-overlay-example'); ?>>
<?php do_action( 'before' ); ?>


	<nav id="masthead" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
				</button>
	         <?php  $url = home_url(); ?> 
	            <!-- <a href="<?php //echo esc_url( home_url( '/' ) ); ?>" title="<?php //echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"  class="navbar-brand"><?php //bloginfo( 'name' ); ?></a> -->
	           <a href="<?php echo $url; ?>/" rel="home" class="navbar-brand"><img src="/wp-content/uploads/2015/06/npcc-logo-temp-300x54.png" class="img-responsive" alt="NPCC" Title="NPCC"></a>

			</div>
			
			<?php 
			$args = array('theme_location' => 'primary', 
						  'container_class' => 'navbar-collapse collapse', 
						  'menu_class' => 'nav navbar-nav navbar-right',
						  'fallback_cb' => '',
                          'menu_id' => 'main-menu',
                          'walker' => new Upbootwp_Walker_Nav_Menu()); 
			wp_nav_menu($args);
			?>
		</div><!-- container -->
	</nav>
<?php if( is_home() ) { ?>		
	<?php get_template_part('index-feature-image'); ?>
<?php } ?>
<main id="main" class="site-main content-overlay" role="main">