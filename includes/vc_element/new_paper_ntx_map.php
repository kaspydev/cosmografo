<?php
function new_paper_ntx_map_fn() {

    vc_map( array(
        "name" => esc_html__("New Paper Map", 'new-paper'),
        "base" => "new_paper_ntx_map",
        "category" => esc_html__('New Paper','new-paper'),
        "params" => array(
            array(
                "type" => "attach_image",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Choose pin image inside map.", 'new-paper'),
                "param_name" => "pin_image",
                'value' => '',
                "description" => esc_html__("Choose the image.", 'new-paper')
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Enter Latitude", 'new-paper'),
                "param_name" => "latitude",
                "value" => '',
                "description" => esc_html__("Enter the correct latitude position for mapping.", 'new-paper')
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Enter Longitude", 'new-paper'),
                "param_name" => "longitude",
                "value" => '',
                "description" => esc_html__("Enter the correct Longitude position for mapping.", 'new-paper')
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Enter Short description which will be shown while hovering over pin.", 'new-paper'),
                "param_name" => "description",
                "value" => '',
                "description" => esc_html__("Hover Description.", 'new-paper')
            ),
            array(
                'type'          => 'css_editor',
                'holder'        => '',
                'heading'       => esc_html__('Css Editor', 'new-paper'),
                'param_name'    => 'css',
                'description'   => esc_html__('Basic CSS style editor for your content element.', 'new-paper'),
                'admin_label'   => false,
                'weight'        => '',
                'group'         => 'Desing Options ',
                'value'         => '',
                'dependency'    => '',

                //'class'     => '',
                //'edit_field_class'  => 'col-md-12',
            ),
        )
    ) );


}

new_paper_ntx_map_fn();

class WPBakeryShortCode_New_Paper_Ntx_Map extends WPBakeryShortCode {
}