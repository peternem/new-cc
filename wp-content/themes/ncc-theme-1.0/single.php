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
	<div id="primary" class="mp-row row">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
			    
				<?php 
                $PostTypeName =  get_post_type( get_the_ID() ); 
                
                if ($PostTypeName == "careers") {
                    get_template_part('content', 'single-career');
                } else {
                    get_template_part( 'content', 'single' );
                }
                ?>
			<?php endwhile; // end of the loop. ?>			
		</main><!-- #main -->
	</div><!-- #primary -->
	<div class="mp-row row">
		<?php upbootwp_content_nav( 'nav-below' ); ?>
	</div>
	
	<?php /* Global footer sidebar */ ?>
	<?php if ( ! is_404() ) : ?>
	<div class="mp-row row">
		<div id="footer-widgets" class="widget-area four">
			<?php if ( is_active_sidebar( 'sidebar-7' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-7' ); ?>
				
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'sidebar-8' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-8' ); ?>
				
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'sidebar-9' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-9' ); ?>
				
			<?php endif; ?>
		</div><!-- #footer-widgets -->
	</div>
	<?php endif; ?>

</div><!-- .container -->

<?php get_footer(); ?>