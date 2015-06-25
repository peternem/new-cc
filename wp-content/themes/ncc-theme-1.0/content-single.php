<?php
/**
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<div class="col-md-6">
			<header class="entry-header page-header">
				<h1 class="section-title"><?php the_title(); ?></h1>
				<?php if(function_exists('the_subtitle')) the_subtitle( '<p class="subtitle">', '</p>');?>
			</header><!-- .entry-header -->
		
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
		<?php
		// Advanced Custom Fieldset - Featurette
		if(get_field('image_right'))
		{
			echo '<div class="col-md-6"><img class="img-thumbnail" src="'.get_field('image_right').'"/></div>';
		}
		 
		?>

</article><!-- #post-## -->
