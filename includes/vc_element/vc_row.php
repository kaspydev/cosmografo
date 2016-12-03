<?php
vc_remove_param('vc_row','full_width');

$predefined_class = array(
    'none'				=> '',
    'content'		    => 'content',
);

vc_add_param('vc_row', array(
    'type' 				=> 'dropdown',
    'class' 			=> '',
    'heading' 			=> esc_html__("Row's Content Width", 'new-paper'),
    'param_name' 		=> 'full_width',
    'value' 			=> array(
        'Default' => 'stretch_row_content_no_spaces',
        'Full Width' => 'full_width',
        'Stretch row' => 'stretch_row',
        'Stretch row and content' => 'stretch_row_content',
        'Stretch row and content (no paddings)' => 'stretch_row_content_no_spaces',
    ),
    'description' 		=> esc_html__('Default: Stretch row and content (no padding ) Select stretching options for row and content (Note: stretched may not work properly if parent container has "overflow: hidden" CSS property).','new-paper')
));

















