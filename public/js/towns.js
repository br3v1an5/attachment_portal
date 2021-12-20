var submitButton = document.getElementById('submit');

submitButton.addEventListener('click', function (e) {
    e.preventDefault;
    var flag = 0;
    $(`form#AddForm :input`).each(function () {
        if ($(this).val() === "") {
            $(this).addClass('is-invalid');
            flag = 1;
        } else {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
        }

        if (flag == 1) {
            return
        }
        var data = $('#AddForm').serializeArray()
        console.log(data)
    });
})