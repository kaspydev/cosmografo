<?php
global $new_paper_helper;
global $data;

$css = '';
$addresses = array();
$numbers = array();
$emails = array();

$atts = $new_paper_helper->set_default('enable_address', 'yes', $atts);
$atts = $new_paper_helper->set_default('enable_number', 'yes' , $atts);
$atts = $new_paper_helper->set_default('enable_email', 'yes' , $atts);
$atts = $new_paper_helper->set_default('title', esc_html__('Contact Information', 'new-paper') , $atts);


$atts = vc_map_get_attributes( 'new_paper_ntx_address', $atts );
extract($atts);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

/*address info*/
if($enable_address == 'yes'){
    if(function_exists('ot_get_option')){
        $addresses = ot_get_option('new_paper_ntx_add_address_info');
    }
}

/*contact number info*/
if($enable_number == 'yes'){
    if(function_exists('ot_get_option')){
        $numbers = ot_get_option('new_paper_ntx_contact_number_info');
    }
}

/*email info*/
if($enable_email == 'yes'){
    if(function_exists('ot_get_option')){
        $emails = ot_get_option('new_paper_ntx_email_info');
    }
}

?>

<div class="main-title">
    <?php $title = $new_paper_helper->split_sentence($title) ?>
    <h4><strong><?php echo esc_html($title[0]) ?></strong> <?php echo esc_html($title[1]) ?></h4>
</div>

<div class="row">

    <?php

    /*address*/
    if(!empty($addresses) && count($addresses)){

        ?>
        <address class="col-md-4 col-sm-4 col-xs-12 address-info">
            <?php
            foreach($addresses as $address){
                ?>
                <div class="address-separator">
                    <?php echo esc_html($address['address_1']) ?><br/>
                    <?php echo esc_html($address['address_2']) ?><br/>
                    <?php echo esc_html($address['address_line_3']) ?><br/>
                </div>
                <?php
            }
            ?>
        </address>
        <?php

    }


    /*phones*/
    if(!empty($numbers) && count($numbers)){

        ?>
        <address class="col-md-4 col-sm-4 col-xs-12">
            <?php
            foreach($numbers as $number){
                ?>
                <div>
                    <?php echo esc_html($number['number']) ?>
                </div>
                <?php
            }
            ?>
        </address>
        <?php

    }

    /*emails*/
    if(!empty($emails) && count($emails)){

        ?>
        <address class="col-md-4 col-sm-4 col-xs-12">
            <?php
            foreach($emails as $email){
                ?>
                <div>
                    <?php echo esc_html($email['email']) ?>
                </div>
                <?php
            }
            ?>
        </address>
        <?php

    }
    ?>

</div>




