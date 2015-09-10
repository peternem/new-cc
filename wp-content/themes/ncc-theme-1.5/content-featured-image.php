<!-- Page Featured Image
================================================== -->
<?php the_post_thumbnail('careers-featured-narrow', array( 'class' => 'fixed img-responsive' )); ?>
<div class="jumbotron">
    <div class="container">
       <header class="entry-header page-header">
				<h1 class="section-title"><?php the_title(); ?></h1>
				<?php if(function_exists('the_subtitle')) the_subtitle( '<p class="subtitle">', '</p>');?>
			</header>
        <?php the_content(); ?>
        <p><a class="btn btn-primary btn-sm" href="#" role="button">Learn more &raquo;</a></p>
        <footer class="entry-meta">
            <?php edit_post_link( __( '<i class="fa fa-pencil-square-o"></i> Edit Page', 'upbootwp' ), '<span class="edit-link">', '</span>' ); ?>
		</footer>
    </div>
</div>