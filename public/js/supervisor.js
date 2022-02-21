$(function () {
    submitBtn = document.getElementById('submit');
    submitBtn.addEventListener('click', function (e) {
        e.preventDefault();
        formValidate('supervisor_form', 'message_div')
    });

});
function formValidate(formId, formMsg) {
    var flag = 0;
    var s_data = [];
    $(`form#${formId} :input`).each(function () {
        if ($(this).val() === "") {
            $(this).addClass('is-invalid');
            flag = 1;
        } else {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
            $(formMsg).html('');
        }
    });
    if (flag == 1) {
        $(formMsg).html('<div class="text-danger"><i class="fa fa-exclamation-circle"></i> Asterisk fields are mandatory! </div>');
        return false;
    }

    $(".overlay").show();
    $(".overlay").html('<div class="text-light"><span class="spinner-grow spinner-grow-sm text-white font-weight-bold" role="status"></span> Please wait...!</div>');
    // setTimeout(function () {  }, 5000);
    let obj = {
        firstname: $('#firstname').val(),
        lastname: $('#lastname').val(),
        email: $('#email').val(),
        phone_number: $('#phone_number').val(),
        department_id: $('#department').val(),
        dob: $('#dob').val(),
        course_id: $('#class').val(),
        alt_phone: $('#alt_phone').val(),
        _token: $('input[name="_token"]').val()
    }

    $.ajax({
        type: 'POST',
        url: '/admin/supervisors',
        data: obj,
        success: function (xhr) {
            let message = xhr.message;
            let msg = `<div class="text-success"><span class="spinner-grow spinner-grow-sm text-white font-weight-bold" role="status"></span> ${message}</div>`
            $('#error-message').html(msg);
            // $(this).closest('form').find("input[type=text], textarea, date, select").val("");
            $(".overlay").hide()
            $('#success-modal').modal('show');
            setTimeout(function () { window.location = "/admin/supervisors" }, 3000);
            // $(formId).trigger('reset');

        },
        error: function (xhr) {
            $('#error-message').children().remove()
            switch (xhr.status) {
                case 422:
                    for (let i in xhr.responseJSON.errors) {
                        let p = `<div class="text-danger"><i class="fa fa-exclamation-circle"></i> ${xhr.responseJSON.errors[i][0]} </div>`;
                        $('#error-message').append(p);
                    }
                    break;

                default:
                    let message = xhr.responseJSON.message;
                    $('#error-message').html(`<div class="text-danger"><i class="fa fa-exclamation-circle"></i> ${message} </div>`);
                    break;
            }
            $(".overlay").hide()
            $('#error-modal').modal('show');
        }
    });


}