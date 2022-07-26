$(document).ready(function () {
    $("#gst_tax_form").validate({
        rules: {
            gst_tax: {
                required: true,
                remote: {
                    url: base_url + "/gst-tax-exists",
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
                        gst_tax: function () {
                            return $("#gst_tax").val();
                        },
                    },
                },
            },
        },
        messages: {
            gst_tax: {
                required: "*Enter an amount.",
                remote: "* This amount GST Tax already exists.",
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

        ajax: "/gst-tax-data-table",
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        },
        {
            data: 'gst_tax',
            name: 'gst_tax'
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