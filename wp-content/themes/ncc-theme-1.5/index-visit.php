<section id="visit" class="content-area container-fluid photo">
	<div class="jumbotron">
	<?php  wp_reset_postdata(); ?>
	      <?php 
			$argsd = array(
					'post_type' 		=> 'post',
					'posts_per_page' 	=> -1,
					'category_name' 	=> 'visit',
					'order'             => 'ASC',
					'orderby'			=> 'title',
					'post_status' 		=> 'publish',
			);
			$my_posts = get_posts($argsd);
			foreach($my_posts as $p) { 
				if ($p->post_name == 'visit' ) { ?>
					<?php echo get_the_post_thumbnail($p->ID,'careers-featured-narrow', array('class' => "img-responsive fixed" )); ?>
					<div class="filter"></div>
					<div class="container-fluid caption">
						<h1 class="entry-title"><?php echo $p->post_title; ?></h1>
					<?php if(function_exists('the_subtitle')) the_subtitle( '<p class="subtitle">', '</p>');?>
					</div>
				<?php } ?>
			<?php } ?>
			<div class="btn-group-home">
			<?php 
			foreach($my_posts as $p) { ?>	
				<?php if ($p->post_name !== 'visit' ) { ?>
						<a  class="btn btn-primary btn-lg" role="button" title="<?php echo $p->post_title; ?>" href="<?php echo $p->post_name; ?>"><?php echo $p->post_title; ?></a>
				<?php } ?>
			<?php } ?>	
			</div>	
			<?php 
	// 		echo '<pre>';
	// 		print_r($my_posts);
	// 		echo '<pre>';
			?>
			<?php // wp_reset_postdata(); ?>
	</div>
</section>