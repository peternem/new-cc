<section id="media" class="content-area container-fluid photo">
	<div class="jumbotron">

      <?php
      	$catName = "connect";
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
				<?php echo get_the_post_thumbnail($p->ID,'careers-featured-narrow', array('class' => "img-responsive fixed" )); ?>
				<div class="filter"></div>
				<div class="caption">
					<div class="inner-caption">
						<h1 class="entry-title"><?php echo $p->post_title; ?></h1>
						<?php if(function_exists('the_subtitle')) the_subtitle( '<p class="subtitle">', '</p>');?>
						<?php //echo apply_filters('the_content', $p->post_content); ?>
						<?php echo apply_filters('the_excerpt', $p->post_excerpt); ?>
					</div><!-- .inner-caption -->
				</div><!-- .caption -->
			<?php } ?>
		<?php } ?>
	</div><!-- .Jumbotron -->
	<div class="row">
		<div class="col-md-12">
			<h2 class="tile-title"><?php echo ucwords($catName); ?> Options</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 tile-container">
			<?php 
			foreach($my_posts as $pc) { ?>
				<?php if ($pc->post_name !== $catName ) { ?>
		 		<div class="tile">
					<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=175%C3%97175&w=175&h=175" class="img-responsive" />
					<div class="title"><a class="" role="button" title="<?php echo $pc->post_title; ?>" href="/<?php echo $pc->post_name; ?>"><?php echo $pc->post_title; ?><i class="fa fa-angle-double-right"></i></a></div>
				</div>
				<?php } ?>
			<?php } ?>
		</div><!-- .col-md-7 -->
	</div><!-- .row -->

	<?php 
// 		echo '<pre>';
// 		print_r($my_posts);
// 		echo '<pre>';
		?>
	<?php wp_reset_postdata(); ?>
</section>