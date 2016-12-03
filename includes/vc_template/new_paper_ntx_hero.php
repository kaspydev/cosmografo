<?php

global $new_paper_helper;

$category = '';
$css = '';

$atts = $new_paper_helper->set_default('post_source', 'latest', $atts);
$atts = $new_paper_helper->set_default('slider_type', 'mega-grid', $atts);
$atts = $new_paper_helper->set_default('no_of_posts', 10, $atts);
$atts = $new_paper_helper->set_default('enable_category', 'yes', $atts);


$atts = vc_map_get_attributes( 'new_paper_ntx_hero', $atts );
extract($atts);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );


// Gets the number of maximum posts to be displayed depending on differnt hero type.
if($hero_type == 'maga-grid') {
    $no_of_posts = 7;
}elseif($hero_type == 'two-columns-grid'){
    $no_of_posts = 3;
}elseif($hero_type == 'three-columns-grid'){
    $no_of_posts = 4;
}elseif($hero_type == 'four-columns-grid'){
    $no_of_posts = 8;
}


$query_args = array(
    'ignore_sticky_posts'	=> true,
    'category_name'         => $category,
    'posts_per_page'        => $no_of_posts
);

$hero_query = new WP_Query($query_args);

// Hero slider path
$hero_path = 'includes/vc_template/heroes/';

if($hero_type == 'maga-grid') {

    include(locate_template($hero_path.'mega-grid.php'));

}elseif($hero_type == 'two-columns-grid'){

    include(locate_template($hero_path.'two-columns-grid.php'));

}elseif($hero_type == 'three-columns-grid'){

    include(locate_template($hero_path.'three-columns-grid.php'));

}elseif($hero_type == 'four-columns-grid'){

    include(locate_template($hero_path.'four-columns-grid.php'));

}elseif($hero_type == 'four-columns-slider' ){

    include(locate_template($hero_path.'carousel-slider.php'));

}elseif($hero_type == 'one-column-slider'){

    include(locate_template($hero_path.'carousel-single-slider.php'));

}
?>

<?php
//resetting global data
//$data = array();
wp_reset_postdata();
?>





