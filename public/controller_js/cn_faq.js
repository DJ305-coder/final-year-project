// Client Side form validation
$(document).ready(function () {
    $("#faq_form").validate({
        rules: {
            question: {
                required: true,
            },
            answer: {
                required: true,
            },
        },
        messages: {
            question: {
                required: "* Please enter question.",
            },
            answer: {
                required: "* Please enter answer.",
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

        ajax: "/faq-data-table",
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        },
        {
            data: 'question',
            name: 'question'
        },
        {
            data: 'answer',
            name: 'answer'
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