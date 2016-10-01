<?php
/**
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
?>
<!-- single-leadership -->
<article id="post-<?php the_ID(); ?>" <?php post_class('mp-row row'); ?>>
	<div class="col-md-7">
		<div class="entry-content">
			<header class="entry-header">
				<h1 class="section-title"><?php the_title(); ?></h1>
				<?php
				if(get_field('job_title')){
					echo '<h2>' . get_field('job_title') . '</h2>';
				}
				?>
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
		<?php the_post_thumbnail( 'people-featured-6x8', array( 'class' => 'img-responsive' ) ); ?>
	</div>
</article><!-- #post-## -->