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

                            <div class="row">
                                <div class="search-page col-md-6 col-sm-12">

                                    <div class="input-holder">
                                        <form method="get" class="searchform" action="<?php echo site_url() ?>">
                                            <input name="s" type="text" placeholder="<?php echo esc_html__('Type to search', 'new-paper') ?>" value="<?php echo esc_html(get_search_query()) ?>" />
                                            <input type="hidden" name="post_type" value="post">

                                            <button><img src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/images/icon-search.png" alt="Image"></button>

                                        </form>
                                    </div>

                                </div>
                            </div>


                            <div class="clearfix"></div>

                            <div class="main-title">

                                <h4>
                                    <?php
                                    $found = $wp_query->found_posts;
                                    if($found > 1){
                                        $result_text = 'results';
                                    }else{
                                        $result_text = 'result';
                                    }
                                    ?>
                                    <?php printf( esc_html__( '%s %s found for: %s', 'new-paper' ), $found, $result_text, '<strong>' . get_search_query() . '</strong>' ); ?>
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
        <!-- end container -->

    </section>

<?php

get_footer();
