<?php
global $new_paper_helper;
global $data;
$category = '';
$css = '';

$atts = $new_paper_helper->set_default('post_source', 'latest', $atts);
$atts = $new_paper_helper->set_default('layout', 3 , $atts);
$atts = $new_paper_helper->set_default('title', esc_html__('Feature Articles', 'new-paper') , $atts);

$atts = $new_paper_helper->set_default('enable_category', 'yes', $atts);

$atts = vc_map_get_attributes( 'new_paper_ntx_features_articles', $atts );
extract($atts);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$data = array(
    'enable_category'   => $enable_category,
    'enable_excerpt'    => 'no',
    'enable_author'     => 'yes',
    'enable_date'       => 'yes',
    'title_words'       => 40,
    'excerpt_words'     => '',
    'post_type'         => '',
    'author_size'       => 22
);

if($layout == 3){
    $no_of_posts = 5;
}elseif($layout == 2){
    $no_of_posts = 4;
}

$query_args = array(
    'ignore_sticky_posts'	=> true,
    'meta_key'              => '_thumbnail_id',
    'category_name'         => $category,
    'posts_per_page'        => $no_of_posts
);

$custom_query = new WP_Query($query_args);

if($custom_query->have_posts()){

    ?>
    <div class="row <?php echo esc_attr($css_class) ?>">

        <div class="col-xs-12">
            <div class="main-title">
                <?php
                $title = $new_paper_helper->split_sentence($title);
                ?>
                <h4>
                    <strong><?php echo esc_html($title[0]) ?></strong> <?php echo esc_html($title[1]) ?>
                </h4>
            </div>
            <!-- end main-title -->
        </div>


        <?php

        if($layout == 3){
            $first_col_class = 'col-md-4 col-sm-6 col-xs-12';
            $second_col_class = 'col-md-5 col-sm-6 col-xs-12';
            $third_col_class = 'col-md-3 hidden-sm visible-xs visible-lg visible-md';
        }else{
            $first_col_class = 'col-md-5 col-sm-6';
            $second_col_class = 'col-md-7 col-sm-6';
        }

        $counter = 1;
        while($custom_query->have_posts()){
            $custom_query->the_post();

            /*First column*/
            if($counter == 1){

                $image_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));

                if($layout == 3){
                    $data['image_url'] = aq_resize($image_url, 774, 918, true, true, true); // X2
                }else{
                    $data['image_url'] = aq_resize($image_url, 976, 918, true, true, true); // X2
                }
                ?>

                <div class="<?php echo esc_attr($first_col_class) ?>">
                    <?php get_template_part('template-parts/content', 'kansas_style') ?>
                </div>
                <?php

            }elseif(in_array($counter, array(2,3,4))){  //second column

                $image_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));

                if($layout == 3){
                    $data['image_url'] = aq_resize($image_url, 458, 278, true, true, true); // X2
                }else{
                    $data['image_url'] = aq_resize($image_url, 662, 278, true, true, true); // X2
                }

                $data['enable_excerpt'] = 'no';

                // opening wrapper
                if($counter == 2){
                    ?><div class="<?php echo esc_attr($second_col_class) ?>"><?php
                }

                get_template_part('template-parts/content', 'newyork_style');

                // closing wrapper
                if($counter == 4){
                    ?></div><?php
                }

            }elseif($counter == 5){ // third column

                $image_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
                $data['image_url'] = aq_resize($image_url, 570, 680, true, true, true); // X2
                ?>

                <div class="<?php echo esc_attr($third_col_class) ?>">
                    <?php get_template_part('template-parts/content', 'kansas_style') ?>
                </div>
                <?php

            }

            $counter++;

        }

        ?>

    </div>
    <?php

}

?>




<?php
// reset custom global data
$data = array();
wp_reset_postdata();






