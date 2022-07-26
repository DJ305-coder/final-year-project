$(document).ready(function () {
    $("#area_form").validate({
        rules: {
            country_id: {
                required: true,
            },
            state_id: {
                required: true,
            },
            city_id: {
                required: true,
            },
            area_name: {
                required: true,
                remote: {
                    url: base_url + "/area-exists",
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
                        city_id: function () {
                            return $("#city_id").val();
                        },
                        area_name: function () {
                            return $("#area_name").val();
                        },
                    },
                },
            },
            pincode: {
                required: true,
                remote: {
                    url: base_url + "/pincode-exists",
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
                        pincode: function () {
                            return $("#pincode").val();
                        },
                    },
                },
            },
        },
        messages: {
            country_id: {
                required: "*Select a country",
            },
            state_id: {
                required: "*Select a state",
            },
            city_id: {
                required: "*Select a city",
            },
            area_name: {
                required: "*Enter area name",
                remote: "* This area already exists under this country and state and city",
            },
            pincode: {
                required: "*Enter pincode",
                remote: "* This pincode already registered for a area",
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

        ajax: "/area-data-table",
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
            },
            {
                data: "country_name",
                name: "country_name",
            },
            {
                data: "state_name",
                name: "state_name",
            },
            {
                data: "city_name",
                name: "city_name",
            },
            {
                data: "area_name",
                name: "area_name",
            },
            {
                data: "pincode",
                name: "pincode",
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
