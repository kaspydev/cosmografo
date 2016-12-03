<?php
function new_paper_ntx_features_articles_fn() {

    global $new_paper_helper;

    vc_map( array(
        'name' => esc_html__('Feature Articles', 'new-paper'),
        'base' => 'new_paper_ntx_features_articles',
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
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__('Source of posts', 'new-paper'),
                'description'   => esc_html__('Default : Latest Posts', 'new-paper'),
                'param_name' => 'post_source',
                'value' => array(
                    'Select Post Source'    => '',
                    'Latest Post'           => 'latest',
                    'From Category'         => 'category',
                ),
            ),
            array(
                'type' => 'dropdown',
                'holder' => '',
                'class' => '',
                'heading' => esc_html__('Category', 'new-paper'),
                'param_name' => 'category',
                'value'     => $new_paper_helper->get_associative_category(),
                'description' => esc_html__('From which category do you want the post to be displayed in Page Hero.', 'new-paper'),
                'admin_label' => true,
                'dependency'    => array(
                    'element'   => 'post_source',
                    'value'     => array('category')
                ),
            ),
            array(
                'type' => 'dropdown',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__('Select Column Layout', 'new-paper'),
                'param_name' => 'layout',
                'value' => array(
                    'Select layout' => '',
                    '3 Column' => 3,
                    '2 Column' => 2
                ),
                'description' => esc_html__('Default: 3 columns', 'new-paper'),

            ),
            array(
                'type' => 'dropdown',
                'holder' => '',
                'class' => '',
                'group' => 'Feature Option',
                'heading' => esc_html__('Display Category', 'new-paper'),
                'param_name' => 'enable_category',
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

new_paper_ntx_features_articles_fn();

class WPBakeryShortCode_New_Paper_Ntx_Features_Articles extends WPBakeryShortCode {
}
