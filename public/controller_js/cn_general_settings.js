// Contact Settings

$("#general_settings_contact_form").validate({
    ignore: ".note-editor *",
    debug: false,
    rules: {
        contact_email: {
            required: true,
            email: true
        },
        contact_phone: {
            required: true,
            number: true,
            minlength: 10,
            maxlength: 10
        },
        contact_mobile: {
            required: true,
            number: true,
            minlength: 10,
            maxlength: 10
        },
        contact_address: {
            required: true,
        },
        contact_longitude: {
            required: true,
        },
        contact_latitude: {
            required: true,
        },
    },
    messages: {
        contact_email: {
            required: "* Please enter email.",
            email: "* Please enter a valid email.",
        },
        contact_phone: {
            required: "* Please enter phone number.",
            number: "* You can not add text in phone number.",
            minlength: "* Please enter atleast 10 digits.",
            maxlength: "* Please enter only 10 digits."
        },
        contact_mobile: {
            required: "* Please enter mobile number.",
            number: "* You can not add text in phone number.",
            minlength: "* Please enter atleast 10 digits.",
            maxlength: "* Please enter only 10 digits."
        },
        contact_address: {
            required: "* Please enter address.",
        },
        contact_longitude: {
            required: "* Please enter longitude.",
        },
        contact_latitude: {
            required: "* Please enter latitude.",
        },
    },
    submitHandler: function (form) {
        // <- pass 'form' argument in
        $(".submit").attr("disabled", true);
        form.submit(); // <- use 'form' argument here.
    },
});

// Social media settings

$("#general_settings_social_media_form").validate({
    ignore: ".note-editor *",
    debug: false,
    rules: {
        social_media_facebook_url: {
            required: true,
            url: true,
        },
        social_media_twitter_url: {
            required: true,
            url: true,
        },
        social_media_instagram_url: {
            required: true,
            url: true,
        },
        social_media_pinterest_url: {
            required: true,
            url: true,
        },
        social_media_youtube_url: {
            required: true,
            url: true,
        },
    },
    messages: {
        social_media_facebook_url: {
            required: "* Please enter facebook url.",
            url: "* Please enter a valid url.",
        },
        social_media_twitter_url: {
            required: "* Please enter twitter url.",
            url: "* Please enter a valid url.",
        },
        social_media_instagram_url: {
            required: "* Please enter instagram url.",
            url: "* Please enter a valid url.",
        },
        social_media_pinterest_url: {
            required: "* Please enter pinterest url.",
            url: "* Please enter a valid url.",
        },
        social_media_youtube_url: {
            required: "* Please enter youtube url.",
            url: "* Please enter a valid url.",
        },
    },
    submitHandler: function (form) {
        // <- pass 'form' argument in
        $(".submit").attr("disabled", true);
        form.submit(); // <- use 'form' argument here.
    },
});