<?php
global $new_paper_helper;

$sidebox_style = $new_paper_helper->get_global_local_value('grey', 'new_paper_ntx_side_hiding_box_style_global', 'new_paper_ntx_page_side_box_type');
?>

<div class="side-menu <?php echo esc_attr($sidebox_style) ?>">

    <?php
    $default_logo = get_template_directory_uri().'/assets/images/logo-light.png';

    if(function_exists('ot_get_option')){
        $header_logo = ot_get_option('new_paper_ntx_side_hiding_box_logo', $default_logo );
    }else{
        $header_logo = $default_logo;
    }
    
    ?>
    <img src="<?php echo esc_url($header_logo) ?>" alt="<?php bloginfo('name') ;?>" class="logo">

    <!--Only for mobile version-->
    <h4 class="side-title visible-sm visible-xs">NAVIGATION</h4>

    <?php
    $new_paper_helper->the_side_menu();

    if(is_active_sidebar('hiding-sidebar')){
        dynamic_sidebar( 'hiding-sidebar' );
    }
    ?>


</div>