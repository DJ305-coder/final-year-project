$(document).ready(function () {
    $("#delivery_charges_form").validate({
        rules: {
            order_amount: {
                required: true,
                remote: {
                    url: base_url + "/order-amount-exists",
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
                        order_amount: function () {
                            return $("#order_amount").val();
                        },
                    },
                },
            },
            delivery_charge: {
                required: true,
            },
        },
        messages: {
            order_amount: {
                required: "*Select an amount",
                remote: "* Charges for this amount already exists.",
            },
            delivery_charge: {
                required: "*Enter delivery charge",
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});

// datatable data

$(function () {
    var table = $('#example').DataTable({
        processing: true,
        serverSide: true,

        ajax: "/delivery-charges-data-table",
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        },
        {
            data: 'order_amount',
            name: 'order_amount'
        },
        {
            data: 'delivery_charge',
            name: 'delivery_charge'
        },
        {
            data: 'status',
            name: 'status',
            orderable: false,
            searchable: false
        },
        {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
        },
        ]
    });

    function reload_table() {
        table.DataTable().ajax.reload(null, false);
    }
})