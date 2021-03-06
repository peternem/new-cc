<?php
$catName = "give";
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
        <section id="Giving" class="parallax-container white opacity" data-natural-height="1400" data-natural-width="2500" data-image-src="<?php echo $feat_image = wp_get_attachment_url(get_post_thumbnail_id($p->ID)); ?>" data-speed="0.2" data-bleed="10" data-parallax="scroll" style="height: 611px;">
            <div class="title-desc-inner">
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
            <!--            <li>
                            <a class="btn btn-default" href="https://newportcov.givingfuel.com/tithe" title="Giving Fuel" role="button" target="_blank">Donate</a>
                        </li>-->
        </ul>
        <h2 class="sub-title">Newport Covenant Church Donation Links</h2>
        <ul>
            <li>
                <a class="btn btn-default" href="https://newportcov.givingfuel.com/tithe" title="Tithe" role="button" target="_blank">Donate</a>
            </li>
            <li>
                <a class="btn btn-default" href="https://newportcov.givingfuel.com/benevolence-giving" title="Benevolence" role="button" target="_blank">Benevolence</a>
            </li>
            <li>
                <a class="btn btn-default" href="https://newportcov.givingfuel.com/youth-mission-trips" title="Youth Mission Trips" role="button" target="_blank">Youth</a>
            </li>
        </ul>
        <?php wp_reset_postdata(); ?>
    </div>
</section>