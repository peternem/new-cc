<section id="media" class="content-area container-fluid white">
	<div class="row">
	<?php  wp_reset_postdata(); ?>
	      <?php 
			$argsd = array(
					'post_type' 		=> 'post',
					'posts_per_page' 	=> -1,
					'category_name' 	=> 'media',
					'order'             => 'ASC',
					'orderby'			=> 'title',
					'post_status' 		=> 'publish',
			);
			$my_posts = get_posts($argsd); ?>
			<div class="col-md-5">
			<?php 
			foreach($my_posts as $p) { 
				if ($p->post_name == 'media' ) { ?>
					<?php //echo get_the_post_thumbnail($p->ID,'careers-featured-narrow', array('class' => "img-responsive" )); ?>
<!-- 					<div class="filter"></div> -->
						<h1 class="entry-title"><?php echo $p->post_title; ?></h1>
					<?php if(function_exists('the_subtitle')) the_subtitle( '<p class="subtitle">', '</p>');?>
					<p><?php echo apply_filters('the_content', $p->post_content); ?></p>
					
				<?php } ?>
			<?php } ?>
			</div>
			<div class="col-md-7 text-center btn-links">
			<?php 
			foreach($my_posts as $p) { ?>	
				<?php if ($p->post_name !== 'media' ) { ?>
				
						<?php get_post_permalink(); ?>
						<a  class="btn btn-primary btn-lg" role="button" title="<?php echo $p->post_title; ?>" href="<?php echo $p->post_name; ?>"><?php echo $p->post_title; ?></a>
				<?php } ?>
			<?php } ?>	
			</div>	
			<?php 
// 			echo '<pre>';
// 			print_r($my_posts);
// 			echo '<pre>';
			?>
			<?php  wp_reset_postdata(); ?>
	</div>
</section>