$("#main_shopping_form").validate({
    ignore: ".note-editor *",
    debug: false,
    rules: {
        main_shopping_category_name: {
            required: true,
            remote: {
                url: base_url + "/main-category-exists",
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
                    country_name: function () {
                        return $("#main_shopping_category_name").val();
                    },
                },
            },
        },
    },
    messages: {
        main_shopping_category_name: {
            required: "* Please enter main category.",
            remote: "* This main category already exists.",
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

        ajax: "/main-shopping-category-data-table",
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
