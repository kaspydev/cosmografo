<?php
global $data;

?>
<div class="loading">
    <img src="<?php echo get_template_directory_uri();?>/assets/images/loading.gif">
</div>
<?php

// Transport data
$data = array(
    'enable_category' => $enable_category
);

if($hero_query->have_posts()){

    ?>
    <section class="hide-until-load highlight-news carousel-4col <?php echo esc_attr($css_class) ?>">

        <?php
        while($hero_query->have_posts()){
            $hero_query->the_post();

            $first = '';
            $image_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
            $data['image_url'] = aq_resize($image_url, 598, 811.2, true, true, true); //X1.3

            ?>
            <div class="news">
                <?php get_template_part('template-parts/content', 'kansas_style'); ?>
            </div>

            <?php
        }

        ?>

    </section>
    <?php

}
?>

