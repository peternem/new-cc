<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
?>
</main><!-- #main -->
<footer id="globalFooter" class="blog-footer parallax-footer" role="contentinfo">
	<div class="container-fluid">
		<div class="row">
				<?php
				$footer_argsx = array (
						'theme_location' => 'footer_navigation',
						'container' => 'nav',
						'container_id' => 'footerNav',
						'container_class' => 'col-lg-12',
						'menu_class' => 'footer-nav-main',
						'depth' => '1',
						'walker' => new Footernav_Walker () 
				);
				wp_nav_menu ( $footer_argsx );
				?>
				<?php get_sidebar( '3col-footer' ); ?>
		</div>
	</div>	
	<div class="site-info">
		<?php do_action( 'upbootwp_credits' ); ?>
		&copy; <?php bloginfo('name'); ?> <?php the_time('Y') ?>
		<span class="sep"> | </span>
		<?php printf(__('Theme: %1$s by %2$s.', 'NPCC Theme 1.0' ), 'NPCC Theme 1.0', '<a href="http://mattpeternell.net" rel="designer">mattPeternell.net</a>'); ?>
		
	</div><!-- .site-info -->
</footer><!-- #colophon -->	
<?php wp_footer(); ?>
<!-- .site-info --><div class="scroll-to-top"><i class="fa fa-angle-up"></i></div><!-- .scroll-to-top -->
        
</body>
</html>