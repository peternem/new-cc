<?php
/**
 * Template Name: Espresso Events
 * The template used for displaying page content in page.php
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
                        get_template_part('content', get_post_format());
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
<?php get_footer(); ?>