<?php
// requires [header_type]
global $data;
?>
<div class="search-wrapper">
    <div class="input-holder">
        <form method="get" class="searchform" action="<?php echo site_url() ?>">
            <input name="s" class="search-input" type="text" placeholder="<?php echo esc_html__('Type to search', 'new-paper') ?>" />
            <input type="hidden" name="post_type" value="post">

            <?php
            if(isset($data) && array_key_exists('header_type', $data)){

            }else{
                ?>
                <button class="search-icon">
                    <?php echo esc_html__('search', 'new-paper'); ?>
                </button>
                <?php
            }
            ?>

        </form>


        <?php
        if(isset($data) && array_key_exists('header_type', $data)){

            ?>
            <button class="search-icon">
                <?php

                /*If header-newyork is chosen, search takes an icon form */
                if($data['header_type'] == 'header-newyork') {
                    ?>
                    <i class="ion-ios-search-strong"></i>
                    <?php
                }elseif(in_array($data['header_type'], array('header-housten', 'header-texas', 'header-arizona'))){
                    /*If header-newyork is chosen, search takes an an image icon */
                    ?>
                    <img src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/images/icon-search-dark.png" alt="Image">
                    <?php
                }else{
                    /*If header-newyork is chosen, search takes an an image icon */
                    ?>
                    <img src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/images/icon-search.png" alt="Image">
                    <?php
                }

                ?>
            </button>
            <?php

        }

        ?>


    </div>
</div>

