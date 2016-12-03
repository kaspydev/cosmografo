<?php
global $new_paper_helper;
global $data;
?>
<header class="header-texas">
    <div class="dark-bar">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img src="<?php echo esc_url($data['header_logo']) ?>" alt="<?php bloginfo('name') ;?>" class="logo">
        </a>

        <?php
        dynamic_sidebar('header-ads')
        ?>

    </div>
    <!-- end dark-bar -->
    <div class="menu-bar hidden-xs">
        <div class="container">

            <?php
            $new_paper_helper->the_menu();
            ?>
            <!-- end navigation -->

            <?php
            get_template_part('template-parts/header/header', 'site_tool');
            ?>
            <!-- end site-tools -->

        </div>
        <!-- end container -->
    </div>
    <!-- end menu-bar -->
</header>