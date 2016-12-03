<?php

add_action( 'admin_init', 'new_paper_ntx_page_metabox' );


function new_paper_ntx_page_metabox() {

    $header_type = array(
        'id'          => 'new_paper_ntx_page_header_type',
        'label'       => esc_html__( 'Choose the Header / Menu type for this page only.', 'new-paper' ),
        'type'        => 'radio-image',
        'choices'     => array(
            array(
                'value'       => '',
                'label'       => esc_html__( 'Inherit From Global setting', 'new-paper' ),
                'src'         => get_template_directory_uri() . '/assets/ot_images/global_setting.png'
            ),
            array(
                'value'       => 'header-arizona',
                'label'       => esc_html__( 'Header Arizona', 'new-paper' ),
                'src'         => get_template_directory_uri() . '/assets/ot_images/header-arizona.png'
            ),
            array(
                'value'       => 'header-california',
                'label'       => esc_html__( 'Header California', 'new-paper' ),
                'src'         => get_template_directory_uri() . '/assets/ot_images/header-california.png'
            ),
            array(
                'value'       => 'header-florida',
                'label'       => esc_html__( 'Header Florida', 'new-paper' ),
                'src'         => get_template_directory_uri() . '/assets/ot_images/header-florida.png'
            ),
            array(
                'value'       => 'header-housten',
                'label'       => esc_html__( 'Header Houston', 'new-paper' ),
                'src'         => get_template_directory_uri() . '/assets/ot_images/header-houston.png'
            ),
            array(
                'value'       => 'header-kansas',
                'label'       => esc_html__( 'Header Kansas', 'new-paper' ),
                'src'         => get_template_directory_uri() . '/assets/ot_images/header-kansas.png'
            ),
            array(
                'value'       => 'header-newyork',
                'label'       => esc_html__( 'Header Newyork', 'new-paper' ),
                'src'         => get_template_directory_uri() . '/assets/ot_images/header-newyork.png'
            ),
            array(
                'value'       => 'header-texas',
                'label'       => esc_html__( 'Header Texas', 'new-paper' ),
                'src'         => get_template_directory_uri() . '/assets/ot_images/header-texas.png'
            ),
            array(
                'value'       => 'header-utah',
                'label'       => esc_html__( 'Header Utah', 'new-paper' ),
                'src'         => get_template_directory_uri() . '/assets/ot_images/header-utah.png'
            ),

        )
    );

    $header_logo = array(

        'id'          => 'new_paper_ntx_page_site_logo',
        'label'       => esc_html__( 'Choose the logo to appear in the menu for this page only.', 'new-paper' ),
        'desc'       => esc_html__( 'This will overwrite the global logo set from theme option. If left empty will take the global logo setting.', 'new-paper' ),
        'type'        => 'upload',

    );

    $sidebox_layout = array(
        'id'          => 'new_paper_ntx_page_side_box_type',
        'label'       => esc_html__( 'Side hiding box style', 'new-paper' ),
        'type'        => 'radio',
        'choices'     => array(
            array(
                'value'       => '',
                'label'       => esc_html__( 'Inherit From Global setting', 'new-paper' )
            ),
            array(
                'value'       => 'grey',
                'label'       => esc_html__( 'Gryeish Mode', 'new-paper' )
            ),
            array(
                'value'       => 'colored',
                'label'       => esc_html__( 'Reddish Mode', 'new-paper' )
            )
        )
    );

    $enable_rabow_bar = array(
        'id'        => 'new_paper_ntx_page_enable_rainbow_bar',
        'label'     => esc_html__( 'Enable Raibow bar on header', 'new-paper' ),
        'type'        => 'radio',
        'choices'     => array(
            array(
                'value'       => '',
                'label'       => esc_html__( 'Inherit from global setting', 'new-paper' )
            ),
            array(
                'value'       => 'on',
                'label'       => esc_html__( 'Enable Rainbow Bar', 'new-paper' )
            ),
            array(
                'value'       => 'off',
                'label'       => esc_html__( 'Disable Rainbow Bar', 'new-paper' )
            ),
        )
    );

    $enable_top_bar = array(
        'id'        => 'new_paper_ntx_page_enable_topbar',
        'label'     => esc_html__( 'Enable Topbar', 'new-paper' ),
        'desc'      => esc_html__( 'This will overwrite the global setting of enabling/disabling of topbar from theme option', 'new-paper' ),
        'type'        => 'radio',
        'choices'     => array(
            array(
                'value'       => '',
                'label'       => esc_html__( 'Inherit from global setting', 'new-paper' )
            ),
            array(
                'value'       => 'on',
                'label'       => esc_html__( 'Enable Top Bar', 'new-paper' )
            ),
            array(
                'value'       => 'off',
                'label'       => esc_html__( 'Disable Top Bar', 'new-paper' )
            ),
        )

    );

    $topbar_style = array(
        'id'          => 'new_paper_ntx_page_topbar_style',
        'label'       => esc_html__( 'Top-bar Style', 'new-paper' ),
        'type'        => 'radio',
        'desc'          => esc_html__('This will overwrite the global setting of Topbar style from theme option', 'new-paper'),
        'choices'     => array(
            array(
                'value'       => '',
                'label'       => esc_html__( 'Inherit from global setting', 'new-paper' )
            ),
            array(
                'value'       => 'topbar-florida',
                'label'       => esc_html__( 'Light Topbar', 'new-paper' )
            ),
            array(
                'value'       => 'topbar-newyork',
                'label'       => esc_html__( 'Dark Topbar', 'new-paper' )
            ),
            array(
                'value'       => 'topbar-utah',
                'label'       => esc_html__( 'New Paper Topbar', 'new-paper' )
            )
        )
    );

    $enable_breaking_news = array(
        'id'        => 'new_paper_ntx_page_enable_breaking_news',
        'label'     => esc_html__( 'Enable Breaking news in this page', 'new-paper' ),
        'desc'          => esc_html__('This will overwrite the global setting of enabling/disabling breaking news from theme option', 'new-paper'),
        'type'        => 'radio',
        'choices'     => array(
            array(
                'value'       => '',
                'label'       => esc_html__( 'Inherit from global setting', 'new-paper' )
            ),
            array(
                'value'       => 'on',
                'label'       => esc_html__( 'Enable Breaking News', 'new-paper' )
            ),
            array(
                'value'       => 'off',
                'label'       => esc_html__( 'Disable Breaking News', 'new-paper' )
            ),
        )
    );

    $enable_rainbow_bar_under_news = array(
        'id'        => 'new_paper_ntx_page_enable_rainbow_bar_under_news',
        'label'     => esc_html__( 'Enable Raibow bar under Breaking News', 'new-paper' ),
        'desc'          => esc_html__('This will overwrite the global setting of enabling/disabling rainbow bar underneat breaking news from theme option', 'new-paper'),
        'type'        => 'radio',
        'choices'     => array(
            array(
                'value'       => '',
                'label'       => esc_html__( 'Inherit from global setting', 'new-paper' )
            ),
            array(
                'value'       => 'on',
                'label'       => esc_html__( 'Enable Rainbow Bar under Breaking News', 'new-paper' )
            ),
            array(
                'value'       => 'off',
                'label'       => esc_html__( 'Disable Rainbow Bar under Breaking News', 'new-paper' )
            ),
        ),
        'condition'   => 'new_paper_ntx_page_enable_breaking_news:is(on)',
    );

    $enable_rainbow_bar_above_news = array(
        'id'        => 'new_paper_ntx_page_enable_rainbow_bar_above_news',
        'label'     => esc_html__( 'Enable Raibow bar above Breaking News', 'new-paper' ),
        'desc'          => esc_html__('This will overwrite the global setting of enabling/disabling rainbow bar above breaking news from theme option', 'new-paper'),
        'type'        => 'radio',
        'choices'     => array(
            array(
                'value'       => '',
                'label'       => esc_html__( 'Inherit from global setting', 'new-paper' )
            ),
            array(
                'value'       => 'on',
                'label'       => esc_html__( 'Enable Rainbow Bar above Breaking News', 'new-paper' )
            ),
            array(
                'value'       => 'off',
                'label'       => esc_html__( 'Disable Rainbow Bar above Breaking News', 'new-paper' )
            ),
        ),
        'condition'   => 'new_paper_ntx_page_enable_breaking_news:is(on)',
    );

    $new_paper_ntx_page_metabox = array(
        'id'          => 'new_paper_ntx_page_metabox',
        'title'       => esc_html__( 'Page Options', 'new-paper' ),
        'desc'        => '',
        'pages'       => array( 'page' ),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(


            array(
                'id'          => 'new_paper_ntx_page_general_tab',
                'label'       => esc_html__( 'General', 'new-paper' ),
                'type'        => 'tab',
            ),

            $header_logo,
            $sidebox_layout,
            $enable_rabow_bar,
            $enable_breaking_news,
            $enable_rainbow_bar_under_news,
            $enable_rainbow_bar_above_news,

            array(
                'id'          => 'new_paper_ntx_page_topbar_tab',
                'label'       => esc_html__( 'Topbar', 'new-paper' ),
                'type'        => 'tab',
            ),
            $enable_top_bar,
            $topbar_style,

            array(
                'id'          => 'new_paper_ntx_page_menu_tab',
                'label'       => esc_html__( 'Menu Type', 'new-paper' ),
                'type'        => 'tab',
            ),


            $header_type,


        )
    );


    // display this when default page template is chosen
    $new_paper_ntx_page_metabox_normal = array(
        'id'          => 'new_paper_ntx_page_metabox',
        'title'       => esc_html__( 'Page Options', 'new-paper' ),
        'desc'        => '',
        'pages'       => array( 'page' ),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(


            /*general tab*/
            array(
                'id'          => 'new_paper_ntx_page_general_tab',
                'label'       => esc_html__( 'General', 'new-paper' ),
                'type'        => 'tab',
            ),

            $header_logo,
            $sidebox_layout,
            $enable_rabow_bar,
            $enable_breaking_news,
            $enable_rainbow_bar_under_news,
            $enable_rainbow_bar_above_news,

            /*title layout*/
            array(
                'id'          => 'new_paper_ntx_page_title_style',
                'label'       => esc_html__( 'Select Title display style', 'new-paper' ),
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
                        'value'       => 'bar',
                        'label'       => esc_html__( 'Bar', 'new-paper' )
                    )
                )
            ),

            /*Page layout*/
            array(
                'id'          => 'new_paper_ntx_particular_post_layout',
                'label'       => esc_html__( 'Select layout for this page only (Will overwrite global single post layout) ', 'new-paper' ),
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

            // Page lead paragraph
            array(
                'id'          => 'new_paper_ntx_lead_paragraph',
                'label'       => esc_html__( 'Page\'s Lead Paragraph', 'new-paper' ),
                'desc'        => esc_html__('This Paragraph will be displayed at the top with high focus.', 'new-paper'),
                'std'         => esc_html__('Your Lead Paragrpah goes here', 'new-paper'),
                'type'        => 'textarea-simple',
                'rows'        => '5',
                'operator'    => 'and'
            ),

            // gallery on-off
            array(
                'id'          => 'new_paper_ntx_enable_gallery_single_post',
                'label'       => esc_html__( 'Enable Gallery in This page', 'new-paper' ),
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

            array(
                'id'          => 'new_paper_ntx_page_topbar_tab',
                'label'       => esc_html__( 'Topbar', 'new-paper' ),
                'type'        => 'tab',
            ),
            $enable_top_bar,
            $topbar_style,

            array(
                'id'          => 'new_paper_ntx_page_menu_tab',
                'label'       => esc_html__( 'Menu Type', 'new-paper' ),
                'type'        => 'tab',
            ),


            $header_type,

        )
    );



    /**
     * Register our meta boxes using the
     * ot_register_meta_box() function.
     */
    if ( function_exists( 'ot_register_meta_box' ) ){

        $post_id = (isset($_GET['post'])) ? $_GET['post'] : ((isset($_POST['post_ID'])) ? $_POST['post_ID'] : false);

        $post_template = '';

        if ($post_id){
            $post_template = get_post_meta($post_id, '_wp_page_template', true);
        }

        // Home page metabox
        $except_page = array(
            'page-home.php',
            'page-vc_page.php',
            '404.php'
        );

        ot_register_meta_box($new_paper_ntx_page_metabox);

        if(!in_array($post_template, $except_page)){
            ot_register_meta_box( $new_paper_ntx_page_metabox_normal );
        }


    }

}

