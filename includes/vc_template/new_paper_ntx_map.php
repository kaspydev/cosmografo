<?php

global $new_paper_helper;

$latitude = '';
$longitude = '';
$description = '';

$default_pin_image = get_template_directory_uri().'/assets/images/map-pin.png';

$atts = $new_paper_helper->set_default('pin_image', $default_pin_image, $atts);

$atts = vc_map_get_attributes( 'new_paper_ntx_map', $atts );

extract($atts);
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

wp_enqueue_script('google-api-maps', 'http://maps.googleapis.com/maps/api/js?sensor=false' , array('jquery'), false, true);
wp_enqueue_script('new-paper-ntx-maps', get_template_directory_uri().'/assets/js/google-maps.js' , array('google-api-maps'), false, true);

?>

<div class="row">

    <div class="col-xs-12 contact-page <?php echo esc_attr($css_class) ?>">


        <?php

        if((int)$pin_image){
            $pin_image = wp_get_attachment_url(esc_html($pin_image));
        }

        $data = array(
            'pin_image'     => esc_url($pin_image),
            'latitude'      => esc_html($latitude),
            'longitude'     => esc_html($longitude),
            'description'   => esc_html($description)
        );

        wp_localize_script( 'new-paper-ntx-maps', 'map_detail', $data );
        ?>

        <div id="map"  domain="<?php echo get_template_directory_uri() ?>" style="width:100%; height:300px; float:left;"></div>

    </div>


</div>


