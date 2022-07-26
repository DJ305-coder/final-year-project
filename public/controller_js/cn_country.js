$("#country_form").validate({
    ignore: ".note-editor *",
    debug: false,
    rules: {
        country_name: {
            required: true,
            remote: {
                url: base_url + "/country-exists",
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
                    country_name: function () {
                        return $("#country_name").val();
                    },
                },
            },
        },
    },
    messages: {
        country_name: {
            required: "* Please enter country name.",
            remote: "* This country already exists",
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

        ajax: "/country-data-table",
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
