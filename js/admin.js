( function($){
    "use strict";

    // image media upload box
    $(document).on('click', '.select-img', function (){
        var send_attachment_bkp = wp.media.editor.send.attachment;
        wp.media.editor.send.attachment = function (props, attachment) {
            $('.custom_media_image').attr('src', attachment.url);
            $('.custom-img').val(attachment.url);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open();
        return false;
    });


})(jQuery);