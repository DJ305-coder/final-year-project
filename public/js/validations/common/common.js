let base_url = $("#base_url").val();

// let imageVal = $(".valid").change(function () {
//     var $input = $(this);
//     var files = $input[0].files;
//     var filename = files[0].name;
//     var extension = filename.substr(filename.lastIndexOf("."));
//     var allowedExtensionsRegx = /(\.jpg|\.jpeg|\.png)$/i;
//     var isAllowed = allowedExtensionsRegx.test(extension);
//     if (!isAllowed) {
//         //   alert("File type is valid for the upload");
//         // alert("Invalid File Type.");
//         return true;
//     } else {
//         return false;
//     }
// });

$(document).ready(() => {
    $(".preview").change(function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                console.log(event.target.result);
                $(".preview_image").attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
});

$(document).ready(() => {
    $(".preview1").change(function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                console.log(event.target.result);
                $(".preview_image1").attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
});

$(document).ready(() => {
    $(".preview2").change(function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                console.log(event.target.result);
                $(".preview_image2").attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
});

$(document).ready(() => {
    $(".preview3").change(function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                console.log(event.target.result);
                $(".preview_image3").attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
});

$(document).ready(() => {
    $(".preview4").change(function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                console.log(event.target.result);
                $(".preview_image4").attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
});

$(document).ready(() => {
    $(".preview5").change(function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                console.log(event.target.result);
                $(".preview_image5").attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
});

$(document).ready(() => {
    $(".preview6").change(function () {
        
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                console.log(event.target.result);
                $(".preview_image6").attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
});

$(document).ready(() => {
    $(".preview7").change(function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                console.log(event.target.result);
                $(".preview_image7").attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
});

$(document).on("click", ".change-status", function () {
    var id = $(this).data("id");

    var baseUrl = $("#base_url").val();
    var table = $(this).data("table");
    var flash = $(this).data("flash");
    var actionDiv = $(this);
    if (confirm("If you really want to change status ?")) {
        $.ajax({
            type: "post",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                id: id,
                table: table,
                flash: flash,
            },
            url: baseUrl + "/change-status",
            beforeSend: function () {
                $(this).hide();
                actionDiv
                    .html(
                        "<i class='fa fa-spin fa-spinner' style='color: #0c0c0c !important;'></i>"
                    )
                    .show();
            },
            success: function (data) {
                var oTable = $("#example").dataTable();
                oTable.fnDraw(false);
                console.log(data);
                success_toast("Success", data.message);
            },
        });
    }
});

$(document).on("click", ".delete", function () {
    var id = $(this).data("id");
    var table = $(this).data("table");
    var flash = $(this).data("flash");
    var actionDiv = $(this);
    var baseUrl = $("#base_url").val();
    // alert(baseUrl);
    if (confirm("Do you really want to delete this record ?")) {
        $.ajax({
            type: "get",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: { id: id, table: table, flash: flash },
            url: baseUrl + "/common-delete",
            beforeSend: function () {
                actionDiv
                    .html(
                        "<i class='fa fa-spin fa-spinner' style='color: #000000 !important;'></i>"
                    )
                    .show();
            },
            success: function (data) {
                var oTable = $("#example").dataTable();
                oTable.fnDraw(false);
                success_toast("Success", data.message);
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    }
});

// get state list on country id

function getStates(countryId) {
    if (countryId != "") {
        $("#state_id").html("");
        $("#city_id").html("");
        $.ajax({
            url: base_url + "/state-list",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            data: { countryId: countryId },
            success: function (html) {
                if (html != "") {
                    $("#state_id").html(html);
                } else {
                    $("#state_id").html("");
                }
            },
        });
    }
}

function getCities(stateId) {
    if (stateId != "") {
        $("#area_city").html("");
        $.ajax({
            url: base_url + "/city-list",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            data: { stateId: stateId },
            success: function (html) {
                if (html != "") {
                    $("#city_id").html(html);
                } else {
                    $("#city_id").html("");
                }
            },
        });
    }
}

function getSubCategory(mainCategoryId) {
    if (mainCategoryId != "") {
        $("#sub_category_id").html("");
        // $('#product_id').html('');
        $.ajax({
            url: base_url + "/sub-category-list",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            data: { mainCategoryId: mainCategoryId },
            success: function (html) {
                if (html != "") {
                    $("#sub_category_id").html(html);
                } else {
                    $("#sub_category_id").html("");
                }
            },
        });
    }
}

// function getSewingSubCategory(mainCategoryId) {
//     if (mainCategoryId != "") {
//         $("#sub_category_id").html("");
//         // $('#product_id').html('');
//         $.ajax({
//             url: base_url + "/sub-sewing-category-list",
//             headers: {
//                 "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//             },
//             type: "POST",
//             data: { mainCategoryId: mainCategoryId },
//             success: function (html) {
//                 if (html != "") {
//                     $("#sub_category_id").html(html);
//                 } else {
//                     $("#sub_category_id").html("");
//                 }
//             },
//         });
//     }
// }

// function getProductsNames(subCategoryId) {
//     if (subCategoryId != '') {
//         var mainCategoryId = $('#main_category_id');
//          $('#product_id').html('');
//         $.ajax({
//             url: base_url + "/product-name-list",
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             type: 'POST',
//             data: { subCategoryId: subCategoryId, mainCategoryId: mainCategoryId },
//             success: function (html) {
//                 if (html != '') {
//                     $('#product_id').html(html);
//                 } else {
//                     $('#product_id').html('');
//                 }
//             }
//         });
//     }
// };

$(document).ready(() => {
    $(".datepicker").datepicker({
        format: "mm/dd/yyyy",
        startDate: "-3d",
    });
});

$("#main_category_id").on("change", function () {
    var main_id = $(this).val();
    // alert(main_id);
    $("#sub_category_id").html("");
    if (main_id != "") {
        $.ajax({
            url: base_url + "/sub-sewing-category-list",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            data: { main_id: main_id },
            success: function (result) {
                // alert(result);
                console.log(result);
                $.each(result.data, function (key, value) {
                    $("#sub_category_id").append(
                        '<option value="' +
                            value.id +
                            '">' +
                            value.sub_category_name +
                            "</option>"
                    );
                });
            },
        });
    }
});
