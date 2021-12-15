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
    <link rel="stylesheet" href="/css/form-style-z.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">



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
    <div class="overlay"></div>
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
                <h5>Personal Information</h5>
                <div id="message_div"></div>
                <form id="supervisor_form">
                    <section>
                        <div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name :</label>
                                        <input type="text" class="form-control" required id="firstname" name="firstname">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name :</label>
                                        <input type="text" class="form-control" required id="lastname" name="lastname">
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
                                        <input type="text" class="form-control" required id="phone_number" name="phone_number">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Department :</label>
                                        <select class="custom-select form-control" required id="department">
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
                                        <input type="text" required class="form-control date-picker" placeholder="Select Date" id="dob" name="dob">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select you class:</label>
                                        <select class="custom-select form-control" id="class" required>
                                            <option value="">DICT S20</option>
                                            <option value="Amsterdam">CEE M19</option>
                                            <option value="Berlin">ADH S21</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Alternative Phone Number :</label>
                                        <input type="text" class="form-control" data-required id="alt_phone" name="alt_phone" required>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                </form>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-success float-right" id="submit">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include('./messages/success_popup.php');
        include('./messages/error_popup.php');
        include('footer.php');
        ?>
    </div>
    </div>
    <!-- js -->
    <script src="vendors/scripts/core.js"></script>
    <script src="vendors/scripts/script.min.js"></script>
    <script src="vendors/scripts/process.js"></script>
    <script src="vendors/scripts/layout-settings.js"></script>
    <script src="/js/supervisor.js"></script>
</body>

</html>