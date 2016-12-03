<?php
get_header();

if(have_posts()) {
    while (have_posts()) {

        the_post();
        if(function_exists('ot_get_option')){
            $general_layout = ot_get_option('new_paper_ntx_single_post_layout', 'default');
        }else{
            $general_layout = 'default';
        }
        $post_layout = get_post_meta(get_the_ID(), 'new_paper_ntx_particular_post_layout', true);
        $layout = (empty($post_layout))? $general_layout : $post_layout;

        if(function_exists('ot_get_option')){
            $general_share_layout = ot_get_option('new_paper_ntx_global_social_share_button_placement', 'before');
        }else{
            $general_share_layout = 'before';
        }
        $social_share_layout_post = get_post_meta(get_the_ID(), 'new_paper_ntx_social_share_location', true );
        $social_share_layout = (empty($social_share_layout_post))? $general_share_layout : $social_share_layout_post;

        ?>

        <section class="<?php echo ($layout == 'full-width')? ' article-detail-newyork ' : ' article-detail-florida ' ?> ">

            <?php
            if($layout == 'full-width'){

                $image_url = wp_get_attachment_url(get_post_thumbnail_id());
                $image_url = aq_resize($image_url, 1838, 919, true, true, true);

                ?>
                <figure class="big-post-image">
                    <img data-original="<?php echo esc_url($image_url) ?>" src="<?php echo esc_url($image_url) ?>" alt="<?php echo esc_attr(get_the_title()) ?>" class="image">
                    <div class="over-content">
                        <div class="middle-content">
                            <div class="inner">
                                <div class="container">

                                    <?php
                                    // category list
                                    if ($new_paper_helper->is_enabled('new_paper_ntx_enable_category_on_post')) {

                                        $categories = get_the_category();
                                        foreach ($categories as $category) {
                                            ?>
                                            <a class="category-link"
                                               href="<?php echo esc_url(get_category_link($category->term_id)) ?>">
                                                <span class="label label-yellow category">
                                                    <?php echo esc_html($category->name) ?>
                                                </span>
                                            </a>
                                            <?php
                                        }

                                    }
                                    ?>

                                    <h2 class="post-title"><?php the_title() ?></h2>

                                    <?php $new_paper_helper->the_author() ?>

                                    <?php $new_paper_helper->the_time() ?>

                                    <div class="post-metas single-perform">
                                        <?php $new_paper_helper->the_post_likes() ?>
                                        <?php $new_paper_helper->the_post_views() ?>
                                    </div>

                                </div>
                                <!-- end container -->
                            </div>
                            <!-- end inner -->
                        </div>
                        <!-- end middle-content -->
                    </div>
                    <!-- end over-content -->
                </figure>
                <?php
            }
            ?>

            <div class="clearfix"></div>

            <div class="container">
                <div class="">
                    <div class="main">

                        <?php

                        // for default layout
                        if($layout == 'default'){

                            $new_paper_helper->the_categories();

                            ?>

                            <h2 class="post-title"><?php the_title() ?></h2>

                            <?php $new_paper_helper->the_author() ?>

                            <?php $new_paper_helper->the_time() ?>

                            <div class="post-metas single-perform">

                                <?php
                                // Post Likes
                                $new_paper_helper->the_post_likes();
                                ?>

                                <?php
                                // View Count
                                $new_paper_helper->the_post_views()
                                ?>

                            </div>

                            <?php

                        }
                        // for default layou end

                        // social share
                        if($social_share_layout != 'side'){
                            $new_paper_helper->the_social_share_buttons();
                        }

                        $sliders = array();

                        // slider post
                        if(get_post_meta(get_the_ID(), 'new_paper_ntx_enable_gallery_single_post', true) == 'on'){

                            $featured_image = get_post_thumbnail_id(get_the_ID());
                            $sliders = explode(',', get_post_meta(get_the_ID(), 'new_paper_ntx_post_gallery', true)) ;
                            if($featured_image && $layout != 'full-width'){
                                array_unshift($sliders, $featured_image);
                            }

                            ?>
                            <figure class="big-post-image">
                                <div class="single-item">
                                    <?php
                                    foreach($sliders as $slider){
                                        $slider_url = wp_get_attachment_url($slider);
                                        $slider_url = aq_resize($slider_url, 820, 550, true, true, true);
                                        ?>
                                        <div>
                                            <img data-original="<?php echo esc_url($slider_url) ?>" src="<?php echo esc_url($slider_url) ?>" alt="<?php esc_html_e('Slider Image', 'new-paper') ?>">
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </figure>
                            <?php


                        }


                        // featured image : Default layout on
                        if( $layout == 'default' && !count($sliders)  ){
                            $image_url = wp_get_attachment_url(get_post_thumbnail_id());
                            $image_url = aq_resize($image_url, 820, 440, true, true, true);
                            if($image_url){
                                ?>
                                <figure class="big-post-image">
                                    <img data-original="<?php echo esc_url($image_url) ?>" src="<?php echo esc_url($image_url) ?>" alt="<?php echo esc_attr(get_the_title()) ?>">
                                </figure>
                                <?php
                            }
                        }

                        ?>

                        <div class="clearfix"></div>

                        <?php
                        if($social_share_layout == 'side'){
                        ?>
                        <div class="post-article-content">
                            <div class="social-sidebar">
                                <?php $new_paper_helper->the_social_share_buttons(); ?>
                            </div>
                            <?php
                            }

                            ?>

                            <p class="post-lead">
                                <?php echo esc_html(get_post_meta(get_the_ID(), 'new_paper_ntx_lead_paragraph', true)) ?>
                            </p>

                            <?php
                            the_content() ;

                            if($social_share_layout == 'side'){
                                echo '</div>';
                            }
                            ?>

                            <?php

                            /*Post Tags list*/
                            if($new_paper_helper->is_enabled('new_paper_ntx_display_post_tags')){

                                $tags_list = get_the_tag_list('<ul class="post-tags"><li>', '<li>', '</li></ul>');

                                if ($tags_list) {
                                    echo $tags_list;
                                }
                            }

                            ?>

                            <?php
                            if(function_exists('wp_review_show_total')){
                                //echo do_shortcode('[wp-review]');
                            }

                            ?>


                            <?php
                            // Post Navigation
                            $new_paper_helper->the_post_navigation();
                            ?>


                            <?php

                            if ($new_paper_helper->is_enabled('new_paper_ntx_enable_author_information')) {
                                ?>
                                <div class="post-author-info">

                                    <?php
                                    if (function_exists('get_wp_user_avatar')) {
                                        echo get_wp_user_avatar(get_the_author_meta('ID'), 60);
                                    }
                                    ?>

                                    <h5 class="author-name">
                                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                            <?php echo strtoupper(esc_html(get_the_author())) ?>
                                        </a>
                                    </h5>


                                    <?php


                                    if (get_the_author_meta('description')) : // If a user has filled out their decscription show a bio on their entries
                                        ?>
                                        <p class="author-info">
                                            <?php echo get_the_author_meta('description') ?>
                                        </p>
                                        <?php
                                    endif;


                                    ?>

                                </div>
                                <?php
                            }

                            ?>

                            <?php
                            // Post related articles
                            if($new_paper_helper->is_enabled('new_paper_ntx_enable_related_posts')){
                                get_template_part('template-parts/content', 'related');
                            }

                            ?>


                            <div class="clearfix"></div>

                            <?php
                            // Comments section

                            comments_template();
                            ?>


                        </div>

                        <!-- end main -->


                        <?php
                        // sidebar
                        get_sidebar();
                        ?>


                    </div>
                </div>
        </section>
        <?php

    }
}

get_footer();


