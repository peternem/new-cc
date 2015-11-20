<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
                
get_header(); ?>
            
<?php if ( have_posts() ) : ?>
	<?php if( is_home() ) { ?>           
	<!-- Carousel  -->
	<section id="Carousel" class="parallax-container white opacity hero" data-natural-height="1406" data-natural-width="2500" data-image-src="/wp-content/uploads/2015/11/iStock_000009624367_Large-2500x-100.jpg" data-speed="0.2" data-bleed="10" data-parallax="scroll" style="height: 750px;">
		<ul class="list-group spotlight map">
			<li class="list-group-item">
				<div class="badge"><a id="mapLink" href="#"><i class="fa fa-map-o"></i></a></div>
				<div class="list-content">
					<p><a href="https://www.google.com/maps/place/12800+Coal+Creek+Pkwy+SE,+Bellevue,+WA+98006/@47.5647848,-122.1722837,17z/data=!3m1!4b1!4m2!3m1!1s0x5490694fb572e6e1:0xadd0d4b13ced88cb" target="_blank">Get Directions to<br>Newport Covenant Church</a></p> 
				</div>
			</li>
		</ul>
		<ul class="list-group spotlight contact">
			<li class="list-group-item">
				<div class="badge"><a id="contactLink" href="#"><i class="fa fa-envelope-o"></i></a></div>
				<div class="list-content">
					<p><a href="/contact/" target="_blank">Contact Us</a></p> 
				</div>
			</li>
		</ul>		
		<div class="title-desc-inner">
			<h1 class="entry-title">Hello!</h1>
			<p class="excerpt">Loving people to new life</p>
			<ul>
				
				<li><a class="btn btn-primary" role="button" title="Video" href="#WhoWeAre">Learn More</a></li>
				<li><a class="btn btn-default" role="button" title="Audio" href="#ServiceTimesAndLocations">Visit Us</a></li>
				<li><a class="btn btn-primary" role="button" title="Audio" href="#Events">Events</a></li>
			</ul>
		</div>
	</section>
	<!-- Service Times and Locations   -->
	<?php get_template_part('index-location'); ?>
	<!-- Who We Are   -->
	<?php get_template_part('index-who-we-are'); ?>
	<!-- Care -->
	<?php get_template_part('index-care'); ?>
	<!-- Get Conected -->
	<?php get_template_part('index-get-connected'); ?>
	<!-- Events -->
	<?php get_template_part('index-events'); ?>
	<!-- Media -->
	<?php get_template_part('index-media'); ?>
	<!-- Giving-->
	<?php get_template_part('index-giving'); ?>
	</section>
	<!-- Pre-School -->
	<?php get_template_part('index-pre-school'); ?>
<?php } else { ?>
					
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part('content', get_post_format()); ?>
		<div id="intro-about" class="content-area container-fluid white">
			<?php get_sidebar('mp-footer'); ?>
		</div>
	<?php endwhile; ?>
	<?php upbootwp_content_nav('nav-below'); ?>
<?php } ?>
<?php else : ?>
	<?php get_template_part( 'no-results', 'index' ); ?>
<?php endif; ?>

<?php get_footer(); ?>