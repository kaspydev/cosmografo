<?php
/*
 * Requries data with 'image_url', 'enable_category', 'enable_excerpt'
 * enable_author, enable_date, title_words, excerpt_words, post_type, author_size
 * */
global $data;
global $new_paper_helper;

$post_class = get_post_class();

?>

<div class="<?php echo (empty($data['post_type'])) ? 'post-type-newyork' : esc_attr($data['post_type']) ?> <?php echo implode(' ', $post_class) ?>">

    <?php
    $extra_style = '';

    if(!empty($data['image_url'])){
        ?>
        <figure class="post-image">
            <a href="<?php the_permalink(get_the_ID()) ?>" class="post-image-link">
                <img data-original="<?php echo esc_url($data['image_url']) ?>" src="<?php echo esc_url($data['image_url']) ?>" alt="<?php the_title() ?>">
            </a>
            <?php
            if($data['enable_category'] == 'yes'){
                $new_paper_helper->the_categories(true);
            }
            ?>
        </figure>
        <?php
    }else{
        $extra_style = 'no-image';
    }
    ?>


    <div class="post-content <?php echo esc_attr($extra_style) ?> " >

        <div class="post-metas">
            <?php
            $new_paper_helper->the_post_likes(get_the_ID(), false);
            $new_paper_helper->the_post_views(get_the_ID());
            ?>
        </div>

        <!-- end post-metas -->
        <h4 class="post-title">
            <a href="<?php the_permalink() ?>">
                <?php echo esc_html($new_paper_helper->cut_words(get_the_title(), $data['title_words'] )) ?>
            </a>
        </h4>

        <?php
        if($data['enable_author'] == 'yes'){
            $new_paper_helper->the_author('', $data['author_size']);
        }

        if($data['enable_date'] == 'yes'){
            $new_paper_helper->the_time();
        }

        ?>

        <div class="post-rating visible-lg">
            <?php
            $new_paper_helper->review_badge();
            ?>
        </div>

        <?php
        if($data['enable_excerpt'] == 'yes'){


            if( strpos( $post->post_content, '<!--more-->' ) ) {
                the_content();
            }
            else{
                ?><p><?php echo esc_html($new_paper_helper->cut_words(get_the_excerpt(), $data['excerpt_words'])) ?></p><?php
            }

        }
        ?>

    </div>

    <!-- end post-content -->
</div>