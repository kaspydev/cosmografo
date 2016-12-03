<?php

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once trailingslashit( get_template_directory() ). 'lib/TGM/class-tgm-plugin-activation.php';


add_action( 'tgmpa_register', 'new_paper_ntx_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function new_paper_ntx_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // BUNDLED PLUGINS
        array(
            'name'               => esc_html__('New Paper Package', 'new-paper'),
            'slug'               => 'new-paper-package',
            'source'             => get_template_directory().'/lib/bundled/new-paper-package.zip',
            'required'           => true,
            'version'            => '1.0',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'               => esc_html__('WPBakery Visual Composer', 'new-paper'),
            'slug'               => 'js_composer',
            'source'             => get_template_directory().'/lib/bundled/js_composer.zip',
            'required'           => true,
            'version'            => '4.11.2',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'               => esc_html__('Revolution Slider', 'new-paper'),
            'slug'               => 'revslider',
            'source'             => get_template_directory().'/lib/bundled/revslider.zip',
            'required'           => false,
            'version'            => '5.1.5',
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        array(
            'name'               => esc_html__('Option tree', 'new-paper'),
            'slug'               => 'option-tree',
            'source'             => get_template_directory().'/lib/bundled/option-tree.zip',
            'required'           => true,
            'version'            => '2.6.0',
            'force_activation'   => true,
            'force_deactivation' => false,
        ),

        // Wordpress Plugin Rpository,
        array(
            'name'                => esc_html__('WP Review', 'new-paper'),
            'slug'                => 'wp-review',
            'version'             => '4.0.7',
            'required'            => false,
            'force_activation'    => false,
            'force_deactivation'  => false,
        ),
        array(
            'name'                => esc_html__('Mailchimp For WP', 'new-paper'),
            'slug'                => 'mailchimp-for-wp',
            'version'             => '3.1.6',
            'required'            => false,
            'force_activation'    => false,
            'force_deactivation'  => false,
        ),
        array(
            'name'                => esc_html__('User Avatar', 'new-paper'),
            'slug'                => 'wp-user-avatar',
            'version'             => '2.0.7',
            'required'            => false,
            'force_activation'    => false,
            'force_deactivation'  => false,
        ),
        array(
            'name'                => esc_html__('Breadcrumb Nav-xt', 'new-paper'),
            'slug'                => 'breadcrumb-navxt',
            'version'             => '5.4.0',
            'required'            => true,
            'force_activation'    => false,
            'force_deactivation'  => false,
        ),
        array(
            'name'                => esc_html__('Contact Form 7', 'new-paper'),
            'slug'                => 'contact-form-7',
            'version'             => ' 4.4.2',
            'required'            => false,
            'force_activation'    => false,
            'force_deactivation'  => false,
        ),

    );

    // Change this to your theme text domain, used for internationalising strings
    $theme_text_domain = 'new-paper';

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'domain'       => $theme_text_domain,       // text domain - likely want to be the same as your theme
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                    // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.


    );

    tgmpa( $plugins, $config );
}

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
add_action( 'vc_before_init', 'new_paper_ntx_vcSetAsTheme' );
function new_paper_ntx_vcSetAsTheme() {
    vc_set_as_theme();
}
