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
<section class="content-area">


			<?php
				if ( is_category() ) :
					//single_cat_title( '<h1 class="archive-title">', true, '</h1>');
					?>
					                            <div class="jumbotron">
                                <?php if (function_exists('z_taxonomy_image')){
                                $attr = array(
                                'class' => 'single-featured img-responsive category_image',
                                'alt' => 'image alt',
                                'title' => 'category title',
                                );
                                z_taxonomy_image(NULL, 'careers-featured', $attr); 
                                
                                } ?>  
                                <div class="container">  
                                    <h1 class="entry-title"><?php $singleCat = single_cat_title(); ?> </h1>
                                    <?php
                                    // Show an optional term description.
                                   $term_description = category_description( $category_id );
                                    if ( ! empty( $term_description ) ) :
                                        echo $term_description;
                                    endif;
                                    ?>
                                    <div class="jumbo-btn">
                                        <a class="btn btn-primary" href="#welcome" role="button">Learn more <i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
					<?php 
				elseif ( is_tag() ) :
					single_tag_title( '<h1 class="archive-title">', true, '</h1>');
				elseif (is_tax() ):
	                 single_tag_title();
				elseif ( is_author() ) :
					/* Queue the first post, that way we know
					 * what author we're dealing with (if that is the case).
					*/
					the_post();
					printf( __( '<h1 class="archive-title"> Author: %s', 'upbootwp' ), '<span class="vcard">' . get_the_author() . '</span></h1>' );
					/* Since we called the_post() above, we need to
					 * rewind the loop back to the beginning that way
					 * we can run the loop properly, in full.
					 */
					rewind_posts();
			
				elseif ( is_day() ) :
					printf( __( '<h1 class="archive-title">Day: %s', 'upbootwp' ), '<span>' . get_the_date() . '</span></h1>' );
				elseif ( is_month() ) :
					printf( __( '<h1 class="archive-title">Month: %s', 'upbootwp' ), '<span>' . get_the_date( 'F Y' ) . '</span></h1>' );
				elseif ( is_year() ) :
					printf( __( '<h1 class="archive-title">Year: %s', 'upbootwp' ), '<span>' . get_the_date( 'Y' ) . '</span></h1>' );
	                
	                	
				elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
					_e( 'Asides', 'upbootwp' );
			
				elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
					_e( 'Images', 'upbootwp');
			
				elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
					_e( 'Videos', 'upbootwp' );
			
				elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
					_e( 'Quotes', 'upbootwp' );
			
				elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
					_e( 'Links', 'upbootwp' );
			
				else :
					_e( '<h1 class="archive-title">Archives', 'upbootwp' . '</h1>');
			
				endif;
			?>
			
<!-- <header class="container-fluid page-title"> -->
<!-- 	<div class="mp-row row"> -->
<!-- 		<div class="row-title col-md-12">	 -->
<!-- 		</div> -->
<!-- 	</div> -->
<!-- </header> -->
<div class="breadcrumb-container">
    <?php if(function_exists('upbootwp_breadcrumbs')) upbootwp_breadcrumbs(); ?>
</div>
		<?php
		$postx_counter = 0;
		?>
		
		<?php 
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$current_cat = get_query_var('cat');
		$args=array(
				'category__in' => array($current_cat),
				'paged' => $paged
		);
		query_posts($args);
		
		?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php 
			$postx_counter++; 
			$pullGrid = "col-md-pull-6";
			$pushGrid = "col-md-push-6";
			?>
			
			<?php if ($postx_counter % 2) { 
				echo "<article class=\"container-fluid white\">"; 
			} else {
				echo "<article class=\"container-fluid grey\">";
			}
			?>
				
				<div class="mp-row row" data-post-count="<?php echo $postx_counter ?>">	
					<div class="col-md-6 col-lg-6 <?php if ($postx_counter % 2 == 0) {echo $pushGrid; } ?> tiles" >
						<div id="post-<?php the_ID(); ?>" class="abc">
							<header>
							
							<?php 
							if(get_field('category_archive')){ ?>
							<h1 class="section-title"><a href="<?php echo  get_field('category_archive'); ?>"><?php the_title(); ?></a>
							<?php } else { ?>
							<h1 class="section-title"><?php the_title(); ?></h1>
							<?php } ?>
							<?php if(function_exists('the_subtitle')) the_subtitle( '<p class="subtitle">', '</p>');?>	
							</header>
								<?php
								$posttags = get_the_tags();
								?>
								<?php
								if(get_the_tag_list()) {
								    echo get_the_tag_list('<div class="slide-txt"><ul class="tag_list"><li>',',</li><li>','</li></ul></div>');
								}
								?>
								
								<?php the_content(); ?>
								<?php 
								if(get_field('post_link')){ ?>
								<div class="link-group">
								<a id="post-<?php the_ID(); ?>" class="btn btn-primary" href="<?php echo  get_field('post_link'); ?>">Read More <i class="fa fa-angle-double-right"></i></a>
								</div>
								<?php 
								}
								?>

								<?php 
								if(get_field('category_archive')){ ?>
								<div class="link-group">
								<a class="btn btn-primary" href="<?php echo  get_field('category_archive'); ?>">Read More <i class="fa fa-angle-double-right"></i></a>
								</div>
								<?php 
								}
								?>
						
<?php
$category_id = get_query_var('cat');
$cat_title = strtolower (get_the_title());
$cat_url =  get_category_link( $category_id ).$cat_title;
?>	


<!-- <div class="link-group"> -->
<!-- <a class="btn btn-primary" href="<?php //echo $cat_url;?>" id="post-<?php //the_ID(); ?>">Learn More <i class="fa fa-angle-double-right"></i></a> -->
<!-- </div> -->
							<footer class="entry-meta ">
								<?php edit_post_link( __( '<i class="fa fa-pencil-square-o"></i> Edit', 'upbootwp' ), '', '' ); ?>
							</footer><!-- .entry-meta -->	
						</div>
					</div>
					<div class="col-md-6 col-lg-6 <?php if ($postx_counter % 2 == 0) {echo $pullGrid; }  ?>" >
					<?php 
						if ( has_post_thumbnail() ) {
							?>
							<a href="<?php the_permalink(); ?>">
							<?php 
							the_post_thumbnail('homepage-thumb-land', array('class'=>'img-thumbnail'));
							?>
							</a><?php 
						}
						?>
					</div>
				</div>
				</article>
				<?php set_query_var("cat",$current_cat); ?>
				<?php endwhile; else: ?>
				<article class="container-fluid white">
				<div class="mp-row row">
					<div class="col-md-12">
						<h2>Sorry, this Category, Tag, Post or Page does not exist yet!</h2>
					</div>
				</div>
				</article>
					
				<?php endif; ?>
	</div>
	
	<div class="mp-row row">
		<?php /* Global footer sidebar */ if ( ! is_404() ) : ?>
			<div id="footer-widgets" class="widget-area four">
				<?php if ( is_active_sidebar( 'sidebar-7' ) ) : ?>
					<?php dynamic_sidebar( 'sidebar-7' ); ?>				
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'sidebar-8' ) ) : ?>
					<?php dynamic_sidebar( 'sidebar-8' ); ?>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'sidebar-9' ) ) : ?>
					<?php dynamic_sidebar( 'sidebar-9' ); ?>	
				<?php endif; ?>
			</div><!-- #footer-widgets -->
		<?php endif; ?>
	</div>

	
</section>
<?php get_footer(); ?>