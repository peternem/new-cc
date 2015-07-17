<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
                
get_header(); ?>
            
<?php if ( have_posts() ) : ?>
	<?php if( is_home() ) { ?>           

	<div class="nccIcon"><img src="/wp-content/uploads/2015/06/npcc-logo-temp-600x108.png" class="img-responsive"></div>
	<div class="locationArrow"><a id="learnMore" class="btn btn-primary btn-lg" href="#cta" role="button"><i class="fa fa-chevron-down"></i></a></div>
	<nav id="npcc-bottom-nav" class="navbar navbar-inverse over-vid" role="navigation">
	<?php 
	$args = array('theme_location' => 'secondary', 
		'container_class' => '', 
		'menu_class' => 'nav nav-justified aux-menu',
		'fallback_cb' => '',
		'menu_id' => '',
		'walker' => new Upbootwp_Walker_Nav_Menu()); 
	wp_nav_menu($args);
	?>
	</nav>
    <div class="inner-main">
		<?php get_template_part('index-hero-carousel'); ?>     
		<section id="cta" class="content-area container-fluid white cta">
		    <?php get_template_part('index-call-to-action'); ?>
		</section>
		<section id="aboutUs" class="content-area container-fluid white">
		    <?php get_template_part('index-about-us'); ?>
		</section>
		<section id="recent-work-web" class="content-area container-fluid grey">
		    <?php get_template_part('index-recent-web-carousel'); ?>
		</section>
		<section id="intro-about" class="content-area container-fluid white">
		    <?php get_template_part('index-about-site'); ?>
		</section>
		<section id="recent-work-print" class="content-area container-fluid grey">
		    <?php get_template_part('index-recent-print-carousel'); ?>
		</section>
	</div>

<?php } else { ?>
					
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part('content', get_post_format()); ?>
		<div id="intro-about" class="content-area container-fluid white">
			<?php get_sidebar('mp-footer'); ?>
		</div>
	<?php endwhile; ?>
	<?php upbootwp_content_nav('nav-below'); ?>
<?php } ?>
<?php else : ?>
	<?php get_template_part( 'no-results', 'index' ); ?>
<?php endif; ?>

<?php get_footer(); ?>