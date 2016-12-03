<?php
function new_paper_ntx_hero_fn() {

    global $new_paper_helper;

    vc_map( array(
        'name' => esc_html__('Hero', 'new-paper'),
        'base' => 'new_paper_ntx_hero',
        'category' => esc_html__('New Paper','new-paper'),
        'params' => array(
            array(
                'type' => 'dropdown',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__('Select Hero Type', 'new-paper'),
                'param_name' => 'hero_type',
                'value' => array(
                    'Select Hero type' => '',
                    'Grid: Mega grid (7 Posts)' => 'maga-grid',
                    'Grid: 2 Columns (3 Posts)' => 'two-columns-grid',
                    'Grid: 3 Columns (4 Posts)' => 'three-columns-grid',
                    'Grid (Masonry) : 4 Columns (8 Posts)' => 'four-columns-grid',
                    'Slider (carousel) : 4 Columns'        => 'four-columns-slider',
                    'Slider (carousel) : 1 column'         => 'one-column-slider'
                ),
                'description' => esc_html__('Default: Mega Grid', 'new-paper'),

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
                    'From Category'  => 'category',
                ),
            ),
            array(
                'type' => 'dropdown',
                'holder' => '',
                'class' => '',
                'heading' => esc_html__('Category', 'new-paper'),
                'param_name' => 'category',
                'value' => $new_paper_helper->get_associative_category(),
                'description' => esc_html__('From which category do you want the post to be displayed in Page Hero.', 'new-paper'),
                'admin_label' => true,
                'dependency'    => array(
                    'element'   => 'post_source',
                    'value'     => array('category')
                ),
            ),
            array(
                'type' => 'textfield',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__('Maximum number of posts in the slider', 'new-paper'),
                'param_name' => 'no_of_posts',
                'description' => esc_html__('Maximum number of posts to be displayed in slider', 'new-paper'),
                'dependency'  => array(
                    'element'   => 'hero_type',
                    'value'     => array('four-columns-slider', 'one-column-slider')
                )
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

new_paper_ntx_hero_fn();

class WPBakeryShortCode_New_Paper_Ntx_Hero extends WPBakeryShortCode {
}
