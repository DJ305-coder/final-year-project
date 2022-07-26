var imgFlag = $("#old_slider_image").val() != "" ? false : true;

var imageVal = $(".valid").change(function () {
    var $input = $(this);
    var files = $input[0].files;
    var filename = files[0].name;
    var extension = filename.substr(filename.lastIndexOf("."));
    var allowedExtensionsRegx = /(\.jpg|\.jpeg|\.png)$/i;
    var isAllowed = allowedExtensionsRegx.test(extension);
    if (!isAllowed) {
        //   alert("File type is valid for the upload");
        alert("Invalid File Type.");
        // return true;
    } else {
        return false;
    }
});

$("#slider_form").validate({
    rules: {
        title: {
            required: true,
        },
        slider_image: {
            required: imgFlag,
            accept: imageVal,
        },
    },
    messages: {
        title: {
            required: "* Please enter title.",
        },
        slider_image: {
            required: "* Please select image.",
            accept: "* Please select valid image.",
        },
    },
    submitHandler: function (form) {
        $(".submit").attr("disabled", true);
        form.submit();
    },
});

$(function () {
    // var url = "{{url('')}}";
    var table = $("#example").DataTable({
        processing: true,
        serverSide: true,

        ajax: "/slider-image-data-table",
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
            },
            {
                data: "title",
                name: "title",
            },
            {
                data: "slider_image",
                name: "slider_image",
            },
            {
                data: "status",
                name: "status",
                orderable: false,
                searchable: false,
            },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false,
            },
        ],
    });

    function reload_table() {
        table.DataTable().ajax.reload(null, false);
    }
});
