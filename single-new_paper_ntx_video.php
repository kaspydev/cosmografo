<?php
get_header();


if(have_posts()){
    while(have_posts()){
        the_post();

        get_template_part('template-parts/content', 'video_player');

    }
}
?>


    <section class="content">
        <div class="container">

            <?php
            if(function_exists('ot_get_option')){
                $featured_categories = ot_get_option('new_paper_ntx_featured_category');
            }else{
                $featured_categories = '';
            }

            if( is_array($featured_categories) && count($featured_categories)){

                foreach($featured_categories as $category_id){

                    $video_category_name  = get_term($category_id, 'new_paper_ntx_video_category')->name;

                    ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="main-title">

                                <h4>
                                    <strong><?php echo esc_html($video_category_name) ?></strong>
                                    <?php
                                    if(function_exists('ot_get_option')){

                                        echo esc_html(ot_get_option('new_paper_ntx_videos_text', 'videos'));

                                    }else{
                                        echo esc_html__('Videos', 'new-paper');
                                    }

                                    ?>
                                </h4>

                                <h4 class="view-more-video">
                                    <a href="<?php echo esc_url(get_term_link((int)$category_id, 'new_paper_ntx_video_category')) ?>">
                                        <?php
                                        if(function_exists('ot_get_option')){
                                            echo esc_html(ot_get_option('new_paper_ntx_view_more_text', 'View More')) ;
                                        }else{
                                            echo esc_html__('View More', 'new-paper');
                                        }
                                        ?>

                                        <span class="glyphicon glyphicon glyphicon-export"></span>
                                    </a>
                                </h4>
                            </div>

                            <div>

                            </div>
                            <!-- end main-title -->
                        </div>
                    </div>
                    <?php

                    $query_args = array(
                        'post_type' => 'new_paper_ntx_video',
                        'posts_per_page'   => 4,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'new_paper_ntx_video_category',
                                'field' => 'term_id',
                                'terms' => (int)$category_id,
                            )
                        ),
                    );

                    $query = new WP_Query($query_args);

                    if($query->have_posts()){
                        ?>
                        <div class="row">
                            <?php
                            while($query->have_posts()){
                                $query->the_post();

                                $video_url = get_post_meta(get_the_ID(), 'new_paper_ntx_video_url', true);
                                $video_id = $new_paper_helper->get_the_video_id($video_url);

                                ?>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="post-type-video1">
                                        <figure class="video-image">

                                            <img data-original="https://i.ytimg.com/vi_webp/<?php echo esc_attr($video_id) ?>/mqdefault.webp" src="https://i.ytimg.com/vi_webp/<?php echo esc_attr($video_id) ?>/mqdefault.webp" alt="Image" class="thumb">

                                            <figcaption class="video-content">
                                                <div class="middle-content">
                                                    <div class="inner">

                                                        <a href="<?php the_permalink() ?>">
                                                            <img src="<?php echo esc_attr(get_template_directory_uri()) ?>/assets/images/icon-play.png" alt="Image">
                                                        </a>

                                                        <h5>
                                                            <a class="video-link" href="<?php the_permalink() ?>">
                                                                <?php the_title() ?>
                                                            </a>
                                                        </h5>

                                                    </div>
                                                    <!-- end inner -->
                                                </div>
                                                <!-- end middle-content -->
                                            </figcaption>
                                            <!-- end video-content -->
                                        </figure>
                                        <!-- end video-image -->
                                    </div>
                                    <!-- end post-type-video1 -->
                                </div>
                                <!-- end col-4 -->
                                <?php

                            }
                            ?>
                        </div>
                        <?php
                    }

                    wp_reset_postdata();

                    ?>

                    <?php

                }

            }
            ?>


        </div>
        <!-- end container -->
    </section>

<?php
get_footer();
