<?php
session_start();
if (!isset($_SESSION['name']) && $_SESSION['name'] == '') {
	header("location:/index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>attachment.ziwatti.ac.ke</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->

	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/jquery-steps/jquery.steps.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">


	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
	<style type="text/css">
		#map {
			width: 900px;
			height: 500px;
		}
	</style>
</head>

<body>

	<?php
	include('top-bar.php');
	?>

	<?php
	include('side-bar.php');
	?>

	<?php
	include('left-bar.php');
	?>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Indurstrial Attachment and Liason</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="attachment.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Attachment details </li>
								</ol>
							</nav>
						</div>

					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<h4 class="text-blue h4">Attachment Form </h4>
						<p class="mb-30">Kindly fill your attachent details</p>
					</div>
					<div class="wizard-content">
						<form class="tab-wizard wizard-circle">
							<h5>Personal Information</h5>
							<section>
								<div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>First Name :</label>
												<input type="text" class="form-control" id="firstname" name="firstname">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Last Name :</label>
												<input type="text" class="form-control" id="lastname" name="lastname">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Email Address :</label>
												<input type="email" class="form-control" id="email" name="email">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Your Phone Number:</label>
												<input type="text" class="form-control" id="phone_number" name="phone_number">
											</div>
										</div>

									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Select Department :</label>
												<select class="custom-select form-control" id="department">
													<option value="">ICT</option>
													<option value="Amsterdam">MECHANICAL / AUTOMOTIVE</option>
													<option value="Berlin">BULDING AND CONSTRUCTION</option>
													<option value="Frankfurt">ELECTRICAL ENGINEERING</option>
													<option value="Amsterdam">HOSPITALITY AND DIATETICS</option>
													<option value="Berlin">BUSINESS STUDIES</option>
													<option value="Frankfurt">APPLIED AND ENVIRONMENTAL SCIENCE</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Date of Birth :</label>
												<input type="text" class="form-control date-picker" placeholder="Select Date" id="dob" name="dob">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Select you class:</label>
												<select class="custom-select form-control" id="class">
													<option value="">DICT S20</option>
													<option value="Amsterdam">CEE M19</option>
													<option value="Berlin">ADH S21</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Alternative Phone Number :</label>
												<input type="text" class="form-control" id="alt_phone" name="alt_phone" required>
											</div>
										</div>
									</div>
								</div>
							</section>

							<h5>Organization</h5>
							<section>
								<div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Attached Department :</label>
												<input type="text" class="form-control" id="attached_dep" name="attached_dep">
											</div>
											<div class="form-group">
												<label>Supervisor contact :</label>
												<input type="text" class="form-control" id="supervisor_no" name="supervisor_no">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Organization's Email Address :</label>
												<input type="text" class="form-control" id="org_email" name="org_email">
											</div>
											<div class="form-group">
												<label>Organization Contact :</label>
												<input type="text" class="form-control" id="org_no" name="org_no">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Insuarance :</label>
												<select class="custom-select form-control" id="insurance">
													<option value="insured">Insured</option>
													<option value="Not Insured">Not Insured</option>
													<option value="IDK">I Dont Know</option>
												</select>
											</div>
											<div class="form-group">
												<label>Name of the Organization :</label>
												<input type="text" class="form-control" id="org_name" name="org_name">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Starting date :</label>
												<input type="text" class="form-control date-picker" placeholder="Select starting Date" id="start_date" name="start_date">
											</div>
											<div class="form-group">
												<label>Completion date :</label>
												<input class="form-control date-picker" placeholder="Select complition date " type="text" id="completion_date" name="completion_date">
											</div>
										</div>
									</div>
								</div>
							</section>

							<h5>Location</h5>
							<section>
								<div>
									<h5>Kindly drag the map marker to your attachment location </h5>
									<div class="row">
										<div class="col-md-12" id="map">
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Lat :</label>
												<input type="text" id="lat" readonly="yes" class="form-control" name="latitude">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Long:</label>
												<input type="text" id="lng" readonly="yes" class="form-control" name="longitude">
											</div>
										</div>
									</div>
								</div>
							</section>

							<h5>Remarks</h5>
							<section>
								<div>
									<h5>Remark</h5>
									<section>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Comments</label>
													<textarea class="form-control" id="remark" name="remark"></textarea>
												</div>
											</div>
										</div>
									</section>
								</div>
							</section>
						</form>
					</div>
				</div>

				<!--  -->

				<!-- success Popup html Start -->
				<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-body text-center font-18">
								<h3 class="mb-20">Form Submitted!</h3>
								<div class="mb-30 text-center"><img src="vendors/images/success.png"></div>
								Thank you for submitting you attachment details.For any queries write to
								support@ziwatti.ac.ke
							</div>
							<div class="modal-footer justify-content-center">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
							</div>
						</div>
					</div>
				</div>
				<!-- success Popup html End -->


				<!-- error Popup html Start -->
				<div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-body text-center font-18">
								<h3 class="mb-20">Error Occured!</h3>
								<div class="mb-30 text-center"><img src="/vendors/images/caution-sign.png"></div>
								Error Submitting Your Form
							</div>
							<div class="modal-footer justify-content-center">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close and Review</button>
							</div>
						</div>
					</div>
				</div>
				<!-- error Popup html End -->
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				Designed and Managed By MIS <a href="https://ziwatti.ac.ke" target="_blank">Ziwa Technical Training
					Institute</a>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/jquery-steps/jquery.steps.js"></script>
	<script src="vendors/scripts/steps-setting.js"></script>
	<script src="/js/apply.js"></script>
	<script src="/js/gmap.js"></script>
</body>

</html>