$('#form_submit').click(function () {
    var oldImage = ($("#old_image").val() != "") ? false : true;

    $("#cms_form").validate({
        ignore: ".note-editor *",
        debug: false,
        rules: {
            id: {
                required: true,
            },
            title: {
                required: true,
            },
            content: {
                required: true,
            },
            meta_title: {
                required: true,
            },
            meta_keywords: {
                required: true,
            },
            description: {
                required: true,
            },
        },
        messages: {
            id: {
                required: "* Please select a page",
            },
            title: {
                required: "* Please enter title",
            },
            content: {
                required: "* Please enter description.",
            },
            meta_title: {
                required: "* Please enter meta title",
            },
            meta_keywords: {
                required: "* Please enter meta keywords",
            },
            description: {
                required: "* Please enter meta description",
            },
        },
        submitHandler: function (form) {
            // <- pass 'form' argument in
            $(".submit").attr("disabled", true);
            form.submit(); // <- use 'form' argument here.
        },
    });

})

// this function are used to the page information on page change.
function pageInfo(pageName) {
    if (pageName != '') {
        $.ajax({
            url: base_url + "/cms/edit-cms",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            data: { pageName: pageName },
            success: function (data) {
                if (data != '') {
                    $('.note-editable').html(data.content);
                    $('#content').val(data.title);
                    $('#title').val(data.title);
                    $('#meta_title').val(data.meta_title);
                    $('#meta_keywords').val(data.meta_keywords);
                    $('#description').val(data.description);
                    $('#preview_profile_path').attr('src', data.image);
                    $('#preview_profile_path').attr('alt', data.image_name);
                    $('#old_image').val(data.image_name);
                    $('.title-error').html("");
                    $('.meta_title-error').html("");
                    $('.meta_keywords-error').html("")
                    $('.description-error').html("");
                    $('.content-error').html("");
                    $('.error').removeClass('error');

                }
            }
        });
    } else {
        $('.note-editable').html('');
        $('#title').val('');
        $('#content').val('');
        $('#meta_title').val('');
        $('#meta_keywords').val('');
        $('#description').val('');
        $('#preview_profile_path').attr('src', base_url + "/commonarea/dist/img/default.png");
        $('#preview_profile_path').attr('alt', "Default Image.");
        $('#old_image').val('');
    }
};