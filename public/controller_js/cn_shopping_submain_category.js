$("#shopping_submain_category_form").validate({
    ignore: ".note-editor *",
    debug: false,
    rules: {
        category_id: {
            required: true,
        },
        submain_shopping_category_name: {
            required: true,
            remote: {
                url: base_url + "/submain-category-exists",
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
                    country_name: function () {
                        return $("#submain_shopping_category_name").val();
                    },
                },
            },
        },
    },
    messages: {
        category_id: {
            required: "* Please select main category.",
        },
        submain_shopping_category_name: {
            required: "* Please enter sub main category.",
            remote: "* This sub category already exists.",
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

        ajax: "/main-shopping-sub-category-data-table",
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
            },
            {
                data: "main_shopping_category_name",
                name: "main_shopping_category_name",
            },
            {
                data: "submain_shopping_category_name",
                name: "submain_shopping_category_name",
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
