$(".tab-wizard").steps({
	headerTag: "h5",
	bodyTag: "section",
	transitionEffect: "fade",
	titleTemplate: '<span class="step">#index#</span> <span class="success">#title#</span>',
	labels: {
		finish: "Submit",
		next: "Next",
		previous: "Previous",
	},
	onStepChanged: function (event, currentIndex, priorIndex) {
		$('.steps .current').prevAll().addClass('disabled');
	},
	onFinished: function (event, currentIndex) {
		var firstname = document.getElementById('firstname').value;
		var lastname = document.getElementById('lastname').value;
		var email = document.getElementById('email').value;
		var phone_number = document.getElementById('phone_number').value;
		var department = document.getElementById('department').value;
		var dob = document.getElementById('dob').value;
		var sel_class = document.getElementById('class').value;
		var alt_phone = document.getElementById('alt_phone').value;
		var attached_dep = document.getElementById('attached_dep').value;
		var supervisor_no = document.getElementById('supervisor_no').value;
		var org_email = document.getElementById('org_email').value;
		var org_no = document.getElementById('org_no').value;
		var insurance = document.getElementById('insurance').value;
		var org_name = document.getElementById('org_name').value;
		var start_date = document.getElementById('start_date').value;
		var completion_date = document.getElementById('completion_date').value;
		var latitude = document.getElementById('lat').value;
		var longitude = document.getElementById('lng').value;
		var remark = document.getElementById('remark').value;

		var data = {
			firstname,
			lastname,
			email,
			phone_number,
			department,
			dob,
			sel_class,
			alt_phone,
			attached_dep,
			supervisor_no,
			org_email,
			org_no,
			insurance,
			org_name,
			start_date,
			completion_date,
			latitude,
			longitude,
			remark,
		}

		// $('#success-modal').modal('show');
		$.ajax({
			type: 'POST',
			url: '/ajax/attchment-form.php',
			data: data,
			success: function (data, status) {
				$('#success-modal').modal('show');
			},
			error: function (request, status, error) {
				$('#error-modal').modal('show');
			}
		});

	}
});