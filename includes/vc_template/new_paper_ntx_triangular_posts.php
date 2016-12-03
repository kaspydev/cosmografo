<?php
global $new_paper_helper;
global $data;
$category = '';
$css = '';

$atts = $new_paper_helper->set_default('post_source', 'latest', $atts);
$atts = $new_paper_helper->set_default('title', esc_html__('Interesting Posts', 'new-paper') , $atts);
$atts = $new_paper_helper->set_default('enable_category', 'yes', $atts);

$atts = vc_map_get_attributes( 'new_paper_ntx_triangular_posts', $atts );
extract($atts);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$data = array(
    'enable_category'   => $enable_category,
    'enable_author'     => 'yes',
    'enable_date'       => 'yes',
    'title_words'       => 32
);

$query_args = array(
    'ignore_sticky_posts'	=> true,
    'meta_key'              => '_thumbnail_id',
    'category_name'         => $category,
    'posts_per_page'        => 3
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
        $counter = 1;

        while($custom_query->have_posts()){
            $custom_query->the_post();

            $image_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));

            if($counter == 1){
                $data['image_url']          = aq_resize($image_url, 714, 520, true, true, true); // X2
                $data['post_type']          = 'post-type-california';
                $data['enable_excerpt']     = 'yes';
                $data['author_size']        = 32;
                $data['excerpt_words']      = 240;
                $block_class                = 'col-md-8 col-sm-12 col-xs-12';
            }else{
                $data['image_url']          = aq_resize($image_url, 356, 240, true, true, true); // X2
                $data['post_type']          = '';
                $data['enable_excerpt']     = 'no';
                $data['author_size']        = 22;
                $block_class                = 'col-md-4 col-sm-6 col-xs-12';
            }

            if(in_array($counter, array(1, 2))){
                ?>
                <div class="<?php echo esc_attr($block_class) ?>">
                <?php
            }
                get_template_part('template-parts/content', 'newyork_style');

            if(in_array($counter, array(1, 3))){
                ?>
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






