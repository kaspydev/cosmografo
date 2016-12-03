<?php

add_action( 'admin_init', 'new_paper_ntx_post_metabox' );

function new_paper_ntx_post_metabox() {

    $new_paper_ntx_post_metabox = array(
        'id'          => 'new_paper_ntx_page_metabox',
        'title'       => esc_html__( 'Post Options', 'new-paper' ),
        'desc'        => '',
        'pages'       => array( 'post' ),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(

            /*post layout*/
            array(
                'id'          => 'new_paper_ntx_particular_post_layout',
                'label'       => esc_html__( 'Select layout for this post only (Will overwrite global single post layout) ', 'new-paper' ),
                'type'        => 'select',
                'section'     => 'option_types',
                'choices'     => array(
                    array(
                        'value'       => '',
                        'label'       => esc_html__( 'Choose Layout', 'new-paper' )
                    ),
                    array(
                        'value'       => 'default',
                        'label'       => esc_html__( 'Default Layout', 'new-paper' )
                    ),
                    array(
                        'value'       => 'full-width',
                        'label'       => esc_html__( 'Full Width Layout', 'new-paper' )
                    )
                )
            ),

            // Post lead paragraph
            array(
                'id'          => 'new_paper_ntx_lead_paragraph',
                'label'       => esc_html__( 'Post\'s Lead Paragraph', 'new-paper' ),
                'desc'        => esc_html__('This Paragraph will be displayed at the top with high focus.', 'new-paper'),
                'std'         => esc_html__('Your Lead Paragrpah goes here', 'new-paper'),
                'type'        => 'textarea-simple',
                'rows'        => '5',
                'operator'    => 'and'
            ),

            // gallery on-off
            array(
                'id'          => 'new_paper_ntx_enable_gallery_single_post',
                'label'       => esc_html__( 'Enable Gallery in This post', 'new-paper' ),
                'desc'        => esc_html__('Make sure you have gallery images when you enabled this setting. Create gallery just below this setting', 'new-paper'),
                'std'         => 'off',
                'type'        => 'on-off'
            ),

            // gallery
            array(
                'id'          => 'new_paper_ntx_post_gallery',
                'label'       => esc_html__( 'Gallery', 'new-paper' ),
                'desc'        => esc_html__('This gallery will appear as a image slider in the single post if gallery display is set enabled', 'new-paper'),
                'std'         => '',
                'type'        => 'gallery'
            ),

            array(
                'id'          => 'new_paper_ntx_social_share_location',
                'label'       => esc_html__( 'Choose the placement of social share button.', 'new-paper' ),
                'desc'          => esc_html__('Note: you can enable/disable social share globally for all post via theme options', 'new-paper'),
                'type'        => 'select',
                'section'     => 'option_types',
                'choices'     => array(
                    array(
                        'value'       => '',
                        'label'       => esc_html__( 'Choose Placement', 'new-paper' )
                    ),
                    array(
                        'value'       => 'before',
                        'label'       => esc_html__( 'Before Content', 'new-paper' )
                    ),
                    array(
                        'value'       => 'side',
                        'label'       => esc_html__( 'Content\'s left side', 'new-paper' )
                    )
                )
            ),

        )
    );



    /**
     * Register our meta boxes using the
     * ot_register_meta_box() function.
     */
    if ( function_exists( 'ot_register_meta_box' ) ){

        ot_register_meta_box( $new_paper_ntx_post_metabox );

    }

}

