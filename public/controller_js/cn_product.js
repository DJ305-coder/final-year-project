$(document).ready(function () {
    var old_feature_img = $("#old_feature_img").val() != "" ? false : true;
    var old_product_img = $("#old_product_img").val() != "" ? false : true;

    $("#shopping_product_form").validate({
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
            product_mrp: {
                number: true,
                required: true,
            },
            product_special_price: {
                required: true,
                number: true,
                max: function () {
                    return parseFloat($("#product_mrp").val());
                },
            },
            product_description: {
                required: true,
            },
            feature_image_path: {
                required: old_feature_img,
            },
            "product_image_path[]": {
                required: old_product_img,
            }
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
            product_mrp: {
                required: "* Enter product MRP price.",
            },

            product_special_price: {
                required: "* Enter special price.",
                min: " * Enter min price than MRP price.",
            },
            product_description: {
                required: "* Enter product description",
            },
            feature_image_path: {
                required: "* Please select image",
            },
            "product_image_path[]": {
                required: "* Please select product image.",
            }
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

        ajax: "/shopping-product-data-table",
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
            },
            {
                name: "id",
                data: "id",
            },
            {
                data: "product_mrp",
                name: "product_mrp",
            },
            {
                data: "product_special_price",
                name: "product_special_price",
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

$(".delete_image").on("click", function () {
    var ImageId = $(this).data("id");
    var DatabaseName = 'trenta_shopping_product_images';
    if (confirm("Do you really want to delete this image ?")) {
        $.ajax({
            type: "get",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { ImageId: ImageId, DatabaseName: DatabaseName },
            url: "/delete_image",
            success: function (data) {
                $('#product_image_div_' + ImageId).css('display', 'none');
                success_toast("Success", data.message);
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    }
});

