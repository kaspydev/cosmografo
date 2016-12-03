<?php
global $new_paper_helper;

$el_class = $css = $el_inner_class = $container_type = $inner_nested = '';
$atts = $new_paper_helper->set_default('wrapper_type', 'section', $atts);
$atts = $new_paper_helper->set_default('inner_container', 'yes', $atts);
$atts = vc_map_get_attributes( 'new_paper_ntx_wrapper', $atts );
extract($atts);

$container_tag = ($container_type == 'section')? 'section' : 'div';

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
?>

<<?php echo ($wrapper_type == 'section')? 'section': 'div' ?> class="<?php echo esc_attr($el_class).'  '.esc_attr($css_class) ?> clearfix">

<?php echo ($inner_container == 'yes')? '<div class="container clearfix">': ''; ?>

<?php echo wpb_js_remove_wpautop( $content ); ?>

<?php echo ($inner_container == 'yes')? '</div>': ''; ?>

</<?php echo ($wrapper_type == 'section')? 'section': 'div' ?>>
