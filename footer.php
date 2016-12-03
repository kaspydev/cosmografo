<?php
global $new_paper_helper;

if($new_paper_helper->is_enabled('new_paper_ntx_enable_instagram_feed')  && function_exists('display_instagram')){
    ?>
    <!-- end content -->
    <section class="content mb0">
        <div class="instagram-feed">
            <h5>
                <?php
                $title = esc_html__('Instagram Feed', 'new-paper');
                if(function_exists('ot_get_option')){
                    $title = ot_get_option('new_paper_ntx_instagram_title', esc_html__('Instagram Feed', 'new-paper'));
                }
                ?>
                <?php echo esc_html($title) ?>
            </h5>
            <?php echo do_shortcode('[instagram-feed]') ?>
            <ul id="instagram-feed" class="zoom-gallery">
            </ul>
        </div>
        <!-- end instagram-feed -->
    </section>
    <?php
}

?>


<footer class="footer-houston">
    <div class="container">
        <div class="row">

            <?php

            $footer_columns = 3;
            if(function_exists('ot_get_option')){
                $footer_columns = ot_get_option('new_paper_ntx_footer_column_layout', 3);
            }

            $col_class = $new_paper_helper->get_col_value($footer_columns);
            for($i = 1; $i <= $footer_columns; $i++){

                $widget_name = "footer-$i";

                if(is_active_sidebar($widget_name)){
                    ?>
                    <div class="<?php echo esc_attr($col_class) ?>">
                        <?php
                        dynamic_sidebar( $widget_name );
                        ?>
                    </div>
                    <?php
                }
            }
            ?>

            <!--Sub footer-->
            <div class="col-xs-12">
                <div class="sub-footer">
                    <span class="copyright">

                        <?php
                        if(function_exists('ot_get_option')){
                            echo esc_html(ot_get_option('new_paper_ntx_sub_footer_left'));
                        }
                        ?>

                    </span>
                    <span class="creation">

                        <?php
                        if(function_exists('ot_get_option')){
                            echo esc_html(ot_get_option('new_paper_ntx_sub_footer_right'));
                        }
                        ?>

                    </span>
                </div>
                <!-- end sub-footer -->
            </div>


        </div>
    </div>
</footer>






</main>
<a href="#0" class="cd-top"><?php echo esc_html_e('Top', 'new-paper') ?></a>

<?php wp_footer(); ?>

</body>
</html>
