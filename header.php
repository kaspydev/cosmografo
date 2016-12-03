<?php
global $new_paper_helper;
global $data;

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>
</head>

<body <?php echo esc_attr(body_class()) ?>>

<!--Register modal-->
<?php //get_template_part('template-parts/content', 'register') ?>


<!--Side Menu-->
<?php get_template_part('template-parts/content', 'side_menu') ?>

<main>

    <?php
    /*===== Enable Disable Rainbow bar on header ======*/
    $enable_rainbow_bar = $new_paper_helper->get_global_local_value('off', 'new_paper_ntx_enable_rainbow_bar_globally_on_header', 'new_paper_ntx_page_enable_rainbow_bar');
    if($enable_rainbow_bar == 'on'){
        ?>
        <div class="rainbow-bar"></div>
        <?php
    }
    /*=== Rainbowbar END ======*/
    ?>


    <!--== Tiny Top BAR===-->

    <?php
    $enable_topbar = $new_paper_helper->get_global_local_value('off', 'new_paper_ntx_enable_topbar_globally', 'new_paper_ntx_page_enable_topbar');
    if($enable_topbar == 'on'){
        get_template_part('template-parts/content', 'tiny_top_bar');
    }
    ?>

    <!--== Tiny Top BAR END ===-->


    <?php
    /*determining header type*/
    $header_type = $new_paper_helper->get_global_local_value('header-florida', 'new_paper_ntx_global_header_type', 'new_paper_ntx_page_header_type');
    $data = array('header_type' => $header_type);

    $default_logo = get_template_directory_uri().'/assets/images/logo-light.png';
    $header_logo = $new_paper_helper->get_global_local_value($default_logo, 'new_paper_ntx_logo' , 'new_paper_ntx_page_site_logo');
    $data['header_logo'] = $header_logo;
    ?>

    <?php
    /*
     * Since header-newyork, kansas, california and florida have similar structure, its done from same structure
     * */
    if(in_array($header_type, array('header-newyork', 'header-kansas', 'header-california', 'header-florida'))){
        ?>
        <header class="<?php echo esc_attr($header_type) ?>">
            <!--    <header class="header-newyork">-->
            <!--    <header class="header-kansas">-->
            <!--    <header class="header-california">-->

            <!--Site Logo-->
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">

                <img src="<?php echo esc_url($header_logo);?>" alt="<?php bloginfo('name') ;?>" class="logo">

            </a>
            <!--Site logo end-->

            <?php
            /*Ads banner image*/

            if(in_array($header_type, array('header-kansas'))){
                dynamic_sidebar('header-ads');
            }
            ?>

            <?php
            if($header_type == 'header-kansas'){
            ?>
            <div class="menu-bar">
                <?php
                }
                ?>

                <?php
                $new_paper_helper->the_menu();
                ?>

                <?php
                get_template_part('template-parts/header/header', 'site_tool');
                ?>
                <!-- end site-tools -->

                <?php
                if($header_type == 'header-kansas'){
                ?>
            </div>
        <?php
        }
        ?>

        </header>

        <?php
        if($header_type == 'header-california'){
            ?>
            <div class="rainbow-bar"></div>
            <?php
        }
        ?>

        <?php
        if(in_array($header_type, array('header-newyork', 'header-florida', 'header-california'))){
            dynamic_sidebar('header-ads');
        }
        ?>

        <?php
    }elseif($header_type == 'header-housten'){
        get_template_part('template-parts/header/header', 'houston');
    }elseif($header_type == 'header-texas'){
        get_template_part('template-parts/header/header', 'texas');
    }elseif($header_type == 'header-arizona'){
        get_template_part('template-parts/header/header', 'arizona');
    }elseif($header_type == 'header-utah'){
        get_template_part('template-parts/header/header', 'utah');
    }

    ?>


    <!-- Header completed -->

    <!-- end header-housten -->
    <?php
    $enable_breaking_news = $new_paper_helper->get_global_local_value('off', 'new_paper_ntx_enable_breaking_news_globally', 'new_paper_ntx_page_enable_breaking_news');
    if($enable_breaking_news == 'on'){
        get_template_part('template-parts/content', 'breaking_news');
    }
    ?>

    <!-- end breaking-news -->

    <?php

    if(is_page()){
        $page_title_layout = get_post_meta(get_the_ID(), 'new_paper_ntx_page_title_style', true);
        $page_title_type = (empty($page_title_layout))? 'default' : $page_title_layout;

        if($page_title_layout == 'bar'){
            $new_paper_helper->the_breadcrumb();
        }

    }

    //reset global data
    $data = array();

    ?>

