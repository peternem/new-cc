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
<?php
$categories = get_the_category();
$separator = ' ';
$output = '';
if($categories){
	foreach($categories as $category) {
		$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
	}
echo trim($output, $separator);
}
?>
<?php single_cat_title( '', true ); ?>
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
<?php

// The Query
$catName =  get_cat_ID($category->name);
$args = array(
// 		'post_type' => 'post',
// 		'posts_per_page' =>12,
// 		'orderby' => 'post_date',
// 		'order' => 'date' , //ASC//DESC
// 		'cat' => $catName

);
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
	echo '<ul>';
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		echo '<li>' . get_the_title() . '</li>';
	}
	echo '</ul>';
} else {
	// no posts found
}
/* Restore original Post Data */
wp_reset_postdata();