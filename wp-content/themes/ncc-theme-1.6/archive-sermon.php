<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
get_header(); ?>
<div data-parallax="scroll" data-bleed="10" data-speed="0.2" data-image-src="/wp-content/uploads/2015/11/wood-bground-1-2500x1406-1920x768.jpg" data-natural-width="1920" data-natural-height="768" class="parallax-container-single white">
	<div class="filter"></div>
	<div class="caption">
		<header class="page-header">
			<h1 class="section-title">Sermons</h1>
		</header> 
	</div>
</div>
<div class="breadcrumb-container">
    <?php if(function_exists('upbootwp_breadcrumbs')) upbootwp_breadcrumbs(); ?>
</div>
<div class="container-fluid white">
<section class="content-area">
<?php 

$member_group_terms = get_terms( 'sermon-type' );	
// echo '<pre>';
// print_r($member_group_terms);
// echo '</pre>';
foreach ( $member_group_terms as $member_group_term ) {
	$member_group_query = new WP_Query( array(
		'order' => 'DESC',
		'posts_per_page' => -1,
		'post_type' => 'sermon',
		'post_status' => 'publish',
		'tax_query' => array(
			array(
				'taxonomy' => 'sermon-type',
				'field' => 'slug',
				'terms' => array( $member_group_term->slug ),
				'operator' => 'IN'
			)
		)
	) );
	?>
    <h2 class="text-center" id="<?php echo $stid = '#'.strtolower($member_group_term->name); ?>"><?php echo $st = strtolower($member_group_term->name); ?></h2>
    <div class="leadership-tables">
    <ul class="leadership-groups">
    <?php
    if ( $member_group_query->have_posts() ) : while ( $member_group_query->have_posts() ) : $member_group_query->the_post(); ?>
        <li>
        	<div class="portrait">
				<?php the_post_thumbnail( 'people-featured-6x8', array( 'class' => 'img-responsive' ) ); ?>
			</div>
			<div class="bio">
				<div><a href="<?php echo the_permalink(); ?>" title="<?php echo the_title(); ?>"><?php echo the_title(); ?></a><div>
				<?php
					if(get_field('job_title')) {
						echo '<div>' . get_field('job_title') . '</div>';
					}
				?>
			</div>
        </li>
    <?php endwhile; endif; ?>
    </ul>
    </div>
    <?php
    // Reset things, for good measure
    $member_group_query = null;
    wp_reset_postdata();
}
	?>
</section>
</div>
<?php get_footer(); ?>