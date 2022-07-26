$("#main_sewing_form").validate({
    ignore: ".note-editor *",
    debug: false,
    rules: {
        sewing_category_name: {
            required: true,
            remote: {
                url: base_url + "/sewing-category-exists",
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
                    sewing_category_name: function () {
                        return $("#sewing_category_name").val();
                    },
                },
            },
        },
    },
    messages: {
        sewing_category_name: {
            required: "* Please enter main category.",
            remote: "* This category already exists",
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

        ajax: "/sewing-main-data-table",
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
