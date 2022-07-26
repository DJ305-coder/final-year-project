$(document).ready(function () {
    $("#coupon_code_form").validate({
        rules: {
            coupon_code: {
                required: true,
                remote: {
                    url: base_url + "/coupon-code-exists",
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
                        coupon_code: function () {
                            return $("#coupon_code").val();
                        },
                    },
                },
            },
            discount_percentage: {
                required: true,
            },
            from_date: {
                required: true,
            },
            to_date: {
                required: true,
            },
            min_order_amount: {
                required: true,
            },
            discount_max_amount: {
                required: true,
            },
            no_of_users: {
                required: true,
            },
            country_id: {
                required: true,
            },
            state_id: {
                required: true,
            },
            city_id: {
                required: true,
            },
            terms_and_conditions: {
                required: true,
            },
            coupon_image_path: {
                required: true,
            },
        },
        messages: {
            coupon_code: {
                required: "* Enter Coupon Name",
                remote: "* Coupon code already extist.",
            },
            discount_percentage: {
                required: "* Enter Discount Percentage",
            },
            from_date: {
                required: "* Enter Coupon Starting Date",
            },
            to_date: {
                required: "* Enter Coupon Expiry Date",
            },
            min_order_amount: {
                required: "* Enter Minimum Order Amount",
            },
            discount_max_amount: {
                required: "* Enter Maximum Discount Amount",
            },
            no_of_users: {
                required: "* Enter No Of Users",
            },
            country_id: {
                required: "* Select A Country",
            },
            state_id: {
                required: "* Select A State",
            },
            city_id: {
                required: "* Select A City",
            },
            terms_and_conditions: {
                required: "* Enter Terms And Conditions",
            },
            coupon_image_path: {
                required: "* Choose a image",
            },
        },
        submitHandler: function (form) {
            form.submit();
        },
    });
});

// datatable data

$(function () {
    var table = $("#example").DataTable({
        processing: true,
        serverSide: true,

        ajax: "/coupon-code-data-table",
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
            },
            {
                data: "coupon_code",
                name: "coupon_code",
            },
            {
                data: "from_date",
                name: "from_date",
            },
            {
                data: "to_date",
                name: "to_date",
            },
            {
                data: "discount_percentage",
                name: "discount_percentage",
            },
            {
                data: "discount_max_amount",
                name: "discount_max_amount",
            },
            {
                data: "no_of_users",
                name: "no_of_users",
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
