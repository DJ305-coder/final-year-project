
$(document).ready(function () {
    $(function () {
        $("#registration_form").validate({
            onfocusout: false,
             rules: {
                whatsapp_number: {
                    required: true,
                },
                district_name: {
                    required: true,
                }
            },
            // Specify the validation error messages
            messages: {
                whatsapp_number: {
                    required: '* तुमचा 10 अंकी WhatsApp क्रमांक.',
                },
                district_name: {
                    required: '* जिल्हा निवडा.',
                }
            },
            submitHandler: function (form) {
                $(".submit").text("Please wait..");
                $(".submit").attr("disabled", true);

               form.submit();
            }
        });
    });
});