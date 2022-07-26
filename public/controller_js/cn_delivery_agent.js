$(document).ready(function () {

    var ProfileImg = ($("#old_profile_image").val() != "") ? false : true;
    var AadharCardImg = ($("#old_aadhar_card_image").val() != "") ? false : true;
    var PanCardImg = ($("#old_pan_card_image").val() != "") ? false : true;
    var DLImg = ($("#old_DL_image").val() != "") ? false : true;
    var RCImg = ($("#old_RC_image").val() != "") ? false : true;

    $("#delivery_agent_form").validate({
        rules: {
            name:{
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            mobile_number: {
                required: true,
                minlength: 10,
                maxlength: 10,
                digits: true,
            },
            dob: {
                required: true,
            },
            gender: {
                required: true,
            },
            salary: {
                required: true,
            },
            country_id: {
                required: true,
            },
            state_id: {
                required: true,
            },
            city_id: {
                required: true,
            },
            address: {
                required: true,
            },
            area: {
                required: true,
            },
            profile_image_path: {
                required: ProfileImg,
            },
            aadhar_card_number: {
                required: true,
                minlength: 12,
                maxlength: 12,
                digits: true,
            },
            pan_card_number: {
                required: true,
                minlength: 10,
                maxlength: 10,
            },
            DL_number: {
                required: true,
                minlength: 16,
                maxlength: 16,
            },
            RC_book_number: {
                required: true,
            },
            aadhar_card_image_path: {
                required: AadharCardImg,
            },
            pan_card_image_path: {
                required: PanCardImg,
            },
            DL_image_path: {
                required: DLImg,
            },
            RC_image_path: {
                required: RCImg,
            },
        },
        messages: {
            name: {
                required: "* Please enter name.",
            },
            email: {
                required: "* Please enter email.",
                email: "* Please enter valid email.",
            },
            mobile_number: {
                required: "* Please enter mobile number.",
                minlength: "* Mobile number must contain atleast 10 digits.",
                maxlength: "* Mobile number can contain only 10 digits.",
                digits: "* Please enter only digits.",
            },
            dob: {
                required: "* Please enter date of birth.",
            },
            gender: {
                required: "* Please select gender.",
            },
            salary: {
                required: "* Please enter salary.",
            },
            country_id: {
                required: "* Please select a country.",
            },
            state_id: {
                required: "* Please select a state.",
            },
            city_id: {
                required: "* Please select a city.",
            },
            address: {
                required: "* Please enter address.",
            },
            area: {
                required: "* Please enter area.",
            },
            profile_image_path: {
                required: "* Please choose profile image.",
            },
            aadhar_card_number: {
                required: "* Please enter Aadhar Aard number.",
                minlength: "* Aadhar card must contain atleast 12 digits.",
                maxlength: "* Aadhar card can contain only 12 digits.",
                digits: "* Please enter only digits.",
            },
            pan_card_number: {
                required: "* Please enter Pan Card number.",
                minlength: "* Pan Card must contain atleast 10 characters.",
                maxlength: "* Pan Card can contain only 10 characters.",
            },
            DL_number: {
                required: "* Please enter Driving License number.",
                minlength: "* Driving License must contain atleast 16 characters.",
                maxlength: "* Driving License can contain only 16 characters.",
            },
            RC_book_number: {
                required: "* Please enter RC book number.",
            },
            aadhar_card_image_path: {
                required: "* Please choose Aadhar Card image.",
            },
            pan_card_image_path: {
                required: "* Please choose Pan Card image.",
            },
            DL_image_path: {
                required: "* Please choose Driving License image.",
            },
            RC_image_path: {
                required: "* Please choose RC Book image.",
            },
        },
        submitHandler: function (form) {
            form.submit();
        },
    });
    
}); 

// citylist
$("#state_id").on("change", function () {
    var stateId = $(this).val();
    if (stateId != "") {
        $.ajax({
            url: base_url + "/city-list",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            data: { stateId: stateId },
            success: function (html) {
                $("#city_id").html(html);
            },
        });
    }
});

// datatable
$(function () {
    var table = $("#example").DataTable({
        processing: true,
        serverSide: true,

        ajax: "/delivery-agent-data-table",
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
            },
            {
                data: "name",
                name: "name",
            },
            {
                data: "email",
                name: "email",
            },
            {
                data: "mobile_number",
                name: "mobile_number",
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
