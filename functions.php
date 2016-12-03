<?php
/**
 * New Paper functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package New_Paper
 */



if ( ! function_exists( 'new_paper_ntx_setup' ) ) :

    /**
     * Include THEME autoloader file
     */
    require_once trailingslashit( get_template_directory() ). 'vendor/autoload.php';

    /**
     * General Helper file
     */
    require_once trailingslashit( get_template_directory() ). 'includes/general.php';


    /*
     * TGM Activation
     * */
    require_once trailingslashit( get_template_directory() ). 'includes/tgmpa_settings.php';

    /**
     * Aqua resize file
     */
    require_once trailingslashit( get_template_directory() ). 'lib/aq_resizer/aq_resizer.php';


    global $new_paper_helper;
    $new_paper_helper = new \Paper\New_Paper_Ntx;

    /*Nav walker file*/
    require trailingslashit( get_template_directory() ). 'includes/nav_walker.php' ;
    require trailingslashit( get_template_directory() ). 'includes/side_nav_walker.php' ;


    /*
     * OPTION TREE
     * */
    // Enabling the display of settings in admin view
    add_filter( 'ot_show_pages', '__return_true' );


    /*
     * Theme Options file
     * */
    require trailingslashit( get_template_directory() ) . 'includes/theme-options/theme-options.php';

    /*
     * Post metabox file
     * */
    require_once trailingslashit( get_template_directory() ). 'includes/theme-options/metabox_post.php' ;
    require_once trailingslashit( get_template_directory() ). 'includes/theme-options/metabox_page.php' ;


    /*
     * OPTION TREE ENDS
     * */

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function new_paper_ntx_setup() {

        if(class_exists('New_Paper_Ntx_Package')){

            /**
             * Force Visual Composer to initialize
             */
            if(class_exists('Vc_Manager')) {

                //vc_disable_frontend();

                // change vc template directory
                vc_set_shortcodes_templates_dir( get_template_directory(). '/includes/vc_template' );

                function new_paper_ntx_extend_composer() {
                    // integrate all the custom vc content
                    // Includes All vc-content-element files
                    foreach ( glob( get_template_directory() . "/includes/vc_element/*.php" ) as $file ) {
                        require_once $file;
                    }

                }

                add_action('init', 'new_paper_ntx_extend_composer', 20);

            }

        }

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on New Paper, use a find and replace
         * to change 'new-paper' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'new-paper', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary', 'new-paper'),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        /*
         * Enable support for Post Formats.
         * See https://developer.wordpress.org/themes/functionality/post-formats/
         */
        add_theme_support( 'post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'new_paper_ntx_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );


    }
