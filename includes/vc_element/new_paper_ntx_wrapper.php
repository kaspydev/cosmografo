<?php
function new_paper_ntx_wrapper_fn()
{
    vc_map(array(
            'name' => esc_html__('Wrapper', 'new-paper'),
            'base' => 'new_paper_ntx_wrapper',
            'description' => esc_html__('Provides the wrapper for the element. Useful for inserting contianer if needed', 'new-paper'),
            'class' => '',
            'group' => '',
            'category' => esc_html__('New Paper', 'new-paper'),
            'is_container' => true,
            'js_view' => 'VcColumnView',
            //'as_parent'     => array('except' => 'custom_container'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
            //'as_child' => array('except' => 'vc_row'), // Use only|except attributes to limit parent (separate multiple values with comma)
            'content_element' => true,
            'show_settings_on_create' => true,

            //'admin_enqueue_js'  => '', // Absolute url to javascript file, this js will be loaded in the js_composer edit mode (it allows you to add more functionality to your shortcode in js_composer edit mode)
            //'admin_enqueue_css' => '', // Absolute url to css file if you need to add custom css for element block in js_composer constructor mode
            //'front_enqueue_js'  => '', // Absolute url to javascript file (useful for storing your custom backbone.js views), this js will be loaded in the js_composer frontend edit mode (it allows you to add more functionality to your shortcode in js_composer frontend edit mode).
            //'front_enqueue_css'  => '', // Absolute url to css file if you need to load custom css file in the frontend editing mode.
            //'icon'    => '', // refer vc_map docs
            //'custom_markup' => '', //Custom html markup for representing shortcode in visual composer editor
            //'html_template' => '', // Path to shortcode template. This is useful if you want to reassign path of existing content elements through your plugin. Another way to change html markup

            'params' => array(
                // add params same as with any other content element
                array(
                    'type'          => 'dropdown',
                    'holder'        => '',
                    'heading'       => esc_html__('Type of wrapper to place.', 'new-paper'),
                    'param_name'    => 'wrapper_type',
                    'description'   => esc_html__('', 'new-paper'),
                    'admin_label'   => false,
                    'weight'        => '',
                    'value'         => array(
                        'Select Wrapper'    => '',
                        'Section'     => 'section',
                        'Div'         => 'div'
                    ),
                    'dependency'    => '',

                    //'class'     => '',
                    //'edit_field_class'  => 'col-md-12',
                ),
                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    'heading' => esc_html__('Wrapper Class Name', 'new-paper'),
                    'param_name' => 'el_class',
                    'description' => esc_html__('Class to be added to the the wrapper. Some of the predefine classes are [content, candy-wrapper, main, inner]', 'new-paper'),
                    'weight' => '',
                    'group' => '',
                    'value' => '',
                    'dependency' => '',

                    //'class'     => '',
                    //'edit_field_class'  => '',
                ),
                array(
                    'type'          => 'dropdown',
                    'holder'        => '',
                    'heading'       => esc_html__('Place inner container inside section wrapper.', 'new-paper'),
                    'param_name'    => 'inner_container',
                    'description'   => esc_html__('', 'new-paper'),
                    'admin_label'   => false,
                    'weight'        => '',
                    'value'         => array(
                        'Select option'    => '',
                        'yes'              => 'yes',
                        'no'               => 'no'
                    ),
                    'description' => esc_html__('Default: yes', 'new-paper'),

                    'dependency'    => '',
                ),

                array(
                    'type' 				=> 'css_editor',
                    'class' 			=> '',
                    'group' 			=> esc_html__('Design Options', 'new-paper'),
                    'heading' 			=> esc_html__('CSS', 'new-paper'),
                    'param_name' 		=> 'css',
                ),
            ),
            // parameter end
        )
    /*vc_map array data end*/
    );
    /*vc_map paranthesis end*/
}

new_paper_ntx_wrapper_fn();

class WPBakeryShortCode_New_Paper_Ntx_Wrapper extends WPBakeryShortCodesContainer {
}

