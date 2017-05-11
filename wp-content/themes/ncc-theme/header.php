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
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link rel="apple-touch-icon" sizes="57x57" href="<?php echo esc_url( get_template_directory_uri() ); ?>/ico/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo esc_url( get_template_directory_uri() ); ?>/ico/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url( get_template_directory_uri() ); ?>/ico/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo esc_url( get_template_directory_uri() ); ?>/ico/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url( get_template_directory_uri() ); ?>/ico/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo esc_url( get_template_directory_uri() ); ?>/ico/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url( get_template_directory_uri() ); ?>/ico/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo esc_url( get_template_directory_uri() ); ?>/ico/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( get_template_directory_uri() ); ?>/ico/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() ); ?>/ico/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() ); ?>/ico/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() ); ?>/ico/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() ); ?>/ico/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="<?php echo esc_url( get_template_directory_uri() ); ?>/ico/manifest.json">
<link rel="mask-icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/ico/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/ico/favicon.ico">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="<?php echo esc_url( get_template_directory_uri() ); ?>/ico/mstile-144x144.png">
<meta name="msapplication-config" content="<?php echo esc_url( get_template_directory_uri() ); ?>/ico/browserconfig.xml">
<meta name="theme-color" content="#ffffff">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php //include_once("analyticstracking.php") ?>
<?php do_action( 'before' ); ?>


	<nav id="masthead" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
				</button>
	        			<?php if( get_header_image() != '' ) : ?>

					<div id="logo" class="navbar-brand">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" >
							<img class="img-responsive company-logo" src="<?php header_image(); ?>"  alt="<?php bloginfo( 'name' ); ?>"/>
						</a>
						<!-- <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> -->
					</div><!-- end of #logo -->

				<?php endif; // header image was removed ?>

				<?php if( !get_header_image() ) : ?>

					<div id="logo">
						<span class="site-name"><a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
					</div><!-- end of #logo -->

				<?php endif; // header image was removed (again) ?>

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
	<?php //get_template_part('index-feature-image'); ?>
<?php } ?>
<main id="main" class="site-main" role="main">