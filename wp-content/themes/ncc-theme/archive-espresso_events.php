<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
get_header();
?>
<div data-parallax="scroll" data-bleed="10" data-speed="0.2" data-image-src="/wp-content/uploads/2015/11/wood-bground-1-2500x1406-1920x768.jpg" data-natural-width="1920" data-natural-height="768" class="parallax-container-single white">
    <div class="filter"></div>
    <div class="caption">
        <header class="page-header">
            <h1 class="section-title">Our Events</h1>
        </header> 
    </div>
</div>
<div class="breadcrumb-container">
    <?php if (function_exists('upbootwp_breadcrumbs')) upbootwp_breadcrumbs(); ?>
</div>
<div class="">
    <section class="content-area container-fluid white">
        <?php
        $atts = array(
            'title' => NULL,
            'limit' => 100,
            'css_class' => NULL,
            'show_expired' => FALSE,
            'month' => NULL,
            'category_slug' => NULL,
            'order_by' => 'start_date',
            'sort' => 'ASC'
        );
        // run the query
        global $wp_query;
        $wp_query = new EE_Event_List_Query($atts);
        ?>
        <div class="sermon-tables">
            <h2 class="panel-heading text-center">Here is a list of our current events.</h2>
            <table class="panel-body">
                <thead>
                    <tr>
                        <th>Event</th>
                        <th>Date</th>
                        <th>Location</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <tr>
                                <td class="title">

                                    <?php if (has_post_thumbnail()): ?>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                            <?php the_post_thumbnail('thumbnail', array('class' => 'artwork')); ?>
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                            <img src="/wp-content/themes/ncc-theme/img/wood-bground-1-2500x1406-150x150.jpeg" class="artwork"/>
                                        </a>
                                    <?php endif; ?>

                                    <div class="title-content"><a role="link" title="Event Details" href="<?php the_permalink(); ?>" class="perma-link"><?php the_title(); ?></a>
                                        <?php
                                        the_excerpt();
                                        if ($pc->post_excerpt) {
                                            echo "<p class=\"truncate-175\">" . $pc->post_excerpt . "</p>";
                                        }
                                        ?>
                                    </div>
                                    </li>
                                </td>
                                <td class="date">
                                    <div class="listDate">
                                        <span class="start-date"> <?php espresso_event_date_range($date_format = 'M d, Y', $time_format = ' '); ?></span>
                                    </div>
                                </td>
                                <td class="time">
                                    <div class="listDate">
                                       <?php echo espresso_venue_name(); ?>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        endwhile;
                    endif;
                    ?>

                </tbody>
            </table>
            <?php
            wp_reset_query();
            wp_reset_postdata();
            ?>
        </div>
    </section>
    <?php
    $catName = "who-we-are";
    $argsd = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'category_name' => $catName,
        'order' => 'ASC',
        'orderby' => 'title',
        'post_status' => 'publish',
    );
    $my_posts = get_posts($argsd);
    foreach ($my_posts as $p) {
        if ($p->post_name == $catName) {
            ?>
            <section id="QuickLinks" class="cat-quick-links">
                <div class="container-fluid text-center">
                    <h1 class="entry-title"><?php echo $p->post_title; ?></h1>
                    <?php echo apply_filters('the_excerpt', $p->post_excerpt); ?>
                <?php } ?>
            <?php } ?>
            <ul>
                <?php foreach ($my_posts as $pc) { ?>
                    <?php if ($pc->post_name !== $catName) { ?>
                        <li><a class="btn btn-primary" role="button" title="<?php echo $pc->post_title; ?>" href="/<?php echo $pc->post_name; ?>"><?php echo $pc->post_title; ?></a></li>
                        <?php } ?>
                    <?php } ?>
            </ul>
            <?php wp_reset_postdata(); ?>
        </div>
    </section>
</div>
<?php get_footer(); ?>