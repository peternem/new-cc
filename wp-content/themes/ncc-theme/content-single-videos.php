<?php
/**
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 0.1
 */
?>
<!-- single-leadership -->
<article id="post-<?php the_ID(); ?>" <?php post_class('mp-row row'); ?>>
    <div class="col-md-12">
        <div class="entry-content">
            <div class="video-list">
                <div class=" video-col-12">
                    <?php the_content(); ?>
                </div>
                <?php
                if (is_single('videos')) :
                    // check if the repeater field has rows of data
                    if (have_rows('video_repeater')): ?>
                        <?php
                        // loop through the rows of data
                        while (have_rows('video_repeater')) : the_row();
                            ?>
                            <div class=" video-col-4">
                            <?php echo the_sub_field('video'); ?>
                            </div>
                        <?php endwhile; ?>
                    <?php
                    else : ?>

                    <div class=" video-col-12">
                        <p>Stay tuned!  We are currently build this page to display all of our videos.</p>
                    </div>

                    <?php endif; 
                endif; ?>
            </div> 
            <?php
            wp_link_pages(array(
                'before' => '<div class="page-links">' . __('Pages:', 'upbootwp'),
                'after' => '</div>',
            ));
            ?>
            <footer class="entry-meta ">
<?php edit_post_link(__('<i class="fa fa-pencil-square-o"></i> Edit', 'upbootwp'), '', ''); ?>
            </footer><!-- .entry-meta -->
        </div>
    </div>
</article><!-- #post-## -->