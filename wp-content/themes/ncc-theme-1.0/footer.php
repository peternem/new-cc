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
</div><!-- page .container -->
<footer id="colophon" class="site-footer blog-footer" role="contentinfo">
	<div class="site-info">
		<?php do_action( 'upbootwp_credits' ); ?>
		&copy; <?php bloginfo('name'); ?> <?php the_time('Y') ?>
		<span class="sep"> | </span>
		<?php printf(__('Theme: %1$s by %2$s.', 'ImpTheme 3.0' ), 'ImpTheme 3.0', '<a href="'.get_site_url().'" rel="designer">mPeternell.net</a>'); ?>
		
	</div><!-- .site-info -->
</footer><!-- #colophon -->	
<?php wp_footer(); ?>
<!-- .site-info --><div class="scroll-to-top"><i class="fa fa-angle-up"></i></div><!-- .scroll-to-top -->

<?php if( is_home()) { ?>
<!-- BigVideo Dependencies -->
<script type="text/javascript" src="/wp-content/themes/ncc-theme-1.0/js/imagesloaded.pkgd.js"></script>
<script type="text/javascript" src="/wp-content/themes/ncc-theme-1.0/js/video.js"></script>
<script type="text/javascript" src="/wp-content/themes/ncc-theme-1.0/js/bigvideo.js"></script>

<!-- BigVideo -->

    <!-- <script type="text/javascript" src="/wp-content/themes/ncc-theme-1.0/js/backgroundVideo.min.js"></script> -->
    <script>

    // $(document).ready(function() {
        // $('#my-video').backgroundVideo({
            // pauseVideoOnViewLoss: false,
            // parallaxOptions: {
                // effect: 1,
                // offset: 60,
            // }
        // });
    // });
    </script>
<?php } ?>         
</body>
</html>