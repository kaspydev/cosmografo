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
    <section class="hide-until-load highlight-news mega-grids <?php echo esc_attr($css_class) ?>">
        <ul>
            <?php
            $counter = 1;
            while($hero_query->have_posts()){
                $hero_query->the_post();

                $first = '';
                $image_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));

                if($counter == 1){

                    $li_class     = 'bigger';
                    $data['image_url'] = aq_resize($image_url, 1214.5, 709.9, true, true, true); //X1.1

                }elseif( in_array($counter, array(2,3)) ){

                    $li_class     = '';
                    $data['image_url'] = aq_resize($image_url, 404.8, 708.4, true, true, true);

                }elseif( in_array($counter, array(4,5,7)) ){

                    $li_class     = '';
                    $data['image_url'] = aq_resize($image_url, 404.8, 419.1, true, true, true);

                }elseif($counter == 6 ){

                    $li_class     = 'big';
                    $data['image_url'] = aq_resize($image_url, 808.5, 418, true, true, true);

                }

                ?>
                <li class="<?php echo esc_attr($li_class) ?>">
                    <?php get_template_part('template-parts/content', 'kansas_style'); ?>
                </li>

                <?php
                $counter++;
            }

            ?>
        </ul>
    </section>

    <?php

}
?>

