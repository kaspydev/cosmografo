<?php

global $new_paper_helper;

extract(shortcode_atts(array(
    'title'         => '',
    'title_type'    => '',
    'content_type'  => ''
), $atts));

$content_class = '';
if($content_type == 'lead-paragraph'){
    $content_class = 'lead';
}

$title_class = '';
if($title_type == 'lead-title'){
    $title_class = 'main-title';
    $title = $new_paper_helper->split_sentence($title);
}

?>



<div class="<?php echo esc_attr($title_class) ?>">

    <?php
    if($title_type == 'lead-title'){
        ?>
        <h4>
            <strong><?php echo esc_html($title[0]) ?></strong> <?php echo esc_html($title[1]) ?>
        </h4>
        <?php
    }elseif($title_type == 'bold-style'){
        ?>
        <h4><strong><?php echo esc_html($title) ?></strong></h4>
        <?php
    }else{
        ?>
        <h5><strong><?php echo esc_html($title) ?></strong></h5>
        <?php
    }
    ?>

</div>
<!-- end main-title -->


<!-- end col-12 -->


<p class="<?php echo esc_attr($content_class) ?>">
    <?php echo wp_kses_post($content) ?>
</p>











