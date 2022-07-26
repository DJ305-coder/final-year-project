$(document).ready(function () {
    $("#banner_ads_form").validate({
        rules: {
            fromdate: {
                required: true,
            },
            todate: {
                required: true,
            },
            ad_url: {
                required: true,
            },
            ad_sequence_number: {
                required: true,
            },

            country_id: {
                required: true,
            },
            state_id: {
                required: true,
            },

            banner_image_path: {
                required: true,
            },
        },
        messages: {
            from_date: {
                required: "* Enter Coupon Starting Date",
            },
            to_date: {
                required: "* Enter Coupon Expiry Date",
            },
            ad_sequence_number: {
                required: "* Enter Ads sequence.",
            },
            ad_url: {
                required: "* Enter ad url.",
            },

            country_id: {
                required: "* Select A Country",
            },
            state_id: {
                required: "* Select A State",
            },

            banner_image_path: {
                required: "* Choose a image",
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

        ajax: "/banner-ads-data-table",
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
            },
            {
                name: "country_name",
                data: "country_name",
            },
            {
                data: "state_name",
                name: "state_name",
            },
            {
                data: "fromdate",
                name: "fromdate",
            },
            {
                data: "todate",
                name: "todate",
            },
            {
                data: "ad_sequence_number",
                name: "ad_sequence_number",
            },
            {
                data: "ad_url",
                name: "ad_url",
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

$("#state_id").on("change", function () {
    var stateId = $(this).val();
    if (stateId != "") {
        $.ajax({
            url: base_url + "/get-city-list",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            data: { stateId: stateId },
            success: function (result) {
                console.log(result);
                $.each(result.data, function (key, value) {
                    $("#cities").append(
                        '<option value="' +
                            value.id +
                            '">' +
                            value.city_name +
                            "</option>"
                    );
                });
                $("#cities").multipleSelect({});
            },
        });
    }
});

$("#cities").on("change", function () {
    var cityId = $(this).val();

    if (cityId != "") {
        $.ajax({
            url: base_url + "/get-area-list",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            data: { cityId: cityId },
            success: function (result) {
                // alert(result);
                console.log(result);
                $.each(result.data, function (key, value) {
                    $("#areas").append(
                        '<option value="' +
                            value.id +
                            '">' +
                            value.area_name +
                            "</option>"
                    );
                });
                $("#areas").multipleSelect({});
            },
        });
    }
});
