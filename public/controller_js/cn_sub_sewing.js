$("#sewing_sub_category_form").validate({
    ignore: ".note-editor *",
    debug: false,
    rules: {
        category_id: {
            required: true,
        },
        sub_category_name: {
            required: true,
            remote: {
                url: base_url + "/sewing-sub-category-exists",
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
                    category_id: function () {
                        return $("#category_id").val();
                    },
                    sub_category_name: function () {
                        return $("#sub_category_name").val();
                    },
                },
            },
        },
    },
    messages: {
        category_id: {
            required: "* Please select main category.",
        },
        sub_category_name: {
            required: "* Please enter sub category.",
            remote: "* This sub sewing category already exists under this main sewing category.",
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

        ajax: "/sewing-sub-data-table",
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
            },
            {
                data: "sewing_category_name",
                name: "sewing_category_name",
            },
            {
                data: "sub_category_name",
                name: "sub_category_name",
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
