<?php
global $new_paper_helper;
?>
<section class="home-video">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="tab-content">

                    <?php
                    $counter = 1;

                    /*Related videos by tags*/
                    $related_videos = $new_paper_helper->get_related_post_taxonomy(get_the_ID(), 'new_paper_ntx_video_category');
                    array_unshift($related_videos, get_the_ID());

                    foreach($related_videos as $video_id){

                        // WP_Query arguments
                        $args = array (
                            'p'                      => (int)$video_id,
                            'post_type'              => array( 'new_paper_ntx_video' ),
                        );

                        $query = new WP_Query( $args );


                        if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {
                                $query->the_post();

                                $video_url = get_post_meta(get_the_ID(), 'new_paper_ntx_video_url', true);
                                $video_id = $new_paper_helper->get_the_video_id($video_url);

                                ?>
                                <div role="tabpanel" class="tab-pane <?php echo esc_attr(($counter == 1))? 'active' : '' ?>" id="<?php echo esc_attr('video-item-'.$counter) ?>">
                                    <iframe src="https://www.youtube.com/embed/<?php echo esc_attr($video_id) ?>" ></iframe>
                                </div>
                                <?php

                            }
                        } else {
                            // no posts found
                        }

                        $counter++;

                    }

                    wp_reset_postdata();
                    ?>

                </div>
                <!-- end tab-panes -->
            </div>
            <!-- end col-8 -->

            <div class="col-md-4">
                <ul class="nav nav-tabs" role="tablist">

                    <?php
                    $counter = 1;
                    foreach($related_videos as $video_id){

                        // WP_Query arguments
                        $args = array (
                            'p'                      => (int)$video_id,
                            'post_type'              => array( 'new_paper_ntx_video' ),
                        );

                        $query = new WP_Query( $args );

                        if($query->have_posts()){
                            while($query->have_posts()){
                                $query->the_post();

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

                            }
                        }

                        $counter++;

                    }

                    wp_reset_postdata();
                    ?>

                </ul>
                <!-- Nav tabs -->
            </div>
            <!-- end col-4 -->
        </div>
    </div>
</section>