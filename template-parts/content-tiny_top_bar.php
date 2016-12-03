<?php
global $new_paper_helper;
$topbar_style = $new_paper_helper->get_global_local_value('topbar-florida', 'new_paper_ntx_top_bar_global_style', 'new_paper_ntx_page_topbar_style');
?>

<div class="tiny-top-bar <?php echo esc_attr($topbar_style) ?>">
    <div class="container-fluid">
        <div class="col-md-4 col-sm-3 col-xs-6">
            <?php
            if(is_active_sidebar('top-bar-1')){
                dynamic_sidebar('top-bar-1');
            }
            ?>
        </div>
        <!-- end col-4 -->
        <div class="col-md-4 col-sm-6 hidden-xs">
            <?php
            if(is_active_sidebar('top-bar-2')){
                dynamic_sidebar('top-bar-2');
            }
            ?>
        </div>
        <!-- end col-4 -->
        <div class="col-md-4 col-sm-3 col-xs-6">
            <?php
            if(is_active_sidebar('top-bar-3')){
                dynamic_sidebar('top-bar-3');
            }
            ?>
        </div>
        <!-- end col-4 -->
    </div>
</div>