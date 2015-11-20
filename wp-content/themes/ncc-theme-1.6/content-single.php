<?php
/**
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
	<div class="col-md-12">
		<div class="entry-content">
			<?php the_content(); ?>
	            <?php
	            wp_link_pages( array(
	                'before' => '<div class="page-links">' . __( 'Pages:', 'upbootwp' ),
	                'after'  => '</div>',
	            ));
	            ?>
			<footer class="entry-meta ">
				<?php edit_post_link( __( '<i class="fa fa-pencil-square-o"></i> Edit', 'upbootwp' ), '', '' ); ?>
			</footer><!-- .entry-meta -->
		</div>
	</div>
</article><!-- #post-## -->
<?php
/* Restore original Post Data */
wp_reset_postdata();

?>