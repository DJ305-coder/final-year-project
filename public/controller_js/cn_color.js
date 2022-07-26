$("#color_form").validate({
    ignore: ".note-editor *",
    debug: false,
    rules: {
        color_name: {
            required: true,
            remote: {
                url: base_url + "/color-name-exists",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                type: "post",
                data: {
                    txtpkey: function () {
                        return $("#txtpkey").val();
                    },
                    color_name: function () {
                        return $("#color_name").val();
                    },
                },
            },
        },
        color_code: {
            required: true,
            remote: {
                url: base_url + "/color-code-exists",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                type: "post",
                data: {
                    txtpkey: function () {
                        return $("#txtpkey").val();
                    },
                    color_code: function () {
                        return $("#color_code").val();
                    },
                },
            },
        },
    },
    messages: {
        color_name: {
            required: "* Please enter color name.",
            remote: "* This color name already exists.",
        },
        color_code: {
            required: "* Please select color.",
            remote: "* This color code already exists.",
        },
    },
    submitHandler: function (form) {
        // <- pass 'form' argument in
        $(".submit").attr("disabled", true);
        form.submit(); // <- use 'form' argument here.
    },
});

$(function () {
    // var url = "{{url('')}}";
    var table = $("#example").DataTable({
        processing: true,
        serverSide: true,

        ajax: "/color-data-table",
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
            },
            {
                data: "color_code",
                name: "color_code",
            },
            {
                data: "color_name",
                name: "color_name",
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
