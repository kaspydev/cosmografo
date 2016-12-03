<?php
function new_paper_ntx_paragraph_fn() {

    vc_map( array(
        "name" => esc_html__("Paragraph Block", 'new-paper'),
        "base" => "new_paper_ntx_paragraph",
        "category" => esc_html__('New Paper','new-paper'),
        "params" => array(
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Paragraph Title", 'new-paper'),
                "param_name" => "title",
                "description" => esc_html__("Ttitle of the paragraph.", 'new-paper')
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Title Type", 'new-paper'),
                "param_name" => "title_type",
                "value" => array(
                    'Normal styled title'      => '',
                    'Lead styled title'        => 'lead-title',
                    'Bold Styled title'        => 'bold-style'
                ),
                "description" => esc_html__("Default: Normal styled layout", 'new-paper')
            ),
            array(
                "type" => "textarea_html",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Write Contact Detail", 'new-paper'),
                "param_name" => "content",
                "description" => esc_html__("Express something.", 'new-paper')
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Paragrpah Content Type", 'new-paper'),
                "param_name" => "content_type",
                "value" => array(
                    'Normal styled content'      => '',
                    'Lead styled content'        => 'lead-paragraph'
                ),
                "description" => esc_html__("Default: Normal styled content", 'new-paper')
            ),
        )
    ) );


}

new_paper_ntx_paragraph_fn();

class WPBakeryShortCode_New_Paper_Ntx_Paragraph extends WPBakeryShortCode {
}

