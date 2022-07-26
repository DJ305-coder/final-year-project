$("#ticket_type_form").validate({
    ignore: ".note-editor *",
    debug: false,
    rules: {
        ticket_type: {
            required: true,
            remote: {
                url: base_url + "/ticket-type-exists",
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
                    ticket_type: function () {
                        return $("#ticket_type").val();
                    },
                },
            },
        },
    },
    messages: {
        ticket_type: {
            required: "* Please enter ticket type.",
            remote: " * This ticket type already exists.",
        },
    },
    submitHandler: function (form) {
        // <- pass 'form' argument in
        $(".submit").attr("disabled", true);
        form.submit(); // <- use 'form' argument here.
    },
});

$(function () {
    // var url = "{{url('')}}";
    var table = $("#example").DataTable({
        processing: true,
        serverSide: true,

        ajax: "/ticket-type-data-table",
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
            },
            {
                data: "ticket_type",
                name: "ticket_type",
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
