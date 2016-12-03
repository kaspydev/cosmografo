<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'init', 'new_paper_ntx_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function new_paper_ntx_theme_options() {

    /* OptionTree is not loaded yet, or this is not an admin request */
    if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
        return false;

    /**
     * Get a copy of the saved settings array.
     */
    $saved_settings = get_option( ot_settings_id(), array() );

    /**
     * Custom settings array that will eventually be
     * passes to the OptionTree Settings API Class.
     */
    $custom_settings = array(
        'contextual_help' => array(
            'sidebar'       => esc_html__( 'For \'View More\' text', 'new-paper' )
        ),
        'sections'        => array(
            array(
                'id'          => 'general',
                'title'       => esc_html__( 'General', 'new-paper' )
            ),
            array(
                'id'          => 'new_paper_ntx_header',
                'title'       => esc_html__( 'Header', 'new-paper' )
            ),
            array(
                'id'          => 'new_paper_ntx_hiding_sidebox_section',
                'title'       => esc_html__( 'Hiding Side Box', 'new-paper' )
            ),
            array(
                'id'          => 'new_paper_ntx_single_post_section',
                'title'       => esc_html__( 'Single Post', 'new-paper' )
            ),
            array(
                'id'          => 'new_paper_ntx_instagram_feed_section',
                'title'       => esc_html__( 'Instagram Feed', 'new-paper' )
            ),
            array(
                'id'          => 'new_paper_ntx_footer_section',
                'title'       => esc_html__( 'Footer', 'new-paper' )
            ),
            array(
                'id'          => 'new_paper_ntx_contact_information_section',
                'title'       => esc_html__( 'Contact Information', 'new-paper' )
            ),
            array(
                'id'          => 'new_paper_ntx_video_page_section',
                'title'       => esc_html__( 'Video Page', 'new-paper' )
            ),
            array(
                'id'          => 'new_paper_ntx_word_customization',
                'title'       => esc_html__( 'Word Customization', 'new-paper' )
            )
        ),
        'settings'        => array(
            array(
                'id'          => 'new_paper_ntx_general_tab',
                'label'       => esc_html__( 'General', 'new-paper' ),
                'desc'        => '',
                'std'         => '',
                'type'        => 'tab',
                'section'     => 'general',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_enable_post_likes',
                'label'       => esc_html__( 'Enable Post Likes Count', 'new-paper' ),
                'desc'        => esc_html__( 'Disaplay Post Like count and post can be liked by reader if enabled. Make sure the plugin \'New Paper Package\' is active.', 'new-paper' ),
                'std'         => '',
                'type'        => 'on-off',
                'section'     => 'general',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_enable_post_view_count',
                'label'       => esc_html__( 'Display Post View Count', 'new-paper' ),
                'desc'        => esc_html__( 'Disaplay Post View count if enabled. Make sure the plugin \'New Paper Package\' is active.', 'new-paper' ),
                'std'         => '',
                'type'        => 'on-off',
                'section'     => 'general',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_enable_post_author',
                'label'       => esc_html__( 'Display Post Author', 'new-paper' ),
                'desc'        => '',
                'std'         => '',
                'type'        => 'on-off',
                'section'     => 'general',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_enable_published_date',
                'label'       => esc_html__( 'Display Post Published Date', 'new-paper' ),
                'desc'        => '',
                'std'         => '',
                'type'        => 'on-off',
                'section'     => 'general',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_social_media',
                'label'       => esc_html__( 'Site Social Share', 'new-paper' ),
                'desc'        => '',
                'std'         => '',
                'type'        => 'list-item',
                'section'     => 'general',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and',
                'settings'    => array(
                    array(
                        'id'          => 'social_media_link',
                        'label'       => esc_html__( 'Social Media Link', 'new-paper' ),
                        'desc'        => '',
                        'std'         => '',
                        'type'        => 'text',
                        'rows'        => '',
                        'post_type'   => '',
                        'taxonomy'    => '',
                        'min_max_step'=> '',
                        'class'       => '',
                        'condition'   => '',
                        'operator'    => 'and'
                    ),
                    array(
                        'id'          => 'social_media',
                        'label'       => esc_html__( 'Add Social Media', 'new-paper' ),
                        'desc'        => '',
                        'std'         => '',
                        'type'        => 'select',
                        'rows'        => '',
                        'post_type'   => '',
                        'taxonomy'    => '',
                        'min_max_step'=> '',
                        'class'       => '',
                        'condition'   => '',
                        'operator'    => 'and',
                        'choices'     => array(
                            array(
                                'value'       => 'facebook',
                                'label'       => esc_html__( 'Facebook', 'new-paper' ),
                                'src'         => ''
                            ),
                            array(
                                'value'       => 'twitter',
                                'label'       => esc_html__( 'Twitter', 'new-paper' ),
                                'src'         => ''
                            ),
                            array(
                                'value'       => 'google-plus',
                                'label'       => esc_html__( 'Google Plus', 'new-paper' ),
                                'src'         => ''
                            ),
                        )
                    )
                )
            ),
            array(
                'id'          => 'new_paper_ntx_404_image',
                'label'       => esc_html__( '404 Image', 'new-paper' ),
                'desc'        => '',
                'std'         => '',
                'type'        => 'upload',
                'section'     => 'general',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_footer_photo_gallery',
                'label'       => esc_html__( 'Widget Gallery Photo', 'new-paper' ),
                'desc'        => esc_html__( 'Choose photos to create a photo gallery to display in footer area.', 'new-paper' ),
                'std'         => '',
                'type'        => 'gallery',
                'section'     => 'general',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_popular_posts_general_tab',
                'label'       => esc_html__( 'Popular Posts', 'new-paper' ),
                'desc'        => '',
                'std'         => '',
                'type'        => 'tab',
                'section'     => 'general',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_max_popular_posta',
                'label'       => esc_html__( 'Maximum Number of posts to be regarded as popular posts', 'new-paper' ),
                'desc'        => '',
                'std'         => '',
                'type'        => 'numeric-slider',
                'section'     => 'general',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '3,100,1',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_popular_date_limit',
                'label'       => esc_html__( 'How far do you want the popular post be calculated from?', 'new-paper' ),
                'desc'        => '',
                'std'         => '',
                'type'        => 'radio',
                'section'     => 'general',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and',
                'choices'     => array(
                    array(
                        'value'       => '1-week',
                        'label'       => esc_html__( 'From Last 1 week', 'new-paper' ),
                        'src'         => ''
                    ),
                    array(
                        'value'       => '2-weeks',
                        'label'       => esc_html__( 'From Last 2 Week', 'new-paper' ),
                        'src'         => ''
                    ),
                    array(
                        'value'       => '3-weeks',
                        'label'       => esc_html__( 'From Last 3 weeks', 'new-paper' ),
                        'src'         => ''
                    ),
                    array(
                        'value'       => '1-month',
                        'label'       => esc_html__( 'From Last 1 Month', 'new-paper' ),
                        'src'         => ''
                    ),
                    array(
                        'value'       => '2-months',
                        'label'       => esc_html__( 'From Last 2 Months', 'new-paper' ),
                        'src'         => ''
                    ),
                    array(
                        'value'       => '3-months',
                        'label'       => esc_html__( 'From Last 3 Months', 'new-paper' ),
                        'src'         => ''
                    )
                )
            ),
            array(
                'id'          => 'new_paper_ntx_site_logo_header_general_tab',
                'label'       => esc_html__( 'General', 'new-paper' ),
                'desc'        => '',
                'std'         => '',
                'type'        => 'tab',
                'section'     => 'new_paper_ntx_header',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_logo',
                'label'       => esc_html__( 'Upload Global Logo : Global setting', 'new-paper' ),
                'desc'        => esc_html__( 'Best Image dimension for logo ( 193 X 35 )px', 'new-paper' ),
                'std'         => '',
                'type'        => 'upload',
                'section'     => 'new_paper_ntx_header',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_post_logo',
                'label'       => esc_html__( 'Upload Logo : Post Logo ( Will only apply to single post )', 'new-paper' ),
                'desc'        => esc_html__( 'Best Image dimension for logo ( 193 X 35 )px', 'new-paper' ),
                'std'         => '',
                'type'        => 'upload',
                'section'     => 'new_paper_ntx_header',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_enable_rainbow_bar_globally_on_header',
                'label'       => esc_html__( 'Enable Rainbow bar on header', 'new-paper' ),
                'desc'        => esc_html__( 'Disable / Enable rainbow bar on header ( applied globally in the site, however can be overwritten via specific page via page edit )', 'new-paper' ),
                'std'         => 'off',
                'type'        => 'on-off',
                'section'     => 'new_paper_ntx_header',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_header_header_type_tab',
                'label'       => esc_html__( 'Header Type', 'new-paper' ),
                'desc'        => '',
                'std'         => '',
                'type'        => 'tab',
                'section'     => 'new_paper_ntx_header',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_global_header_type',
                'label'       => esc_html__( 'Choose the global header type', 'new-paper' ),
                'desc'        => '',
                'std'         => '',
                'type'        => 'radio-image',
                'section'     => 'new_paper_ntx_header',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and',
                'choices'     => array(
                    array(
                        'value'       => 'header-arizona',
                        'label'       => esc_html__( 'Header Arizona', 'new-paper' ),
                        'src'         => get_template_directory_uri().'/assets/ot_images/header-arizona.png'
                    ),
                    array(
                        'value'       => 'header-california',
                        'label'       => esc_html__( 'Header California', 'new-paper' ),
                        'src'         => get_template_directory_uri().'/assets/ot_images/header-california.png'
                    ),
                    array(
                        'value'       => 'header-florida',
                        'label'       => esc_html__( 'Header Florida', 'new-paper' ),
                        'src'         => get_template_directory_uri().'/assets/ot_images/header-florida.png'
                    ),
                    array(
                        'value'       => 'header-housten',
                        'label'       => esc_html__( 'Header Houston', 'new-paper' ),
                        'src'         => get_template_directory_uri().'/assets/ot_images/header-houston.png'
                    ),
                    array(
                        'value'       => 'header-kansas',
                        'label'       => esc_html__( 'Header Kansas', 'new-paper' ),
                        'src'         => get_template_directory_uri().'/assets/ot_images/header-kansas.png'
                    ),
                    array(
                        'value'       => 'header-newyork',
                        'label'       => esc_html__( 'Header Newyork', 'new-paper' ),
                        'src'         => get_template_directory_uri().'/assets/ot_images/header-newyork.png'
                    ),
                    array(
                        'value'       => 'header-texas',
                        'label'       => esc_html__( 'Header Texas', 'new-paper' ),
                        'src'         => get_template_directory_uri().'/assets/ot_images/header-texas.png'
                    ),
                    array(
                        'value'       => 'header-utah',
                        'label'       => esc_html__( 'Header Utah', 'new-paper' ),
                        'src'         => get_template_directory_uri().'/assets/ot_images/header-utah.png'
                    )
                )
            ),
            array(
                'id'          => 'new_paper_ntx_top_bar_header_tab',
                'label'       => esc_html__( 'Top Bar', 'new-paper' ),
                'desc'        => '',
                'std'         => '',
                'type'        => 'tab',
                'section'     => 'new_paper_ntx_header',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_enable_topbar_globally',
                'label'       => esc_html__( 'Enable Top Bar', 'new-paper' ),
                'desc'        => esc_html__( 'Enable or disable top bar on the site. The setting can be overwritten for a specific page via specific page edit.', 'new-paper' ),
                'std'         => 'off',
                'type'        => 'on-off',
                'section'     => 'new_paper_ntx_header',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_top_bar_global_style',
                'label'       => esc_html__( 'Top-bar style', 'new-paper' ),
                'desc'        => esc_html__( 'Topbar style. Topbar style can be overwritten for specific page via specific page edit.', 'new-paper' ),
                'std'         => '',
                'type'        => 'radio',
                'section'     => 'new_paper_ntx_header',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and',
                'choices'     => array(
                    array(
                        'value'       => 'topbar-florida',
                        'label'       => esc_html__( 'Light Topbar', 'new-paper' ),
                        'src'         => ''
                    ),
                    array(
                        'value'       => 'topbar-newyork',
                        'label'       => esc_html__( 'Dark Topbar', 'new-paper' ),
                        'src'         => ''
                    ),
                    array(
                        'value'       => 'topbar-utah',
                        'label'       => esc_html__( 'New Paper Topbar', 'new-paper' ),
                        'src'         => ''
                    )
                )
            ),
            array(
                'id'          => 'new_paper_ntx_breaking_news_header_tab',
                'label'       => esc_html__( 'Breaking News', 'new-paper' ),
                'desc'        => '',
                'std'         => '',
                'type'        => 'tab',
                'section'     => 'new_paper_ntx_header',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_enable_breaking_news_globally',
                'label'       => esc_html__( 'Enable Breaking News on header', 'new-paper' ),
                'desc'        => esc_html__( 'Enabling/Disabling breaking news in header. You can overwrite this setting via specific page edit.', 'new-paper' ),
                'std'         => 'off',
                'type'        => 'on-off',
                'section'     => 'new_paper_ntx_header',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_enable_raibow_under_news',
                'label'       => esc_html__( 'Enable Rainbow bar underneath breaking news?', 'new-paper' ),
                'desc'        => esc_html__( 'The option to enable/disable can be overwritten via theme specific page edit.', 'new-paper' ),
                'std'         => 'off',
                'type'        => 'on-off',
                'section'     => 'new_paper_ntx_header',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_enable_rainbow_above_news',
                'label'       => esc_html__( 'Enable Rainbow bar above Breaking News?', 'new-paper' ),
                'desc'        => esc_html__( 'Enable/Disable rainbow bar above breaking news', 'new-paper' ),
                'std'         => 'off',
                'type'        => 'on-off',
                'section'     => 'new_paper_ntx_header',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_side_hiding_box_logo',
                'label'       => esc_html__( 'Side hiding Box logo', 'new-paper' ),
                'desc'        => esc_html__( 'Logo that will appear at the top of Hiding side box', 'new-paper' ),
                'std'         => '',
                'type'        => 'upload',
                'section'     => 'new_paper_ntx_hiding_sidebox_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_side_hiding_box_style_global',
                'label'       => esc_html__( 'Side hiding box style', 'new-paper' ),
                'desc'        => '',
                'std'         => '',
                'type'        => 'radio',
                'section'     => 'new_paper_ntx_hiding_sidebox_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and',
                'choices'     => array(
                    array(
                        'value'       => 'grey',
                        'label'       => esc_html__( 'Greyish Mode', 'new-paper' ),
                        'src'         => ''
                    ),
                    array(
                        'value'       => 'colored',
                        'label'       => esc_html__( 'Reddish Mode', 'new-paper' ),
                        'src'         => ''
                    )
                )
            ),
            array(
                'id'          => 'new_paper_ntx_single_general_tab',
                'label'       => esc_html__( 'General', 'new-paper' ),
                'desc'        => '',
                'std'         => '',
                'type'        => 'tab',
                'section'     => 'new_paper_ntx_single_post_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_single_post_layout',
                'label'       => esc_html__( 'Single Post layout', 'new-paper' ),
                'desc'        => esc_html__( 'This is a global setting for all the single post. However, you can also specify particular layout for a particular post from the post edit page.', 'new-paper' ),
                'std'         => '',
                'type'        => 'radio',
                'section'     => 'new_paper_ntx_single_post_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and',
                'choices'     => array(
                    array(
                        'value'       => 'default',
                        'label'       => esc_html__( 'Default Layout', 'new-paper' ),
                        'src'         => ''
                    ),
                    array(
                        'value'       => 'full-width',
                        'label'       => esc_html__( 'Full Width Layout', 'new-paper' ),
                        'src'         => ''
                    )
                )
            ),
            array(
                'id'          => 'new_paper_ntx_enable_post_navigation',
                'label'       => esc_html__( 'Display Post Navigation', 'new-paper' ),
                'desc'        => '',
                'std'         => '',
                'type'        => 'on-off',
                'section'     => 'new_paper_ntx_single_post_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_enable_author_information',
                'label'       => esc_html__( 'Display Author Biography information', 'new-paper' ),
                'desc'        => esc_html__( 'Enable or disable to show author information which is displayed in the single post after the content.', 'new-paper' ),
                'std'         => '',
                'type'        => 'on-off',
                'section'     => 'new_paper_ntx_single_post_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_display_post_tags',
                'label'       => esc_html__( 'Display the list of tags associated with the blog post', 'new-paper' ),
                'desc'        => esc_html__( 'Display the list of tags associated with the blog post which is displayed after the post content.', 'new-paper' ),
                'std'         => '',
                'type'        => 'on-off',
                'section'     => 'new_paper_ntx_single_post_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_enable_category_on_post',
                'label'       => esc_html__( 'Display the categories of the post on top of blog post', 'new-paper' ),
                'desc'        => '',
                'std'         => '',
                'type'        => 'on-off',
                'section'     => 'new_paper_ntx_single_post_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_single_related_post_tab',
                'label'       => esc_html__( 'Related Post', 'new-paper' ),
                'desc'        => '',
                'std'         => '',
                'type'        => 'tab',
                'section'     => 'new_paper_ntx_single_post_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_enable_related_posts',
                'label'       => esc_html__( 'Display the related posts', 'new-paper' ),
                'desc'        => '',
                'std'         => '',
                'type'        => 'on-off',
                'section'     => 'new_paper_ntx_single_post_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_max_number_of_related_posts',
                'label'       => esc_html__( 'Number of maximum related posts to be displayed in single post.', 'new-paper' ),
                'desc'        => esc_html__( 'You can select the number of related post with interval of 3 to make the theme design consistent.', 'new-paper' ),
                'std'         => '',
                'type'        => 'numeric-slider',
                'section'     => 'new_paper_ntx_single_post_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '3,30,3',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_single_social_share_button_tab',
                'label'       => esc_html__( 'Social Share Button', 'new-paper' ),
                'desc'        => '',
                'std'         => '',
                'type'        => 'tab',
                'section'     => 'new_paper_ntx_single_post_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_enable_social_share',
                'label'       => esc_html__( 'Enable Social Share', 'new-paper' ),
                'desc'        => esc_html__( 'Enable or disable social share in single post', 'new-paper' ),
                'std'         => '',
                'type'        => 'on-off',
                'section'     => 'new_paper_ntx_single_post_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_global_social_share_button_placement',
                'label'       => esc_html__( 'Social Share button Placement', 'new-paper' ),
                'desc'        => esc_html__( 'Change the placement of social share button globally. You can also overwrite global placement of a social share button for a particular post via post edit.', 'new-paper' ),
                'std'         => '',
                'type'        => 'select',
                'section'     => 'new_paper_ntx_single_post_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and',
                'choices'     => array(
                    array(
                        'value'       => 'before',
                        'label'       => esc_html__( 'Before Content', 'new-paper' ),
                        'src'         => ''
                    ),
                    array(
                        'value'       => 'side',
                        'label'       => esc_html__( 'Content\'s left side', 'new-paper' ),
                        'src'         => ''
                    )
                )
            ),
            array(
                'id'          => 'new_paper_ntx_social_share',
                'label'       => esc_html__( 'Add Social Share from the available options', 'new-paper' ),
                'desc'        => '',
                'std'         => '',
                'type'        => 'list-item',
                'section'     => 'new_paper_ntx_single_post_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and',
                'settings'    => array(
                    array(
                        'id'          => 'social_type',
                        'label'       => esc_html__( 'Social Type', 'new-paper' ),
                        'desc'        => '',
                        'std'         => '',
                        'type'        => 'select',
                        'rows'        => '',
                        'post_type'   => '',
                        'taxonomy'    => '',
                        'min_max_step'=> '',
                        'class'       => '',
                        'condition'   => '',
                        'operator'    => 'and',
                        'choices'     => array(
                            array(
                                'value'       => 'facebook',
                                'label'       => esc_html__( 'Facebook', 'new-paper' ),
                                'src'         => ''
                            ),
                            array(
                                'value'       => 'twitter',
                                'label'       => esc_html__( 'Twitter', 'new-paper' ),
                                'src'         => ''
                            ),
                            array(
                                'value'       => 'instagram',
                                'label'       => esc_html__( 'Instagram', 'new-paper' ),
                                'src'         => ''
                            ),
                            array(
                                'value'       => 'google-plus',
                                'label'       => esc_html__( 'Google Plus', 'new-paper' ),
                                'src'         => ''
                            ),
                            array(
                                'value'       => 'dribbble',
                                'label'       => esc_html__( 'Dribble', 'new-paper' ),
                                'src'         => ''
                            ),
                            array(
                                'value'       => 'behance',
                                'label'       => esc_html__( 'Behance', 'new-paper' ),
                                'src'         => ''
                            )
                        )
                    )
                )
            ),
            array(
                'id'          => 'new_paper_ntx_enable_instagram_feed',
                'label'       => esc_html__( 'Enable Instagram Feed ( Displayed in the footer )', 'new-paper' ),
                'desc'        => '',
                'std'         => '',
                'type'        => 'on-off',
                'section'     => 'new_paper_ntx_instagram_feed_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_instagram_title',
                'label'       => esc_html__( 'Title of the Instagram Section', 'new-paper' ),
                'desc'        => esc_html__( 'Title of the Instagram Feed section. Default : Instagram Feed', 'new-paper' ),
                'std'         => '',
                'type'        => 'text',
                'section'     => 'new_paper_ntx_instagram_feed_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_footer_column_layout',
                'label'       => esc_html__( 'Footer Column Layout', 'new-paper' ),
                'desc'        => '',
                'std'         => '',
                'type'        => 'radio',
                'section'     => 'new_paper_ntx_footer_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and',
                'choices'     => array(
                    array(
                        'value'       => '1',
                        'label'       => esc_html__( 'One Column', 'new-paper' ),
                        'src'         => ''
                    ),
                    array(
                        'value'       => '2',
                        'label'       => esc_html__( 'Two Columns', 'new-paper' ),
                        'src'         => ''
                    ),
                    array(
                        'value'       => '3',
                        'label'       => esc_html__( 'Three Columns [ Default ]', 'new-paper' ),
                        'src'         => ''
                    ),
                    array(
                        'value'       => '4',
                        'label'       => esc_html__( 'Four Columns', 'new-paper' ),
                        'src'         => ''
                    )
                )
            ),
            array(
                'id'          => 'new_paper_ntx_sub_footer_left',
                'label'       => esc_html__( 'Sub-footer text ( Left Column )', 'new-paper' ),
                'desc'        => '',
                'std'         => '',
                'type'        => 'text',
                'section'     => 'new_paper_ntx_footer_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_sub_footer_right',
                'label'       => esc_html__( 'Sub-footer text ( Right Column)', 'new-paper' ),
                'desc'        => '',
                'std'         => '',
                'type'        => 'text',
                'section'     => 'new_paper_ntx_footer_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_add_address_info',
                'label'       => esc_html__( 'Add Address Info', 'new-paper' ),
                'desc'        => '',
                'std'         => '',
                'type'        => 'list-item',
                'section'     => 'new_paper_ntx_contact_information_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and',
                'settings'    => array(
                    array(
                        'id'          => 'address_1',
                        'label'       => esc_html__( 'Address Line 1', 'new-paper' ),
                        'desc'        => '',
                        'std'         => '',
                        'type'        => 'text',
                        'rows'        => '',
                        'post_type'   => '',
                        'taxonomy'    => '',
                        'min_max_step'=> '',
                        'class'       => '',
                        'condition'   => '',
                        'operator'    => 'and'
                    ),
                    array(
                        'id'          => 'address_2',
                        'label'       => esc_html__( 'Address Line 2', 'new-paper' ),
                        'desc'        => '',
                        'std'         => '',
                        'type'        => 'text',
                        'rows'        => '',
                        'post_type'   => '',
                        'taxonomy'    => '',
                        'min_max_step'=> '',
                        'class'       => '',
                        'condition'   => '',
                        'operator'    => 'and'
                    ),
                    array(
                        'id'          => 'address_line_3',
                        'label'       => esc_html__( 'Address Line 3', 'new-paper' ),
                        'desc'        => '',
                        'std'         => '',
                        'type'        => 'text',
                        'rows'        => '',
                        'post_type'   => '',
                        'taxonomy'    => '',
                        'min_max_step'=> '',
                        'class'       => '',
                        'condition'   => '',
                        'operator'    => 'and'
                    )
                )
            ),
            array(
                'id'          => 'new_paper_ntx_contact_number_info',
                'label'       => esc_html__( 'Contact Number Info', 'new-paper' ),
                'desc'        => '',
                'std'         => '',
                'type'        => 'list-item',
                'section'     => 'new_paper_ntx_contact_information_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and',
                'settings'    => array(
                    array(
                        'id'          => 'number',
                        'label'       => esc_html__( 'Number', 'new-paper' ),
                        'desc'        => '',
                        'std'         => '',
                        'type'        => 'text',
                        'rows'        => '',
                        'post_type'   => '',
                        'taxonomy'    => '',
                        'min_max_step'=> '',
                        'class'       => '',
                        'condition'   => '',
                        'operator'    => 'and'
                    )
                )
            ),
            array(
                'id'          => 'new_paper_ntx_email_info',
                'label'       => esc_html__( 'Email Info', 'new-paper' ),
                'desc'        => '',
                'std'         => '',
                'type'        => 'list-item',
                'section'     => 'new_paper_ntx_contact_information_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and',
                'settings'    => array(
                    array(
                        'id'          => 'email',
                        'label'       => esc_html__( 'Email', 'new-paper' ),
                        'desc'        => '',
                        'std'         => '',
                        'type'        => 'text',
                        'rows'        => '',
                        'post_type'   => '',
                        'taxonomy'    => '',
                        'min_max_step'=> '',
                        'class'       => '',
                        'condition'   => '',
                        'operator'    => 'and'
                    )
                )
            ),
            array(
                'id'          => 'new_paper_ntx_featured_category',
                'label'       => esc_html__( 'Choose the category to be displayed in video page', 'new-paper' ),
                'desc'        => esc_html__( 'The selected video category will be featured in every video image.', 'new-paper' ),
                'std'         => '',
                'type'        => 'taxonomy-checkbox',
                'section'     => 'new_paper_ntx_video_page_section',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => 'new_paper_ntx_video_category',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_all_text',
                'label'       => esc_html__( 'Text : \'All\'', 'new-paper' ),
                'desc'        => esc_html__( 'For the text \'All. Appears mostly in archive pages', 'new-paper' ),
                'std'         => '',
                'type'        => 'text',
                'section'     => 'new_paper_ntx_word_customization',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_blogs_text',
                'label'       => esc_html__( 'Text : \'Blogs\'', 'new-paper' ),
                'desc'        => esc_html__( 'For the text, \'Blogs\' which appear in all blogs as a title.', 'new-paper' ),
                'std'         => '',
                'type'        => 'text',
                'section'     => 'new_paper_ntx_word_customization',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_breaking_news_text',
                'label'       => esc_html__( 'Text: \'Breaking News\'', 'new-paper' ),
                'desc'        => esc_html__( 'Text for \'Breaking News\'', 'new-paper' ),
                'std'         => '',
                'type'        => 'text',
                'section'     => 'new_paper_ntx_word_customization',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_video_singular_text',
                'label'       => esc_html__( 'Text : \'Video\'', 'new-paper' ),
                'desc'        => esc_html__( 'For \'Video\' singular text', 'new-paper' ),
                'std'         => '',
                'type'        => 'text',
                'section'     => 'new_paper_ntx_word_customization',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_videos_text',
                'label'       => esc_html__( 'Text  : \'Videos\'', 'new-paper' ),
                'desc'        => esc_html__( 'For the text \'videos\' which appears in video page.', 'new-paper' ),
                'std'         => '',
                'type'        => 'text',
                'section'     => 'new_paper_ntx_word_customization',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id'          => 'new_paper_ntx_view_more_text',
                'label'       => esc_html__( 'Text : \'View More\'', 'new-paper' ),
                'desc'        => esc_html__( 'For \'View More\' text in the site.', 'new-paper' ),
                'std'         => '',
                'type'        => 'text',
                'section'     => 'new_paper_ntx_word_customization',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            )
        )
    );

    /* allow settings to be filtered before saving */
    $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );

    /* settings are not the same update the DB */
    if ( $saved_settings !== $custom_settings ) {
        update_option( ot_settings_id(), $custom_settings );
    }

    /* Lets OptionTree know the UI Builder is being overridden */
    global $ot_has_custom_theme_options;
    $ot_has_custom_theme_options = true;

}