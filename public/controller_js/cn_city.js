// Client Side form validation
$(document).ready(function () {
    $("#city_form").validate({
        rules: {
            country_id: {
                required: true,
            },
            state_id: {
                required: true,
            },
            city_name: {
                required: true,
                remote: {
                    url: base_url + "/city-exists",
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
                        state_id: function () {
                            return $("#state_id").val();
                        },
                        city_name: function () {
                            return $("#city_name").val();
                        },
                    },
                },
            }
        },
        messages: {
            country_id: {
                required: "*Select a country",
            },
            state_id: {
                required: "*Select a state",
            },
            city_name: {
                required: "*Enter city name",
                remote: "* This city already exists under this country and state",
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

        ajax: "/city-data-table",
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
            data: 'city_name',
            name: 'city_name'
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