<?php
function new_paper_ntx_author_image_fn() {

    vc_map( array(
        'name' => esc_html__('Author Image', 'new-paper'),
        'base' => 'new_paper_ntx_author_image',
        'category' => esc_html__('New Paper','new-paper'),
        'params' => array(

            array(
                'type'          => 'attach_image',
                'holder'        => '',
                'heading'       => esc_html__('Attach Image', 'new-paper'),
                'param_name'    => 'image'
            ),

            array(
                'type'          => 'textfield',
                'holder'        => 'div',
                'heading'       => esc_html__('Name', 'new-paper'),
                'param_name'    => 'name',
                'weight'        => '',
                'value'         => '',
                'dependency'    => '',
            ),

            array(
                'type'          => 'textfield',
                'holder'        => 'div',
                'heading'       => esc_html__('Tagline', 'new-paper'),
                'param_name'    => 'tag',
                'weight'        => '',
                'value'         => '',
                'dependency'    => '',
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

new_paper_ntx_author_image_fn();

class WPBakeryShortCode_New_Paper_Ntx_Author_Image extends WPBakeryShortCode {
}
