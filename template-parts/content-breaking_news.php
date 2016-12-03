<?php
global $new_paper_helper;
?>
<div class="breaking-news">

    <!-- end container -->
    <?php
    $enable_rainbow_above_news = $new_paper_helper->get_global_local_value('off', 'new_paper_ntx_enable_rainbow_above_news', 'new_paper_ntx_page_enable_rainbow_bar_above_news');
    if($enable_rainbow_above_news == 'on'){
        ?>
        <div class="rainbow-bar"></div>
        <?php
    }
    ?>
    <!-- end rainbow-bar -->

    <div class="container">

        <h5 class="section-title">
            <?php
            if(function_exists('ot_get_option')){
                $breaking_news_title = ot_get_option('new_paper_ntx_breaking_news_text', 'Breaking News');
            }else{
                $breaking_news_title = esc_html__('Breaking news', 'new-paper');
            }
            echo esc_html($breaking_news_title);
            ?>
        </h5>
        <ul class="news-ticker">
            <?php
            // WP_Query arguments
            $args = array (
                'category_name'          => 'breaking-news',
            );

            // The Query
            $query = new WP_Query( $args );

            // The Loop
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    ?>
                    <li>
                        <?php $new_paper_helper->the_categories(true, true) ?>
                        <span class="time"><?php $new_paper_helper->human_time_difference() ?></span> -
                        <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                    </li>
                    <?php
                }
            } else {
                // no posts found
            }

            // Restore original Post Data
            wp_reset_postdata();
            ?>
        </ul>
    </div>

    <!-- end container -->
    <?php
    $enable_rainbow_under_news = $new_paper_helper->get_global_local_value('off', 'new_paper_ntx_enable_raibow_under_news', 'new_paper_ntx_page_enable_rainbow_bar_under_news');
    if($enable_rainbow_under_news == 'on'){
        ?>
        <div class="rainbow-bar"></div>
        <?php
    }
    ?>
    <!-- end rainbow-bar -->

</div>