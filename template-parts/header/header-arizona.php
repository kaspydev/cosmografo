<?php
global $new_paper_helper;
global $data;
?>
<header class="header-arizona">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-6">
                <?php
                $new_paper_helper->the_social_connection();
                ?>
            </div>
            <!-- end col-3 -->
            <div class="col-md-4 text-center">

                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo esc_url($data['header_logo']) ?>" alt="<?php bloginfo('name') ;?>" class="logo">
                </a>

            </div>
            <!-- end col-6 -->
            <div class="col-md-4 col-sm-6 col-xs-6">
                <?php
                get_template_part('template-parts/header/header', 'site_tool');
                ?>
                <!-- end site-tools -->
            </div>
            <!-- end col-3 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
    <div class="menu-bar hidden-xs">
        <div class="container">
            <?php
            $new_paper_helper->the_menu();
            ?>
            <!-- end navigation -->
        </div>
        <!-- end container -->
    </div>
    <!-- end menu-bar -->
</header>