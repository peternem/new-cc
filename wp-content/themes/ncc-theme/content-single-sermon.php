<?php
/**
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
?>
<!-- Content single Sermon -->
<article id="post-<?php the_ID(); ?>" <?php post_class('mp-row row'); ?>>
	<div class="col-md-7">
		<div class="entry-content">
			<header class="entry-header">
				<h1 class="section-title"><?php the_title(); ?></h1>
			</header> 
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
	<div class="col-md-5">
		<?php
		if(get_field('soundcloud_code')){
			echo get_field('soundcloud_code');
		}
		?>
	</div>
</article><!-- #post-## -->