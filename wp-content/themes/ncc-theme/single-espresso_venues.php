<?php
/**
 * The Template for displaying all single posts.
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
get_header();
?>
<!-- single-leadership -->
<div data-parallax="scroll" data-bleed="10" data-speed="0.2" data-image-src="/wp-content/uploads/2015/11/wood-bground-1-2500x1406.jpg" data-natural-width="1920" data-natural-height="768" class="parallax-container-single white">
    <div class="filter"></div>
    <div class="caption">
        <header class="page-header">
            <h1 class="section-title">Event: <?php the_title(); ?></h1>
        </header> 
    </div>
</div>
<div class="breadcrumb-container">
<?php if (function_exists('upbootwp_breadcrumbs')) upbootwp_breadcrumbs(); ?>
</div>
<div class="container sub_page espresso">
    <div class="row">
        <div id="primary" class="col-sm-8 col-md-8 content-area ">

                <?php if (have_posts()) : ?>

                    <?php while (have_posts()) : the_post(); ?>
                        <?php
                        /* Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        espresso_get_template_part( 'content', 'espresso_venues' );
                        ?>

                    <?php endwhile; ?>

                    <?php upbootwp_content_nav('nav-below'); ?>

                <?php else : ?>
                    <?php get_template_part('no-results', 'index'); ?>
                <?php endif; ?>
        </div><!-- .col-md-8 -->

        <div class="col-sm-4 col-md-4 widget-sidebar">
            <?php get_sidebar('events'); ?>
        </div><!-- .col-md-4 -->
    </div><!-- .row -->
</div><!-- .container -->
<section id="QuickLinks" class="cat-quick-links">
    <div class="container-fluid text-center">
        <h1 class="entry-title">Want To Learn About Other Events?</h1>
        <ul>
            <li><a class="btn btn-primary" role="button" title="Events" href="/events/">Return to Events</a></li>
        </ul>
    </div>
</section>
<?php get_footer(); ?>