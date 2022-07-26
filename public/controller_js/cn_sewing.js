$(document).ready(function () {
    var old_feature_img = $("#old_feature_img").val() != "" ? false : true;

    $("#sewing_product_product").validate({
        ignore: ".note-editor *",
        debug: false,
        rules: {
            main_category_id: {
                number: true,
                required: true,
            },
            sub_category_id: {
                number: true,
                required: true,
            },
            product_name: {
                required: true,
            },
            stiching_price: {
                number: true,
                required: true,
            },
            offer_price: {
                required: true,
                number: true,
                max: function () {
                    return parseFloat($("#stiching_price").val());
                },
            },
            product_description: {
                required: true,
            },
            feature_image_path: {
                required: old_feature_img,
            },
        },
        messages: {
            main_category_id: {
                required: "* Please select main category.",
            },
            sub_category_id: {
                required: "* Please select sub category.",
            },
            product_name: {
                required: "* Enter product name.",
            },
            stiching_price: {
                required: "* Enter product MRP price.",
            },

            offer_price: {
                required: "* Enter special price.",
                min: " * Enter min price than MRP price.",
            },
            product_description: {
                required: "* Enter product description",
            },
            feature_image_path: {
                required: "* Please select image",
            },
        },
        submitHandler: function (form) {
            form.submit();
        },
    });
});

$(function () {
    var table = $("#example").DataTable({
        processing: true,
        serverSide: true,

        ajax: "/sewing-product-data-table",
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
            },
            {
                name: "created_at",
                data: "created_at",
            },

            {
                data: "product_name",
                name: "product_name",
            },
            {
                data: "category_name",
                name: "category_name",
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
