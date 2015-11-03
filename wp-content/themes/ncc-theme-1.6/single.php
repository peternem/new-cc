<?php
/**
 * The Template for displaying all single posts.
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
get_header(); ?>
<?php get_template_part('content-featured-image'); ?>
<div class="breadcrumb-container">
    <?php if(function_exists('upbootwp_breadcrumbs')) upbootwp_breadcrumbs(); ?>
</div>
<div class="container-fluid white">
	<?php while ( have_posts() ) : the_post(); ?>
	    
		<?php 
                get_template_part( 'content', 'single' );
                ?>
	<?php endwhile; // end of the loop. ?>			

	<?php upbootwp_content_nav( 'nav-below' ); ?>
</div><!-- .container -->
<div class="breadcrumb-container">
    <?php if(function_exists('upbootwp_breadcrumbs')) upbootwp_breadcrumbs(); ?>
</div>
<?php get_footer(); ?>