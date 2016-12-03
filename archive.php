<?php
global $new_paper_helper;
global $data;
global $wp_query;

get_header();

$data = array(
    'enable_category'   => 'yes',
    'enable_excerpt'    => 'yes',
    'enable_author'     => 'yes',
    'enable_date'       => 'yes',
    'title_words'       => '',
    'excerpt_words'     => 175,
    'post_type'         => 'post-type-california',
    'author_size'       => 32
);
?>

    <section class="content">
        <div class="container">
            <div class="candy-wrapper">
                <div class="main" style="padding-top:30px;">
                    <div class="row inner">

                        <div class="col-xs-12">

                            <?php
                            if ( is_search() ){
                                // we have differnt search.php for this, so nothing to do

                            }
                            elseif( is_category() ){
                                // Category archive content
                                $title = $new_paper_helper->split_sentence(single_cat_title('', false));
                            }
                            // check for tag, taxonomy, date before
                            elseif ( is_archive() ){
                                // Default archive content for *every* type of archive
                                $title = $new_paper_helper->split_sentence(get_the_archive_title());
                            }

                            ?>

                            <div class="main-title">

                                <h4>
                                    <strong><?php echo esc_html($title[0]) ?> </strong>
                                    <?php echo esc_html($title[1]) ?>
                                </h4>

                            </div>

                        </div>

                        <!--Pagination-->
                        <div class="col-xs-12">

                            <?php $new_paper_helper->the_pagination() ?>

                        </div>

                        <div class="row">
                            <div class="col-xs-12">

                                <?php
                                if(have_posts()){
                                    while(have_posts()){
                                        the_post();

                                        if(is_category()){
                                            // For normal post type
                                            $image_url = wp_get_attachment_url(get_post_thumbnail_id());
                                            $data['image_url'] = aq_resize($image_url,738, 414, true, true, true ); //x2
                                            get_template_part('template-parts/content', 'newyork_style');

                                        }elseif(is_post_type_archive('new_paper_ntx_video') || is_tax('new_paper_ntx_video_category')){
                                            // For video post type
                                            get_template_part('template-parts/content', 'video_item');
                                        }



                                    }
                                }
                                ?>

                            </div>
                            <!-- end col-12 -->
                        </div>




                        <!--Pagination-->
                        <div class="row">

                            <div class="col-xs-12">

                                <?php $new_paper_helper->the_pagination() ?>

                            </div>
                            <!-- end col-12 -->
                        </div>
                        <!-- end row -->


                    </div>
                    <!-- end row -->
                </div>
                <!-- end main -->

                <?php get_sidebar() ?>
                <!-- end sidebar -->
            </div>


        </div>

    </section>

<?php

get_footer();
