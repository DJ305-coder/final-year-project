$(document).ready(function () {
    $("#state_form").validate({
        rules: {
            country_id: {
                required: true,
            },
            state_name: {
                required: true,
                remote: {
                    url: base_url + "/state-exists",
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
                        country_id: function () {
                            return $("#country_id").val();
                        },
                        state_name: function () {
                            return $("#state_name").val();
                        },
                    },
                },
            },
        },
        messages: {
            country_id: {
                required: "*Select a country",
            },
            state_name: {
                required: "*Enter state name",
                remote: "* This state already exists in this country",
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});

$(function () {
    var table = $('#example').DataTable({
        processing: true,
        serverSide: true,

        ajax: "/states-data-table",
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        },
        {
            data: 'country_name',
            name: 'country_name'
        },
        {
            data: 'state_name',
            name: 'state_name'
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
