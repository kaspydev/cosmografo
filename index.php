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



                            <div class="main-title">

                                <h4>
                                    <strong>
                                        <?php
                                        if(function_exists('ot_get_option')){
                                            echo esc_html(ot_get_option('new_paper_ntx_all_text', 'All').' ');
                                        }else{
                                            echo esc_html__('All', 'new-paper');
                                        }
                                        ?>
                                    </strong>

                                    <?php
                                    if(function_exists('ot_get_option')){
                                        echo esc_html(ot_get_option('new_paper_ntx_blogs_text', 'Blogs').' ')    ;
                                    }else{
                                        echo esc_html__('Blogs', 'new-paper').' ';
                                    }

                                    ?>
                                </h4>

                            </div>

                        </div>

                        <!--Pagination-->
                        <div class="col-xs-12">

                            <?php $new_paper_helper->the_pagination() ?>

                        </div>


                        <div class="col-xs-12">

                            <?php
                            if(have_posts()){
                                while(have_posts()){
                                    the_post();

                                    $image_url = wp_get_attachment_url(get_post_thumbnail_id());
                                    $data['image_url'] = aq_resize($image_url,738, 414, true, true, true ); //x2

                                    get_template_part('template-parts/content', 'newyork_style');

                                }
                            }
                            ?>

                        </div>
                        <!-- end col-12 -->


                        <!--Pagination-->
                        <div class="col-xs-12">

                            <?php $new_paper_helper->the_pagination() ?>

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
