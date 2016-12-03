<?php
namespace Paper;


class New_Paper_Ntx
{

    public function pre($data = '')
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }

    public function line($data = '')
    {
        echo $data . '<br/>';
    }

    public function is_enabled($key)
    {

        if(function_exists('ot_get_option')){

            if (ot_get_option($key, 'on') == 'on') {
                return true;
            }

            return false;

        }

        return true;

    }

    public function the_author($class = '', $dimension = 50)
    {

        if (!$this->is_enabled('new_paper_ntx_enable_post_author')) {
            return false;
        }

        ?>
        <span class="post-author">

            <?php
            if (function_exists('get_wp_user_avatar')) {
                echo get_wp_user_avatar(get_the_author_meta('ID'), $dimension);
            }
            ?>

            <a class="<?php echo esc_attr($class) ?>"
               href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                <?php the_author() ?>
            </a>

        </span>

        <?php


    }

    public function the_time()
    {

        if (!$this->is_enabled('new_paper_ntx_enable_published_date')) {
            return false;
        }

        ?>
        <span class="post-date">- <?php echo strtoupper(esc_html(get_the_date('M d, Y'))); ?></span>
        <?php

    }

    public function the_post_views($post_id = null)
    {


        if (!$this->is_enabled('new_paper_ntx_enable_post_view_count')) {
            return false;
        }

        if (class_exists('New_Paper_Ntx_Package')) {

            if (is_null($post_id)) {
                $view_count = do_shortcode('[ntx_view_count]');
            } else {
                $view_count = do_shortcode('[ntx_view_count post_id=' . $post_id . ']');
            }

            ?>
            <span class="views">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/icon-view.png" alt="Image">

                <?php echo sprintf(_n('%s VIEW', '%s VIEWS', $view_count, 'new-paper'), $view_count) ?>
            </span>
            <?php

        }

    }


    public function the_post_likes($post_id = null, $ajax = true)
    {

        if (!$this->is_enabled('new_paper_ntx_enable_post_likes')) {
            return false;
        }

        if (class_exists('New_Paper_Ntx_Package')) {

            global $ntx_like_count;

            if (is_null($post_id)) {
                $post_id = get_the_ID();
                $like_count = do_shortcode('[ntx_like_count]');
            } else {
                $like_count = do_shortcode('[ntx_like_count post_id=' . $post_id . ']');
            }

            ?>
            <span class="like-loading-wrapper">
                <img class="like-loading" src="<?php echo get_template_directory_uri() ?>/assets/images/loading.gif" alt="Image">
            </span>

            <span class="likes">
                <?php
                if ($ajax) {
                    ?>
                    <a class="love-button" href="#">

                        <?php
                        if($ntx_like_count->is_liked($post_id)){
                            ?>
                            <img class="liked-post appear" src="<?php echo get_template_directory_uri() ?>/assets/images/icon-liked.png" alt="Image">
                            <img class="unliked-post gone" src="<?php echo get_template_directory_uri() ?>/assets/images/icon-like.png" alt="Image">
                            <?php
                        }else{
                            ?>
                            <img class="liked-post gone" src="<?php echo get_template_directory_uri() ?>/assets/images/icon-liked.png" alt="Image">
                            <img class="unliked-post appear" src="<?php echo get_template_directory_uri() ?>/assets/images/icon-like.png" alt="Image">
                            <?php
                        }
                        ?>

                    </a>
                    <?php
                } else {
                    ?>
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/icon-like.png" alt="Image">
                    <?php
                }
                ?>

                <?php

                if ($ajax) {
                    $class = 'like-number';
                } else {
                    $class = '';
                }

                if ($like_count > 1) {
                    echo '<span class="' . $class . '">' . $like_count . '</span> ' . esc_html__('LIKES', 'new-paper');
                } else {
                    echo '<span class="' . $class . '">' . $like_count . '</span> ' . esc_html__('LIKE', 'new-paper');
                }
                ?>
            </span>
            <?php
        }

    }


    public function the_social_share_buttons()
    {

        if (!$this->is_enabled('new_paper_ntx_enable_social_share')) {
            return false;
        }

        if(function_exists('ot_get_option')){
            $social_share_buttons = ot_get_option('new_paper_ntx_social_share');
        }else{
            $social_share_buttons = '';
        }

        if (count($social_share_buttons) && !empty($social_share_buttons)) {

            ?>
            <ul class="social-share">
                <?php

                foreach ($social_share_buttons as $social_button) {

                    $share_path = $this->get_share_link($social_button['social_type']);
                    $social_name = $social_button['social_type'];

                    ?>
                    <li class="<?php echo esc_attr($social_name) ?>">
                        <a class="<?php echo esc_attr($social_name) ?>" href="<?php echo esc_url($share_path) ?>"
                           onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;">
                            <i class="fa fa-<?php echo esc_attr($social_name) ?>"></i>
                        </a>
                    </li>
                    <?php

                }

                ?>
            </ul>
            <?php

        }

    }

    /*
     * same_colour : whether to make the background colour on hover same as social media brand colour
     * */
    public function the_social_connection()
    {

        if(function_exists('ot_get_option')){
            $social_share_buttons = ot_get_option('new_paper_ntx_social_media');
        }else{
            $social_share_buttons = '';
        }


        if (!empty($social_share_buttons) && count($social_share_buttons)) {

            ?>
            <ul class="social-icons">
                <?php

                foreach ($social_share_buttons as $social_button) {

                    $social_path = $social_button['social_media_link'];
                    $social_class = $social_button['social_media'];

                    ?>
                    <li>
                        <a class="<?php echo esc_attr($social_class) ?>" href="<?php echo esc_url($social_path) ?>"
                           target="_blank">
                            <i class="fa fa-<?php echo esc_attr($social_class) ?>"></i>
                        </a>
                    </li>
                    <?php

                }

                ?>
            </ul>
            <?php

        }


    }

    protected function get_share_link($social_media)
    {

        global $post;

        $permalink = get_the_permalink(get_the_ID());
        $title = get_the_title(get_the_ID());

        $link = '';

        if ($social_media == 'facebook') {
            $link = "http://www.facebook.com/sharer.php?u=$permalink&t=$title ?>";
        } elseif ($social_media == 'twitter') {
            $link = "https://twitter.com/intent/tweet?url=$permalink&text=$title";
        } elseif ($social_media == 'google-plus') {
            $link = "https://plus.google.com/share?url=$permalink&title=$title";
        } elseif ($social_media == 'instagram') {

        }

        return $link;

    }


    public function the_post_navigation()
    {

        if (!$this->is_enabled('new_paper_ntx_enable_post_navigation')) {
            return false;
        }

        // Don't print empty markup if there's nowhere to navigate.
        $previous = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
        $next = get_adjacent_post(false, '', false);

        if (!$next && !$previous) {
            return;
        }
        ?>
        <div class="post-navigation" role="navigation">

            <?php
            $prev_post = get_previous_post();
            if (!empty($prev_post)): ?>
                <div class="prev">
                    <small><?php esc_html_e('PREV POST', 'new-paper') ?></small>
                    <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"
                       title="<?php echo esc_attr($prev_post->post_title); ?>">

                        <?php echo wp_kses($prev_post->post_title, array('em' => array())); ?>

                    </a>
                </div>
            <?php else: ?>
                <div class="prev">
                    <small><?php esc_html_e('PREV POST', 'new-paper') ?></small>
                    <span class="magazine-disable">
                        <?php esc_html_e('No Previous Post', 'new-paper') ?>
                    </span>
                </div>
            <?php endif; ?>

            <?php
            $next_post = get_next_post();
            if (!empty($next_post)): ?>
                <div class="next">
                    <small><?php esc_html_e('NEXT POST', 'new-paper') ?></small>
                    <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"
                       title="<?php echo esc_attr($next_post->post_title); ?>">
                        <?php echo wp_kses($next_post->post_title, array('em' => array())); ?>
                    </a>
                </div>
            <?php else: ?>
                <div class="next">
                    <small><?php esc_html_e('NEXT POST', 'new-paper') ?></small>
                    <span class="magazine-disable">
                        <?php esc_html_e('No Next Post', 'new-paper') ?>
                    </span>
                </div>
            <?php endif; ?>

        </div><!-- .navigation -->
        <?php
    }


    public function related_post($post_id)
    {

        $categories = wp_get_post_categories($post_id);
        $entry_post = array($post_id);

        $counter = 0;
        $post_ids = array();

        if(function_exists('ot_get_option')){
            $max_views = ot_get_option('new_paper_ntx_max_number_of_related_posts', 10);
        }else{
            $max_views = 10;
        }

        foreach ($categories as $category) {

            if (count($post_ids) <= $max_views) {

                $query_args = array(
                    'cat' => $category,
                    'ignore_sticky_posts' => true,
                    'meta_key' => '_thumbnail_id',
                );

                $related_query = new \WP_Query($query_args);

                if ($related_query->have_posts()) {
                    ?>

                    <?php
                    while ($related_query->have_posts()) : $related_query->the_post();

                        if (!in_array(get_the_ID(), $entry_post)) {


                            if (count($post_ids) < $max_views) {

                                $entry_post[] = get_the_ID();

                                $post_ids[] = get_the_ID();

                                $counter++;

                            } else {
                                break;
                            }

                        }

                    endwhile;
                    wp_reset_postdata();
                    ?>

                    <?php
                }

            } else {
                break;
            }

        }

        return $post_ids;

    }

    public function get_related_post_taxonomy($post_id, $taxonmy, $max_related_post = 3 )
    {

        $categories = get_the_terms($post_id, $taxonmy);

        $entry_post = array($post_id);

        $counter = 0;
        $post_ids = array();

        $max_views =  $max_related_post;

        $actual_category_ids = array();
        foreach($categories as $caegory_object){
            $actual_category_ids[] = $caegory_object->term_id;
        }

        foreach ($actual_category_ids as $category) {

            if (count($post_ids) <= $max_views) {

                $query_args = array(
                    'post_type' => 'new_paper_ntx_video',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'new_paper_ntx_video_category',
                            'field' => 'term_id',
                            'terms' => $category
                        )
                    ),
                );

                $related_query = new \WP_Query($query_args);



                if ($related_query->have_posts()) {

                    while ($related_query->have_posts()) : $related_query->the_post();

                        if (!in_array(get_the_ID(), $entry_post)) {


                            if (count($post_ids) < $max_views) {

                                $entry_post[] = get_the_ID();

                                $post_ids[] = get_the_ID();

                                $counter++;

                            } else {
                                break;
                            }

                        }

                    endwhile;
                    wp_reset_postdata();
                    ?>

                    <?php
                }

            } else {
                break;
            }

        }

        return $post_ids;

    }


    /*
     * if data is true, it will give set of popular ids
     * */
    public function is_popular($number = '', $data = false)
    {

        // Theme specific are marked by word EDIT
        global $post;
        $_post = $post;

        $query_args = array(
            'meta_key' => 'ntx_post_views_count',      // EDIT
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
        );

        $read_query = new \WP_Query($query_args);

        $post_ids = array();

        //Maximum number of post to be regarded as popular post
        if(function_exists('ot_get_option')){
            $mag_popular_count_limit = ot_get_option('new_paper_ntx_max_popular_posta', 10);    // EDIT
        }else{
            $mag_popular_count_limit = 10;
        }

        $counter = 1;

        if ($read_query->have_posts()) {

            while ($read_query->have_posts()):

                $read_query->the_post();

                if (count($post_ids) <= $mag_popular_count_limit) {

                    $mag_last_view_date = get_post_meta(get_the_ID(), 'ntx_last_view_date', true);  // EDIT
                    $mag_last_view_date = (int)$mag_last_view_date;

                    if ($mag_last_view_date >= $this->get_popular_date_limit()) {
                        $post_ids[] = get_the_ID();
                    }

                } else {
                    break;
                }

            endwhile;

        }

        $post = $_post;
        setup_postdata($post);

        if ($data == true) {
            return $post_ids;
        }

        if (in_array($number, $post_ids)) {
            return true;
        }

        return false;

    }

    protected function get_popular_date_limit()
    {

        $one_week = time() - (60 * 60 * 24 * 7); //
        $two_weeks = time() - (60 * 60 * 24 * 7) * 2; //
        $three_weeks = time() - (60 * 60 * 24 * 7) * 3; //
        $one_month = time() - (60 * 60 * 24 * 7) * 4; //
        $two_months = time() - $one_month * 2; //
        $three_months = time() - $one_month * 3; //

        if(function_exists('ot_get_option')){
            $limit = ot_get_option('new_paper_ntx_popular_date_limit', '1-week');
        }else{
            $limit = '1-week';
        }

        if ($limit == '1-week') {
            $data = $one_week;
        } elseif ($limit == '2-weeks') {
            $data = $two_weeks;
        } elseif ($limit == '3-weeks') {
            $data = $three_weeks;
        } elseif ($limit == '1-month') {
            $data = $one_month;
        } elseif ($limit == '2-months') {
            $data = $two_months;
        } elseif ($limit == '3-months') {
            $data = $three_months;
        }

        return $data;
    }


    public function cut_words($word, $limit)
    {

        if(empty($limit)){
            return $word;
        }

        $out = strlen($word) > $limit ? substr($word, 0, $limit) . "" : $word;

        return $out;

    }

    /*$data = array ( md, sm, xs ) return array form*/
    public function get_col_value($i)
    {

        $cols = 0;

        $data = array();

        $i = (int)$i;

        switch ($i) {
            case 1:
                $data = 'col-md-12 col-sm-12 col-xs-12';
                break;
            case 2:
                $data = 'col-md-6 col-sm-6 col-xs-12';
                break;
            case 3:
                $data = 'col-md-4 col-sm-6 col-xs-12';
                break;
            case 4:
                $data = 'col-md-3 col-sm-6 col-xs-12';
                break;
            case 6:
                $data = 'col-md-2 col-sm-3 col-xs-6';
                break;
            case 12:
                $data = 'col-md-1 col-sm-2 col-xs-12';
                break;
            default:
                $data = 0;
        }

        return $data;

    }

    /**
     * Useful for dropdown visual composer
     * @param string $taxonomy
     * @return array : of (category Name - category slug)
     */
    public function get_associative_category($taxonomy = 'category')
    {

        $_categories = get_terms($taxonomy);

        $categories = array();
        if (count($_categories) > 0) {
            $counter = 1;
            foreach ($_categories as $_category) {

                if ($counter == 1) {
                    $categories['Select Category'] = '';
                }

                $categories[$_category->name . ' (' . $_category->count . ') '] = $_category->slug;
                $counter++;
            }
        }

        return $categories;

    }

    // when visual composer is enabled
    // for setting shortcode default attribute value
    public function set_default($param_name, $default_value, $atts)
    {

        $value = (!isset($atts[$param_name])) ? '' : 'value is there';

        if (empty($value)) {
            $atts[$param_name] = $default_value;
        }
        return $atts;

    }


    public function the_categories($single = false, $skip_first = false)
    {

        $colour = array('red', 'purple', 'green', 'yellow', 'blue');

        if ($this->is_enabled('new_paper_ntx_enable_category_on_post')) {
            ?>
            <div class="category-links">
                <?php
                $categories = get_the_category();

                if($skip_first){
                    unset($categories[0]);
                }

                foreach ($categories as $category) {
                    ?>

                    <a class="category-link" href="<?php echo esc_url(get_category_link($category->term_id)) ?>">
                    <span class="label label-<?php echo esc_attr($colour[array_rand($colour)]) ?> category">
                        <?php echo esc_html($category->name) ?>
                    </span>
                    </a>

                    <?php

                    if($single){
                        break;
                    }
                }
                ?>
            </div>
            <?php
        }

    }


    public function split_sentence($sentence = ''){

        $sentence = explode(' ', $sentence);

        $first = array_shift($sentence);
        $rest = implode(' ', $sentence);

        return array($first, $rest);

    }


    public function the_breadcrumb(){

        $post_id = get_the_ID();

        $post_template = get_post_meta($post_id, '_wp_page_template', true);

        $except = array(
            'page-home.php'
        );

        // do not display in home page
        // do not display in single page (post page)
        if( in_array(trim($post_template), $except) || is_single() ){
            return false;
        }

        ?>

        <section class="int-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">

                        <ol class="breadcrumb" typeof="BreadcrumbList">
                            <?php if(function_exists('bcn_display'))
                            {
                                bcn_display();
                            }
                            ?>
                        </ol>

                    </div>

                    <!-- end col-4 -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <h4>
                            <?php
                            if(is_search()){
                                echo esc_html__('Search Results', 'new-paper');
                            }else{
                                the_title();
                            }
                            ?>
                        </h4>
                    </div>

                    <!-- end col-4 -->
                    <div class="col-md-4 col-sm-4 hidden-xs">
                        <?php if(function_exists('fontResizer_place')) {
                            fontResizer_place();
                        } ?>
                    </div>
                    <!-- end col-4 -->
                </div>
            </div>
        </section>
        <?php

    }

    public function the_pagination(){

        global $wp_query;

        $pages = paginate_links( array(
            'format' => '?paged=%#%',
            'prev_text' => '<i class="fa fa-long-arrow-left"></i>',
            'next_text' => '<i class="fa fa-long-arrow-right"></i>',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'type'  => 'array',
        ) );

        if( is_array( $pages ) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<ul class="pagination">';
            foreach ( $pages as $page ) {
                echo "<li>$page</li>";
            }
            echo '</ul>';
        }

        wp_reset_postdata();

    }


    public function the_menu(){

        if(!has_nav_menu('primary')){
            return false;
        }

        $nav_args = array(
            'theme_location'  => 'primary',
            'menu'            => '',
            'container'       => 'div', //Whether to wrap the ul, and what to wrap it with. Allowed tags are div and nav.: false: no container
            'container_class' => 'navigation hidden-sm hidden-xs',
            'container_id'    => '',
            'menu_class'      => '', // class that is applied to ul
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '', // Output text before the <a> of the link
            'after'           => '', // Output text after the </a> of the link
            'link_before'     => '', // Output text before the link text
            'link_after'      => '', // Output text after the link text
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth'           => 0, // 0: all, -1: all but display in flat list
            'walker'          => new \new_paper_ntx_walker_nav_menu
        );

        ?>

        <?php
        wp_nav_menu( $nav_args ); ?>
        <?php

    }

    public function the_side_menu(){

        if(!has_nav_menu('primary')){
            return false;
        }

        $nav_args = array(
            'theme_location'  => 'primary',
            'menu'            => '',
            'container'       => 'nav', //Whether to wrap the ul, and what to wrap it with. Allowed tags are div and nav.: false: no container
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => 'side-nav visible-sm visible-xs', // class that is applied to ul
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '', // Output text before the <a> of the link
            'after'           => '', // Output text after the </a> of the link
            'link_before'     => '', // Output text before the link text
            'link_after'      => '', // Output text after the link text
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
            'depth'           => 0, // 0: all, -1: all but display in flat list
            'walker'          => new \new_paper_ntx_side_walker_nav_menu
        );

        ?>

        <?php
        wp_nav_menu( $nav_args ); ?>
        <?php

    }


    public function get_the_video_id($video_url){

        $parts = explode('v=', $video_url);
        $video_id = end($parts);

        return $video_id;

    }

    public function get_global_local_value($default_value, $global_key, $local_key, $single = true){

        $global_value = $default_value;

        if(function_exists('ot_get_option')){
            $global_value = ot_get_option($global_key, $default_value);
        }

        $local_value = get_post_meta(get_the_ID(), $local_key, $single);

        if(!empty($local_value)){
            return $local_value;
        }

        return $global_value;

    }

    public function human_time_difference(){

        echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago';

    }


    public function review_badge(){


        if (function_exists('wp_review_show_total') ){

            $wp_review_show_total = wp_review_show_total( false );

            if(!empty( $wp_review_show_total )){

                ?>
                <div class="post-rating">
                    <?php echo wp_review_show_total(); ?>
                </div>
                <?php
            }

        }
    }

    public function post_format(){
        global $post;
        $format = get_post_format( $post->ID );

        switch ($format) {
            case 'aside':
                $icon = '<i class="ion-document-text"></i>';
                break;
            case 'link':
                $icon = '<i class="ion-link"></i>';
                break;

            case 'quote':
                $icon = '<i class="ion-quote"></i>';
                break;

            case 'video':
                $icon = '<i class="ion-ios-videocam"></i>';
                break;

            case 'image':
                $icon = '<i class="ion-image"></i>';
                break;

            default:
                $icon = '';
                break;
        }

        if( $icon ){
            $output = '<div class="mag-post-format">';
            $output .= $icon;
            $output .= '</div>';

            return $output;
        }
        return false;
    }


}

