<?php
/*
 * Requries data with 'image_url', 'enable_category'
 * */
global $data;
global $new_paper_helper;

?>

<div class="post-type-kansas">

    <a href="<?php the_permalink() ?>">
        <figure class="post-image">
            <img data-original="<?php echo esc_url($data['image_url']) ?>" src="<?php echo esc_url($data['image_url']) ?>" alt="<?php the_title() ?>">
        </figure>
    </a>

    <div class="post-content">

        <?php
        if($data['enable_category'] == 'yes'){
            $new_paper_helper->the_categories();
        }
        ?>

        <h4 class="post-title">
            <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
        </h4>

        <?php
        $new_paper_helper->the_author('', 32);

        $new_paper_helper->the_time();
        ?>

    </div>
    <!-- end post-content -->

</div>



