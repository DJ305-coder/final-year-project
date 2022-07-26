// Get Sub categories

$("#category_id").on("change", function () {
    var mainCategoryId = $(this).val();
    // alert(main_id);
    $("#sub_category_id").html("<option value>Select Sub Category</option>");
    $("#product_id").html("<option value>Select Product</option>");
    $("#product_image").attr('src', base_url + "/commonarea/dist/img/default.png");
    $("#product_image").attr('alt', 'Product Image');
    if (mainCategoryId != "") {
        $.ajax({
            url: base_url + "/sub-category-list",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            data: { mainCategoryId: mainCategoryId },
            success: function (result) {
                if (result != "") {
                    $("#sub_category_id").html(result);
                } else {
                    $("#sub_category_id").html("");
                }
            },
        });
    }
});


// Get Products

$("#sub_category_id").on("change", function () {
    var subCategoryId = $(this).val();
    var mainCategoryId = $('#category_id').val();
    $("#product_id").html("<option value>Select Product</option>");
    $("#product_image").attr('src', base_url + "/commonarea/dist/img/default.png");
    $("#product_image").attr('alt', 'Product Image');
    if (subCategoryId != "") {
        $.ajax({
            url: base_url + "/products-list",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            data: { subCategoryId: subCategoryId, mainCategoryId: mainCategoryId },
            success: function (result) {
                if (result != "") {
                    $("#product_id").html(result);
                } else {
                    $("#product_id").html("");
                }
            },
        });
    }
});

// get product image
$("#product_id").on("change", function () {
    var productId = $(this).val();
    var mainCategoryId = $('#category_id').val();
    var subCategoryId = $('#sub_category_id').val();
    $("#product_image").attr('src', base_url + "/commonarea/dist/img/default.png");
    $("#product_image").attr('alt', 'Product Image');
    if (productId != "") {
        $.ajax({
            url: base_url + "/product-image",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            data: { subCategoryId: subCategoryId, mainCategoryId: mainCategoryId, productId: productId },
            success: function (result) {
                if (result != "") {
                    $("#product_image").attr('src', result.image);
                    $("#product_image").attr('alt', result.image_name);
                } else {
                    $("#product_image").attr('src', '');
                    $("#product_image").attr('src', '');
                }
            },
        });
    }
});

// Data Table

$(function () {
    // var url = "{{url('')}}";
    var table = $("#example").DataTable({
        processing: true,
        serverSide: true,

        ajax: "/best-seller-data-table",
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
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
                data: "product_name",
                name: "product_name",
            },
            {
                data: "sequence_no",
                name: "sequence_no",
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

// validation

$("#best_sellers_form").validate({
    ignore: ".note-editor *",
    debug: false,
    rules: {
        category_id: {
            required: true,
        },
        sub_category_id: {
            required: true,
        },
        product_id: {
            required: true,
        },
        sequence_no: {
            required: true,
        },
    },
    messages: {
        category_id: {
            required: "* Please choose category.",
        },
        sub_category_id: {
            required: "* Please choose sub category.",
        },
        product_id: {
            required: "* Please choose product",
        },
        sequence_no: {
            required: "* Please enter sequence number.",
        },
    },
    submitHandler: function (form) {
        // <- pass 'form' argument in
        $(".submit").attr("disabled", true);
        form.submit(); // <- use 'form' argument here.
    },
});

