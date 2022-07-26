$("#size_form").validate({
    ignore: ".note-editor *",
    debug: false,
    rules: {
        size: {
            required: true,
            remote: {
                url: base_url + "/size-exists",
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
                    size: function () {
                        return $("#size").val();
                    },
                },
            },
        },
    },
    messages: {
        size: {
            required: "* Please enter size.",
            remote: "* This size already exists.",
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

        ajax: "/size-data-table",
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
            },
            {
                data: "size",
                name: "size",
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
