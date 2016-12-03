<?php
global $new_paper_helper;
global $data;
$category = '';
$css = '';

$atts = $new_paper_helper->set_default('post_source', 'latest', $atts);
$atts = $new_paper_helper->set_default('layout', 5 , $atts);
$atts = $new_paper_helper->set_default('title', esc_html__('Recent News', 'new-paper') , $atts);

$atts = $new_paper_helper->set_default('enable_excerpt', 'yes', $atts);
$atts = $new_paper_helper->set_default('enable_category', 'yes', $atts);

$atts = vc_map_get_attributes( 'new_paper_ntx_recent_news', $atts );
extract($atts);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$data = array(
    'enable_category'   => $enable_category,
    'enable_excerpt'    => $enable_excerpt,
    'enable_author'     => 'yes',
    'enable_date'       => 'yes',
    'title_words'       => '',
    'excerpt_words'     => '',
    'post_type'         => '',
    'author_size'       => 32
);



$query_args = array(
    'ignore_sticky_posts'	=> true,
    'meta_key'              => '_thumbnail_id',
    'category_name'         => $category,
    'posts_per_page'        => $number_posts
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

        <div class="col-xs-12">
            <div class="custom-5cols">
                <div class="row">
                    <?php

                    while($custom_query->have_posts()){
                        $custom_query->the_post();

                        $image_url = wp_get_attachment_url(get_post_thumbnail_id());

                        if($layout == 5){

                            $image_url = aq_resize($image_url, 448, 616, true, true, true);
                            $class = 'five-cols';

                        }elseif($layout == 4){

                            $image_url = aq_resize($image_url, 570, 616, true, true, true);
                            $class = $new_paper_helper->get_col_value($layout);

                        }elseif($layout == 3){

                            $image_url = aq_resize($image_url, 774, 616, true, true, true);
                            $class = $new_paper_helper->get_col_value($layout);

                        }elseif($layout == 2){

                            $image_url = aq_resize($image_url, 1180, 616, true, true, true);
                            $class = $new_paper_helper->get_col_value($layout);

                        }

                        // transporting to florida part
                        $data['image_url'] = $image_url;
                        ?>

                        <div class="<?php echo esc_attr($class) ?>">

                            <?php get_template_part('template-parts/content', 'florida') ?>

                        </div>

                        <?php

                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php

}

?>




<?php
//resetting global data
$data = array();

wp_reset_postdata();





