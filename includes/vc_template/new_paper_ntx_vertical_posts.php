<?php
global $new_paper_helper;
global $data;
$category = '';
$css = '';

$atts = $new_paper_helper->set_default('post_source', 'latest', $atts);
$atts = $new_paper_helper->set_default('no_of_posts', 2 , $atts);
$atts = $new_paper_helper->set_default('title', esc_html__('Latest Fashion Trends', 'new-paper') , $atts);

$atts = $new_paper_helper->set_default('enable_category', 'yes', $atts);

$atts = vc_map_get_attributes( 'new_paper_ntx_vertical_posts', $atts );
extract($atts);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$data = array(
    'enable_category'   => $enable_category,
    'enable_excerpt'    => 'yes',
    'enable_author'     => 'yes',
    'enable_date'       => 'yes',
    'title_words'       => 70,
    'excerpt_words'     => 175,
    'post_type'         => 'post-type-california',
    'author_size'       => 32
);

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
        $block_class = $new_paper_helper->get_col_value($no_of_posts);

        while($custom_query->have_posts()){
            $custom_query->the_post();

            $image_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));

            $data['image_url'] = aq_resize($image_url, 738, 414, true, true, true); // X2

            ?>
            <div class="col-xs-12">
                <?php get_template_part('template-parts/content', 'newyork_style') ?>
            </div>
            <?php


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






