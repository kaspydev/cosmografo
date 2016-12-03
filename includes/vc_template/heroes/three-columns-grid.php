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
    <section class="hide-until-load highlight-news grids-3cols <?php echo esc_attr($css_class) ?>">
        <ul>
            <?php
            $counter = 1;
            while($hero_query->have_posts()){
                $hero_query->the_post();

                $first = '';
                $image_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));

                if($counter == 1){

                    $li_class     = 'big';
                    $data['image_url'] = aq_resize($image_url, 1194.7, 986, true, true, true); // X1.3

                }elseif( $counter == 2 ){

                    $li_class     = '';
                    $data['image_url'] = aq_resize($image_url, 598, 988, true, true, true); // X1.3

                }elseif( in_array($counter, array(3,4)) ){

                    $li_class     = '';
                    $data['image_url'] = aq_resize($image_url, 920, 760, true, true, true); // X2

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

