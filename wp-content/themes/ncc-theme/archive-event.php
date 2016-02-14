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
			<h1 class="section-title">Our Events</h1>
		</header> 
	</div>
</div>
<div class="breadcrumb-container">
    <?php if(function_exists('upbootwp_breadcrumbs')) upbootwp_breadcrumbs(); ?>
</div>
<div class="">
<section class="content-area container-fluid white">
<?php 
$argsd = array(
		'post_type' 		=> 'event',
		'posts_per_page' 	=> -1,
		'category_name' 	=> $catName,
		'meta_key'		=> 'event_start_date',
		'orderby'			=> 'meta_value_num',
		'order'             => 'ASC',
		'post_status' 		=> 'publish',
);
$my_posts = get_posts($argsd);
?>
<div class="sermon-tables">
 <h2 class="panel-heading text-center">Here is a list of our current events.</h2>
    <table class="panel-body">
    	<thead>
    		<tr>
    		<th>Event</th>
            <th>Date</th>
             <th>Time</th>
        	</tr>
        </thead>
        <tbody>
<?php 
foreach($my_posts as $pc) { ?>
	<?php if ($pc->post_name !== $catName ) { ?>
	<tr>
        <td class="title">
        	<a role="link" title="<?php echo $pc->post_title; ?>" href="/<?php echo $pc->post_name; ?>"><?php echo $pc->post_title; ?></a></li>
		</td>
		<td class="date">
			<div class="listDate">
		<?php

		if(get_field('event_start_date')){
			$startDate = get_field('event_start_date', $pc->ID);
			$endDate = get_field('event_end_date', $pc->ID);
			
			$startUtc = date(strtotime($startDate));
			$endUtc = date(strtotime($endDate));
			
			$cleanStartDate = date("F d, Y", strtotime($startDate));
			echo "<em>". $cleanStartDate ."</em>";
			
			if ((!$endUtc == $startUtc) || ($endUtc > $startUtc))  {
				if ((!$endUtc < $startUtc)) {
					$cleanEndDate = date("F d, Y", strtotime($endDate));
					echo "<em> - ".$cleanEndDate."</em>";
				}
				
			}
		}
		?>
		<?php
		
		?></div>
		</td>
		<td class="time">
			<div class="listDate">
		<?php

		if(get_field('event_time')){
			echo "<em>". get_field('event_time', $pc->ID)."</em>";
		}
		?>
		<?php
		?></div>
		</td>
		</tr>
	<?php } ?>
<?php } ?>
    </tbody>
    </table>
<?php 
s
	?>
<?php wp_reset_postdata();  ?>
</div>
</section>
<?php
$catName = "who-we-are";
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
	<section id="QuickLinks" class="cat-quick-links">
		<div class="container-fluid text-center">
			<h1 class="entry-title"><?php echo $p->post_title; ?></h1>
			<?php echo apply_filters('the_excerpt', $p->post_excerpt); ?>
	<?php } ?>
<?php } ?>
<ul>
<?php 
foreach($my_posts as $pc) { ?>
	<?php if ($pc->post_name !== $catName ) { ?>
	<li><a class="btn btn-primary" role="button" title="<?php echo $pc->post_title; ?>" href="/<?php echo $pc->post_name; ?>"><?php echo $pc->post_title; ?></a></li>
	<?php } ?>
<?php } ?>
</ul>
<?php wp_reset_postdata(); ?>
	</div>
</section>
</div>
<?php get_footer(); ?>