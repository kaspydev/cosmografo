<?php

$css = $name = $tag = '';

$atts = vc_map_get_attributes( 'new_paper_ntx_author_image', $atts );
extract($atts);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$image_url = wp_get_attachment_url($image);
$image_url = aq_resize($image_url, 110, 110 , true, true, true);

?>


<div class="author-box">
    <img data-original="<?php echo esc_url($image_url) ?>" src="<?php  echo esc_url($image_url) ?>" alt="<?php echo esc_html($name) ?>">
    <h4><?php echo esc_html($name) ?></h4>
    <small><?php echo esc_html($tag) ?></small>
</div>










