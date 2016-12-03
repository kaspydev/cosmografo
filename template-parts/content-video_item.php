<?php
/*
 * Requries data with 'image_url', 'enable_category', 'enable_excerpt'
 * enable_author, enable_date, title_words, excerpt_words, post_type, author_size
 * */
global $data;
global $new_paper_helper;

$post_class = get_post_class();

$video_url = get_post_meta(get_the_ID(), 'new_paper_ntx_video_url', true);
$video_id = $new_paper_helper->get_the_video_id($video_url);

?>

<div class="col-md-4 col-sm-4 col-xs-12">
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