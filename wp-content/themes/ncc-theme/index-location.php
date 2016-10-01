<section id="ServiceTimesAndLocations" class="parallax-container black">

    <div class="title-desc-inner">
        <?php
        $catName = "times-and-locations";
        $argst = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'category_name' => $catName,
            'order' => 'ASC',
            'orderby' => 'title',
            'post_status' => 'publish',
        );
        $my_postsx = get_posts($argst);
        foreach ($my_postsx as $p) {
            if ($p->post_name == $catName) {
                ?>
                <h1 class="entry-title"><?php echo $p->post_title; ?></h1>
                <?php echo apply_filters('the_excerpt', $p->post_excerpt); ?>
                <?php echo apply_filters('the_content', $p->post_content); ?>
            <?php } ?>
        <?php } ?>
        <a class="btn btn-primary" role="button" href="https://www.google.com/maps/place/12800+Coal+Creek+Pkwy+SE,+Bellevue,+WA+98006/@47.5647848,-122.1722837,17z/data=!3m1!4b1!4m2!3m1!1s0x5490694fb572e6e1:0xadd0d4b13ced88cb" target="_blank">Google Maps</a>
        <?php foreach ($my_postsx as $pc) { ?>
            <?php if ($pc->post_name !== $catName) { ?>
                <a class="btn btn-primary" role="button" title="<?php echo $pc->post_title; ?>" href="/<?php echo $pc->post_name; ?>/"><?php echo $pc->post_title; ?></a>
            <?php } ?>
        <?php } ?>
        <?php wp_reset_postdata(); ?>
    </div>
</section>
