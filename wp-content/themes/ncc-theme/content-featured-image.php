<!-- Page Featured Image
================================================== -->
<?php //the_post_thumbnail('careers-featured-narrow', array( 'class' => 'fixed img-responsive' )); ?>
<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'careers-featured-narrow', false,'');  ?>
<div class="parallax-container-single white" data-natural-height="768" data-natural-width="1920" data-image-src="<?php echo $src[0]; ?>" data-speed="0.2" data-bleed="10" data-parallax="scroll">
	<div class="filter"></div>
	<div class="caption">
		<header class="page-header">
			<h1 class="section-title"><?php the_title(); ?></h1>
			<?php if(function_exists('the_subtitle')) the_subtitle( '<h2 class="subtitle">', '</h2>');?>
		</header> 
	</div>
</div>