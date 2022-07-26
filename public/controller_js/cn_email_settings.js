// Contact Settings

$("#email_settings_form").validate({
    ignore: ".note-editor *",
    debug: false,
    rules: {
        mail_encryption: {
            required: true,
        },
        mail_protocol: {
            required: true,
        },
        mail_title: {
            required: true,
        },
        mail_host: {
            required: true,
        },
        mail_port: {
            required: true,
        },
        mail_username: {
            required: true,
            email: true
        },
        mail_password: {
            required: true,
            minlength: 8,
            maxlength: 20
        },
    },
    messages: {
        mail_encryption: {
            required: "* Please enter mail encryption.",
        },
        mail_protocol: {
            required: "* Please select a protocol.",
        },
        mail_title: {
            required: "* Please enter mail title.",
        },
        mail_host: {
            required: "* Please enter mail host.",
        },
        mail_port: {
            required: "* Please enter mail port.",
        },
        mail_username: {
            required: "* Please enter email.",
            email: "* Please enter a valid email.",
        },
        mail_password: {
            required: "* Please enter password.",
            minlength: "* Password must have more than 8 characters.",
            maxlength: "* Password can have only 20 characters."
        },
    },
    submitHandler: function (form) {
        // <- pass 'form' argument in
        $(".submit").attr("disabled", true);
        form.submit(); // <- use 'form' argument here.
    },
});

function checkbox(checkValue){
    if(checkValue == '1'){
        $('#enable').prop('checked', true);
        $('#disable').prop('checked', false);
    }
    if(checkValue == '0'){
        $('#disable').prop('checked', true);
        $('#enable').prop('checked', false);
    }
}
