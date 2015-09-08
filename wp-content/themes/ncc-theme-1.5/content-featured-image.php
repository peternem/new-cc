<!-- Page Featured Image
================================================== -->
<div class="jumbotron">
    <?php the_post_thumbnail('careers-featured-narrow', array( 'class' => 'img-responsive' )); ?>
    <div class="container">
        <h1 class="entry-title"><?php the_title(); ?></h1>  
        <p><?php if(function_exists('the_subtitle')) the_subtitle( '<p class="subtitle">', '</p>');?></p>
        <p><a class="btn btn-primary btn-sm" href="#" role="button">Learn more &raquo;</a></p>
    </div>
</div>