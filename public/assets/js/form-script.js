$(function () {
	var images = [
		'https://images.pexels.com/photos/1558732/pexels-photo-1558732.jpeg',
		'https://images.pexels.com/photos/1287075/pexels-photo-1287075.jpeg',
		'https://images.pexels.com/photos/326055/pexels-photo-326055.jpeg'
	];
	setInterval(function () {
		var url = images[Math.floor(Math.random() * images.length)];
		$("body").css({ 'background': 'url(' + url + ') no-repeat center center fixed', 'background-size': 'cover cover', 'body': '100vh' });
	}, 5000);

	$('[data-toggle="tooltip"]').tooltip();

});
function formValidate(formId, formMsg) {
	var flag = 0;
	$(formId).find('[data-required]').each(function () {
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
	var url = formId == '#singninFrom' ? '/login' : '/register'
	var action = formId == '#singninFrom' ? 'Logged In' : 'Registered'
	$(".overlay").show();
	$(".overlay").html('<div class="text-light"><span class="spinner-grow spinner-grow-sm" role="status"></span> Please wait...!</div>');
	setTimeout(function () { $(".overlay").hide() }, 800);
	$.ajax({
		type: 'POST',
		url: url,
		data: $(formId).serialize(),
		success: function (data) {
			$(formMsg).html(`<div class="alert alert-success p-1 mt-1"><i class="fa fa-fw fa-thumbs-up"></i> ${action} successfully <strong>Please wait..!</strong></div>`);
			window.location = '/'
		},
		error: function (xhr) {
			switch (xhr.status) {
				case 422:
					for (let i in xhr.responseJSON.errors) {
						$(formMsg).html(`<div class="text-danger"><i class="fa fa-exclamation-circle"></i> ${xhr.responseJSON.errors[i][0]} </div>`);
					}
					break;

				default:
					$(formMsg).html(`<div class="text-danger"><i class="fa fa-exclamation-circle"></i> Unknown Error Occured </div>`);
					break;
			}
		}
	});

}