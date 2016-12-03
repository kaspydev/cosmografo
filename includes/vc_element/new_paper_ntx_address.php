<?php
function new_paper_ntx_address_fn() {

    global $new_paper_helper;

    vc_map( array(
        'name' => esc_html__('Address Block', 'new-paper'),
        'base' => 'new_paper_ntx_address',
        'category' => esc_html__('New Paper','new-paper'),
        'params' => array(

            array(
                'type'          => 'textfield',
                'holder'        => 'div',
                'heading'       => esc_html__('Tile of the section', 'new-paper'),
                'param_name'    => 'title',
                'weight'        => '',
                'value'         => '',
                'dependency'    => '',
            ),

            array(
                'type' => 'dropdown',
                'holder' => '',
                'class' => '',
                'heading' => esc_html__('Display address info', 'new-paper'),
                'param_name' => 'enable_address',
                'value' => array(
                    'Select Option' => '',
                    'Yes'           => 'yes',
                    'No'            => 'no',
                ),
                'description'   => esc_html__('Default : Yes', 'new-paper')
            ),

            array(
                'type' => 'dropdown',
                'holder' => '',
                'class' => '',
                'heading' => esc_html__('Display Contact Number', 'new-paper'),
                'param_name' => 'enable_number',
                'value' => array(
                    'Select Option' => '',
                    'Yes'           => 'yes',
                    'No'            => 'no',
                ),
                'description'   => esc_html__('Default : Yes', 'new-paper')
            ),

            array(
                'type' => 'dropdown',
                'holder' => '',
                'class' => '',
                'heading' => esc_html__('Display Email address', 'new-paper'),
                'param_name' => 'enable_email',
                'value' => array(
                    'Select Option' => '',
                    'Yes'           => 'yes',
                    'No'            => 'no',
                ),
                'description'   => esc_html__('Default : Yes', 'new-paper')
            ),

            array(
                'type'          => 'css_editor',
                'holder'        => '',
                'heading'       => esc_html__('CSS Editor', 'new-paper'),
                'param_name'    => 'css',
                'description'   => esc_html__('Basic CSS style editor for your content element.', 'new-paper'),
                'admin_label'   => false,
                'weight'        => '',
                'group'         => 'Design Options ',
                'value'         => '',
                'dependency'    => '',

                //'class'     => '',
                //'edit_field_class'  => 'col-md-12',
            ),
        )
    ) );


}

new_paper_ntx_address_fn();

class WPBakeryShortCode_New_Paper_Ntx_address extends WPBakeryShortCode {
}
