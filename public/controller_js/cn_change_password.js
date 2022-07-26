$("#change_password_form").validate({
    ignore: ".note-editor *",
    debug: false,
    rules: {
        new_password: {
            required: true,
            minlength: 8,
            maxlength: 20,
            notEqualTo: "#old_password",
        },
        old_password: {
            required: true,
        },
        confirm_password: {
            required: true,
            minlength: 8,
            maxlength: 20,
            equalTo: "#new_password",
        },
    },
    messages: {
        new_password: {
            required: "* Please enter new password.",
            minlength: "* Password must be more than 8 characters.",
            maxlength: "* Password must not be more than 20 characters.",
            notEqualTo: "* Old password and new password should not match."
        },
        old_password: {
            required: "* Please enter old password.",
        },
        confirm_password: {
            required: "* Please confirm new password.",
            minlength: "* Password must be more than 8 characters.",
            maxlength: "* Password must not be more than 20 characters.",
            equalTo: "* New password and confirm password should be same."
        },
    },
    submitHandler: function (form) {
        // <- pass 'form' argument in
        $(".submit").attr("disabled", true);
        form.submit(); // <- use 'form' argument here.
    },
});
