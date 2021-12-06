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
								<h4>Ziwatti.ac.ke</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">dashboard</li>
								</ol>
							</nav>
						</div>
						<div class="card-box pd-20 height-100-p mb-30">
							<div class="row align-items-center">
								<div class="col-md-4">
									<img src="vendors/images/banner-img.png" alt="">
								</div>
								<div class="col-md-8">
									<h4 class="font-20 weight-500 mb-10 text-capitalize">
										Welcome back <div class="weight-600 font-30 text-blue"><?php echo $_SESSION['name']; ?></div>
									</h4>
									<p class="font-18 max-width-600">Welcome to Ziwa Technical Training Student attachment portal. The Institute would like to collect your Indurstrial attachment details for Student tracking and assesment.</p>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a href="attachment-apply.php" class="btn btn-primary dropdown-toggle" href="" role="button">
									Submit attachment details
								</a>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
			</div>
		</div>
		<?php
		include('footer.php');
		?>
	</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>

</html>