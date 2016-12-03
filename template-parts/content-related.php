<?php
global $new_paper_helper;
global $data;

$data = array(
    'enable_category'   => 'yes',
    'enable_excerpt'    => 'no'
);

$related_posts = $new_paper_helper->related_post(get_the_ID());

if(count($related_posts)){
    if(function_exists('ot_get_option')){
        $orientation = ot_get_option('related_post_orientation', 'horizontal');
    }else{
        $orientation = 'horizontal';
    }
    ?>
    <div class="related-articles">

        <div class="row">

            <div class="col-xs-12">
                <div class="main-title">
                    <h4>
                        <strong><?php esc_html_e('Related', 'new-paper')?></strong>
                        <?php esc_html_e('Articles', 'new-paper') ?>
                    </h4>
                </div>
                <!-- end main-title -->
            </div>

            <?php
            foreach ($related_posts as $post_id) {



                $query_args = array(
                    'p' => $post_id, // id of a page, post, or custom type
                );

                $read_query = new WP_Query($query_args);


                if ($read_query->have_posts()) {

                    while ($read_query->have_posts()): $read_query->the_post();



                        $image_url = wp_get_attachment_url(get_post_thumbnail_id());
                        $image_url = aq_resize($image_url, 520, 280, true, true, true);

                        $data['image_url']  = $image_url;

                        ?>
                        <div class="col-md-4 col-sm-4">
                            <?php
                            get_template_part('template-parts/content', 'florida');
                            ?>
                        </div>
                        <?php

                    endwhile;

                }
                wp_reset_postdata();

            }
            ?>


        </div>

    </div>

    <?php


    // reset global data
    $data = array();

}