endif;
add_action( 'after_setup_theme', 'new_paper_ntx_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function new_paper_ntx_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'new_paper_ntx_content_width', 640 );
}
add_action( 'after_setup_theme', 'new_paper_ntx_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function new_paper_ntx_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'new-paper' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here for Primary sidebar of the site', 'new-paper' ),
        'before_widget' => '<div id="%1$s" class="widget paper-sidebar %2$s clearfix">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar 2', 'new-paper' ),
        'id'            => 'sidebar-2',
        'description'   => esc_html__( 'Add widgets here for Primary sidebar of the site', 'new-paper' ),
        'before_widget' => '<div id="%1$s" class="widget paper-sidebar %2$s clearfix">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );


    /*primarily used for side hiding menu box*/
    register_sidebar( array(
        'name'          => esc_html__( 'Hiding Sidebox', 'new-paper' ),
        'id'            => 'hiding-sidebar',
        'description'   => esc_html__( 'Add widgets here to appear in side hiding box', 'new-paper' ),
        'before_widget' => '<div id="%1$s" class="widget paper-hiding-sidebar %2$s clearfix">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );


    // register footer colum1

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Column 1', 'new-paper' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets in First column for Primary Footer of the site.', 'new-paper' ),
        'before_widget' => '<div id="%1$s" class="column-1 widget paper-footer %2$s clearfix">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Column 2', 'new-paper' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets in second column for Primary Footer of the site.', 'new-paper' ),
        'before_widget' => '<div id="%1$s" class="column-2 widget paper-footer %2$s clearfix">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="column-2 footer-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Column 3', 'new-paper' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add widgets in third column for Primary Footer of the site.', 'new-paper' ),
        'before_widget' => '<div id="%1$s" class="column-3 widget paper-footer %2$s clearfix">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Column 4', 'new-paper' ),
        'id'            => 'footer-4',
        'description'   => esc_html__( 'Add widgets in fourth column for Primary Footer of the site.', 'new-paper' ),
        'before_widget' => '<div id="%1$s" class="column-4 widget paper-footer %2$s clearfix">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Top bar Column 1', 'new-paper' ),
        'id'            => 'top-bar-1',
        'description'   => esc_html__( 'Add widgets in first column in top bar.', 'new-paper' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Top bar Column 2', 'new-paper' ),
        'id'            => 'top-bar-2',
        'description'   => esc_html__( 'Add widgets in second column in top bar.', 'new-paper' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Top bar Column 3', 'new-paper' ),
        'id'            => 'top-bar-3',
        'description'   => esc_html__( 'Add widgets in third column in top bar.', 'new-paper' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Ads Area', 'new-paper' ),
        'id'            => 'header-ads',
        'description'   => esc_html__( 'Header Advertisement Banner Area', 'new-paper' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Extra Area 1', 'new-paper' ),
        'id'            => 'extra-1',
        'description'   => esc_html__( 'Extra Area 1', 'new-paper' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Extra Area 2', 'new-paper' ),
        'id'            => 'extra-2',
        'description'   => esc_html__( 'Extra Area 2', 'new-paper' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Extra Area 3', 'new-paper' ),
        'id'            => 'extra-3',
        'description'   => esc_html__( 'Extra Area 3', 'new-paper' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Extra Area 4', 'new-paper' ),
        'id'            => 'extra-4',
        'description'   => esc_html__( 'Extra Area 4', 'new-paper' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

}
add_action( 'widgets_init', 'new_paper_ntx_widgets_init' );



function new_paper_ntx_fonts_url() {


    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $poppins    = _x( 'on', 'Poppins font: on or off', 'new-paper' );
    $roboto     = _x( 'on', 'Roboto Condensed Google font: on or off', 'new-paper' );

    if ( 'off' !== $poppins || 'off' !== $roboto ) {
        $font_families = array();

        if ( 'off' !== $poppins ) {
            $font_families[] = 'Poppins:400,600,700,300';
        }

        if ( 'off' !== $roboto ) {
            $font_families[] = 'Roboto Condensed';
        }

        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );

        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }

    return esc_url_raw( $fonts_url );
}

// ================

function new_paper_ntx_load_custom_wp_admin_style() {

    // Custom admin css
    wp_enqueue_style( 'new_paper_ntx_custom_wp_admin_css', get_template_directory_uri() . '/assets/admin/admin_paper.css', false, '1.0.0' );

    // Custom admin js
    wp_enqueue_script('new_paper_ntx_custom_wp_admin_js', get_template_directory_uri().'/assets/admin/admin_paper.js' , array('jquery'), false, true);


}
add_action( 'admin_enqueue_scripts', 'new_paper_ntx_load_custom_wp_admin_style' );


/**
 * Enqueue scripts and styles.
 */
function new_paper_ntx_scripts() {

    wp_enqueue_style( 'fonts', new_paper_ntx_fonts_url(), array(), '1.0.0' );

    // stylesheet
    wp_enqueue_style( 'new-paper-ntx-style', get_stylesheet_uri() );
    wp_enqueue_style('new-paper-ntx-custom', get_template_directory_uri().'/assets/css/main.css');

    // javascript
    wp_enqueue_script('bootstrap-min-js', get_template_directory_uri().'/assets/js/bootstrap.min.js' , array('jquery'), false, true);
    wp_enqueue_script('slick-min-js', get_template_directory_uri().'/assets/js/slick.min.js' , array('jquery'), false, true);
    wp_enqueue_script('retina-min-js', get_template_directory_uri().'/assets/js/retina.min.js' , array('jquery'), false, true);
    wp_enqueue_script('waypoints-min-js', get_template_directory_uri().'/assets/js/waypoints.min.js' , array('jquery'), false, true);
    wp_enqueue_script('instafeed-min-js', get_template_directory_uri().'/assets/js/instafeed.min.js' , array('jquery'), false, true);
    wp_enqueue_script('circle-progress-min-js', get_template_directory_uri().'/assets/js/circle-progress.js' , array('jquery'), false, true);
    wp_enqueue_script('magnific-popup-min-js', get_template_directory_uri().'/assets/js/jquery.magnific-popup.min.js' , array('jquery'), false, true);
    wp_enqueue_script('gotop-js', get_template_directory_uri().'/assets/js/gototop.js' , array('jquery'), false, true);
    wp_enqueue_script('masonry-min-js', get_template_directory_uri().'/assets/js/masonry.min.js' , array('jquery'), false, true);
    wp_enqueue_script('lazyload', get_template_directory_uri().'/assets/js/jquery.lazyload.js' , array('jquery'), false, true);

    wp_enqueue_script('new-paper-ntx-custom-js', get_template_directory_uri().'/assets/js/paper.js' , array('jquery'), false, true);

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }


    if(is_singular()){

        // for post liking
        wp_localize_script( 'new-paper-ntx-custom-js', 'new_paper_ntx_ajax_vars', array(
            'ajaxurl'       => admin_url( 'admin-ajax.php' ),
            'post_id'       => get_the_ID()
        ));

    }



}
add_action( 'wp_enqueue_scripts', 'new_paper_ntx_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


add_filter( 'get_the_archive_title', 'new_paper_ntx_modify_video_archive_title');

function new_paper_ntx_modify_video_archive_title($title){

    if(is_tax('new_paper_ntx_video_category')){

        $title = single_cat_title( '', false );

        if(function_exists('ot_get_option')){
            return ot_get_option('new_paper_ntx_video_singular_text', 'Video').' : '.$title;
        }else{
            return 'Video : '.$title;
        }


    }elseif(is_post_type_archive('new_paper_ntx_video')){

        $title = strtolower($title);

        if(function_exists('ot_get_option')){
            $title = ot_get_option('new_paper_ntx_all_text', 'All').' '.str_replace('archives:', '', $title);
        }else{
            $title = 'All '. str_replace('archives:', '', $title);
        }

    }

    return $title;

}







