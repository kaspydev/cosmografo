<?php
function new_paper_ntx_video_player_fn() {

    global $new_paper_helper;

    vc_map( array(
        'name' => esc_html__('Video Player', 'new-paper'),
        'base' => 'new_paper_ntx_video_player',
        'category' => esc_html__('New Paper','new-paper'),
        'params' => array(

            array(
                'type' => 'dropdown',
                'holder' => 'div',
                'class' => '',
                'heading' => esc_html__('Video Source', 'new-paper'),
                'description'   => esc_html__('Default : Latest Videos', 'new-paper'),
                'param_name' => 'post_source',
                'value' => array(
                    'Select Video Source'        => '',
                    'Latest Videos'              => 'latest',
                    'From Video Category'        => 'category',
                ),
            ),
            array(
                'type' => 'dropdown',
                'holder' => '',
                'class' => '',
                'heading' => esc_html__('Category', 'new-paper'),
                'param_name' => 'category',
                'value'     => $new_paper_helper->get_associative_category('new_paper_ntx_video_category'),
                'description' => esc_html__('From which category do you want the post to be displayed in Page Hero.', 'new-paper'),
                'admin_label' => true,
                'dependency'    => array(
                    'element'   => 'post_source',
                    'value'     => array('category')
                ),
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

new_paper_ntx_video_player_fn();

class WPBakeryShortCode_New_Paper_Ntx_Video_Player extends WPBakeryShortCode {
}
