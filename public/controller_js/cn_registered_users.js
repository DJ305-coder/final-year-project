// datatable
$(function () {
    var table = $("#example").DataTable({
        processing: true,
        serverSide: true,

        ajax: "/registered-users-list-data-table",
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
            },
            {
                data: "registration_date_and_time",
                name: "registration_date_and_time",
            },
            {
                data: "id",
                name: "id",
            },
            {
                data: "name",
                name: "name",
            },
            {
                data: "date_of_birth",
                name: "date_of_birth",
            },
            {
                data: "email",
                name: "email",
            },
            {
                data: "phone_number",
                name: "phone_number",
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
