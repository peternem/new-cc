<?php
/**
 * The Template for displaying all single posts.
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
get_header(); ?>
<!-- single -->
<?php get_template_part('content-featured-image'); ?>
<div class="breadcrumb-container">
    <?php if(function_exists('upbootwp_breadcrumbs')) upbootwp_breadcrumbs(); ?>
</div>
<div class="container-fluid white">
	<?php 
	while ( have_posts() ) : the_post();
		if(is_single( 'our-leadership' ) ) { 
			get_template_part( 'content', 'single-leadership' );
		} else {
			get_template_part( 'content', 'single' );
		}
	endwhile; // end of the loop. ?>			

	<?php //upbootwp_content_nav( 'nav-below' ); ?>
</div><!-- .container -->
<?php 

?>

<?php

$current_post_slug = basename(get_permalink());
$categories = get_the_category();
// echo '<pre>';
// print_r($categories);
// echo '</pre>';

foreach($categories as $c){
	$cat = get_category( $c );
	$cats[] = $cat->cat_ID ;
}
// echo '<pre>';
// print_r($cats);
// echo '</pre>';
$catName = $c->slug;
$argsd = array(
	'post_type' 		=> 'post',
	'posts_per_page' 	=> -1,
	//'category_name' 	=> $catName,
	'category__in' => $cats,
	'order'             => 'ASC',
	'orderby'			=> 'title',
	'post_status' 		=> 'publish',
);
$my_posts = get_posts($argsd);
foreach($my_posts as $p) { 
	if ($p->post_name == $catName  && $catName !== 'care') { ?>
	<section id="QuickLinks" class="cat-quick-links">
		<div class="container-fluid text-center">
			<h1 class="entry-title"><?php echo $p->post_title; ?></h1>
			<?php echo apply_filters('the_excerpt', $p->post_excerpt); ?>
	<?php } ?>
<?php } ?>
<ul>
<?php if ($catName == "who-we-are") { ?>
	<li><a class="btn btn-primary" role="button" title="Leadership" href="/leadership/">Leadership</a></li>
	<?php } ?>
<?php 
foreach($my_posts as $pc) { ?>
	<?php if ($pc->post_name !== $catName && $pc->post_name !== $current_post_slug) { ?>
	<li><a class="btn btn-primary" role="button" title="<?php echo $pc->post_title; ?>" href="/<?php echo $pc->post_name; ?>"><?php echo $pc->post_title; ?></a></li>
	<?php } ?>
<?php } ?>
</ul>
<?php wp_reset_postdata(); ?>
	</div>
</section>
<?php get_footer(); ?>