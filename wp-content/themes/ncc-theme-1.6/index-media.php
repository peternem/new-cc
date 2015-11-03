<?php
$catName = "media";
$argsd = array(
	'post_type' 		=> 'post',
	'posts_per_page' 	=> -1,
	'category_name' 	=> $catName,
	'order'             => 'ASC',
	'orderby'			=> 'title',
	'post_status' 		=> 'publish',
);
$my_posts = get_posts($argsd);
foreach($my_posts as $p) { 
	if ($p->post_name == $catName ) { ?>
	<section id="Media" class="parallax-container white" data-natural-height="1406" data-natural-width="2500" data-image-src="<?php echo $feat_image = wp_get_attachment_url( get_post_thumbnail_id($p->ID) ); ?>" data-speed="0.2" data-bleed="10" data-parallax="scroll" style="height: 611px;">
		<div class="title-desc-inner">
			<h1 class="entry-title"><?php echo $p->post_title; ?></h1>
			<?php echo apply_filters('the_excerpt', $p->post_excerpt); ?>
	<?php } ?>
<?php } ?>
<ul>
	<li><a class="btn btn-primary" role="button" title="Audio" href="#">Audio</a></li>
	<li><a class="btn btn-primary" role="button" title="Video" href="#">Video</a></li>
</ul>
<?php wp_reset_postdata(); ?>
	</div>
</section>