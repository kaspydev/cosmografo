<?php
get_header();

$default_image   = get_template_directory_uri().'/assets/images/404.jpg';

$image_url = $default_image;
if(function_exists('ot_get_option')){
    $image_url     = ot_get_option('new_paper_ntx_404_image', $default_image );
}


?>

    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <img data-original="<?php echo esc_url($image_url) ?>" src="<?php echo esc_url($image_url) ?>" alt="<?php echo esc_attr(esc_html__('404 Image', 'new-paper')) ?>">
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>

<?php
get_footer();
