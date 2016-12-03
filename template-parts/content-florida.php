<?php
/*$data = array('image_url', 'enable_excerpt', 'enable_category')*/
global $data;
global $new_paper_helper;

?>

<div class="post-type-florida">


    <figure class="post-image">
        <a class="image-link" href="<?php the_permalink() ?>">
            <img data-original="<?php echo esc_url($data['image_url']) ?>" src="<?php echo esc_url($data['image_url']) ?>" alt="<?php the_title() ?>">
        </a>

        <?php
        if($data['enable_category'] == 'yes'){
            $new_paper_helper->the_categories();
        }
        ?>

    </figure>



    <div class="post-content">

        <div class="post-metas">
            <?php
            $new_paper_helper->the_post_likes(get_the_ID(), false );
            $new_paper_helper->the_post_views();
            ?>
        </div>
        <!-- end post-metas -->

        <h4 class="post-title">
            <a href="<?php the_permalink() ?>">
                <?php echo esc_html($new_paper_helper->cut_words(get_the_title(), 40)) ?>
            </a>
        </h4>

        <?php
        $new_paper_helper->the_author('', 22) ;
        $new_paper_helper->the_time();
        ?>

        <?php
        $new_paper_helper->review_badge();
        ?>

        <?php
        if(!is_single() && $data['enable_excerpt'] == 'yes'){
            ?>
            <p>
                <?php echo $new_paper_helper->cut_words(get_the_excerpt(), 80) ?>
            </p>
            <?php
        }
        ?>


    </div>
    <!-- end post-content -->
</div>