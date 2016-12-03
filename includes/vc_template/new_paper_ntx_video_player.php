<?php
global $new_paper_helper;
global $data;
$category = $css =  '';

$atts = $new_paper_helper->set_default('post_source', 'latest', $atts);

$atts = vc_map_get_attributes( 'new_paper_ntx_video_player', $atts );
extract($atts);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

if($category){

    $query_args = array(
        'post_type'         => 'new_paper_ntx_video',
        'posts_per_page'    => 4,
        'tax_query' => array(
            array(
                'taxonomy' => 'new_paper_ntx_video_category',
                'field' => 'slug',
                'terms' => $category
            )
        ),
    );

}else{

    $query_args = array(
        'post_type' => 'new_paper_ntx_video',
        'posts_per_page'    => 4,
    );

}



$custom_query = new WP_Query($query_args);

?>
    <section class="home-video">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="tab-content">

                        <?php
                        if($custom_query->have_posts()){

                            $counter = 1;

                            while($custom_query->have_posts()){
                                $custom_query->the_post();

                                $video_url = get_post_meta(get_the_ID(), 'new_paper_ntx_video_url', true);
                                $video_id = $new_paper_helper->get_the_video_id($video_url);

                                ?>
                                <div role="tabpanel" class="tab-pane <?php echo esc_attr(($counter == 1))? 'active' : '' ?>" id="<?php echo esc_attr('video-item-'.$counter) ?>">
                                    <iframe src="https://www.youtube.com/embed/<?php echo esc_attr($video_id) ?>" ></iframe>
                                </div>
                                <?php
                                $counter++;
                            }
                        }


                        wp_reset_postdata();
                        ?>

                    </div>
                </div>



                <div class="col-md-4">
                    <ul class="nav nav-tabs" role="tablist">

                        <?php
                        $counter = 1;

                        if($custom_query->have_posts()){
                            while($custom_query->have_posts()){
                                $custom_query->the_post();

                                $video_url = get_post_meta(get_the_ID(), 'new_paper_ntx_video_url', true);
                                $video_id = $new_paper_helper->get_the_video_id($video_url);

                                ?>
                                <li role="presentation" class="<?php echo esc_attr(($counter == 1))? 'active' : '' ?>">

                                    <a href="#<?php echo esc_attr('video-item-'.$counter) ?>" aria-controls="<?php echo esc_attr('video-item-'.$counter) ?>" role="tab" data-toggle="tab">

                                        <figure class="video-thumb">
                                            <img data-original="https://i.ytimg.com/vi_webp/<?php echo esc_attr($video_id) ?>/mqdefault.webp" src="https://i.ytimg.com/vi_webp/<?php echo esc_attr($video_id) ?>/mqdefault.webp" alt="Image">
                                        </figure>
                                        <!-- end video-thumb -->
                                        <div class="video-caption" data-id="<?php echo esc_attr($video_id) ?>">

                                            <!-- end video-metas -->
                                            <h5><?php the_title() ?></h5>

                                            <small>
                                                <img src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/images/icon-time.png" alt="Image">
                                                <span class="video-time">calculating...</span>
                                            </small>
                                        </div>
                                        <!-- end video-caption -->

                                    </a>

                                </li>
                                <?php
                                $counter++;

                            }
                        }

                        wp_reset_postdata();
                        ?>

                    </ul>
                    <!-- Nav tabs -->
                </div>


            </div>
        </div>
    </section>

<?php








