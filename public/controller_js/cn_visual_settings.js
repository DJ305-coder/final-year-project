$(document).ready(function () {

    var LogoImg = ($("#old_logo_image").val() != "") ? false : true;
    var LogoEmailImg = ($("#old_logo_email_image").val() != "") ? false : true;
    var FaviconImg = ($("#old_favicon_image").val() != "") ? false : true;

    $("#visual_settings_form").validate({
        rules: {
            logo_image_path: {
                required: LogoImg,
            },
            logo_email_image_path: {
                required: LogoEmailImg,
            },
            favicon_image_path: {
                required: FaviconImg,
            },
        },
        messages: {
            logo_image_path: {
                required: "* Please choose logo image.",
            },
            logo_email_image_path: {
                required: "* Please choose logo email image.",
            },
            favicon_image_path: {
                required: "* Please choose favicon image.",
            },
        },
        submitHandler: function (form) {
            form.submit();
        },
    });
    
}); 