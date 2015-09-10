<section id="grow" class="content-area container-fluid photo">
	<div class="jumbotron">
      <?php 
     	$catName =  get_cat_ID("grow");
		$argsd = array(
				'post_type' 		=> 'post',
				'posts_per_page' 	=> -1,
				'category__in' 		=>	array($catName ),
				'order'             => 'ASC',
				'orderby'			=> 'title',
				'post_status' 		=> 'publish',
		);
		$my_posts = get_posts($argsd);
			
	foreach($my_posts as $p) { 
		if ($p->post_name == 'grow' ) { ?>
			<?php echo get_the_post_thumbnail($p->ID,'careers-featured-narrow', array('class' => "img-responsive" )); ?>
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
	</div><!-- .jumbotron -->
	<div class="row">
		<div class="col-md-12">
			<h2 class="tile-title">Grow Options</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 tile-container">
		<?php 
		foreach($my_posts as $pc) { ?>
			<?php if ($pc->post_name !== 'grow' ) { ?>
		 		<div class="tile">
					<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=175%C3%97175&w=175&h=175" class="img-responsive" />
					<div class="title"><a class="" role="button" title="<?php echo $pc->post_title; ?>" href="/<?php echo $pc->post_name; ?>"><?php echo $pc->post_title; ?><i class="fa fa-angle-double-right"></i></a></div>
				</div>
			<?php } ?>
		<?php } ?>
		</div><!-- .col-md-12 -->
	</div><!-- .row -->
	<?php 
// 			echo '<pre>';
// 			print_r($my_posts);
// 			echo '<pre>';
			?>
	<?php  wp_reset_postdata(); ?>
</section>