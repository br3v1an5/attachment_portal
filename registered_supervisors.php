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
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />


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
                <div id="table">
                    <table class="table table-striped table-sm" id="table_loaded">
                        <thead class="thead-dark">
                            <tr>
                                <th>FULL NAME</th>
                                <th>EMAIL</th>
                                <th>PHONE</th>
                                <th>Date Of Birth</th>
                                <th>Department</th>
                                <th>Class</th>
                                <th>Alternative Phone</th>
                            </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </div>
        <?php
        include('./messages/error_popup.php');
        include('footer.php');
        ?>
    </div>
    </div>
    <!-- js -->
    <!-- <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false" type="text/javascript"></script> -->
    <script src="vendors/scripts/core.js"></script>
    <script src="vendors/scripts/script.min.js"></script>
    <script src="vendors/scripts/process.js"></script>
    <script src="vendors/scripts/layout-settings.js"></script>
    <script type="text/javascript" src="/DataTables/datatables.min.js"></script>
    <script src="js/list_supervisors.js"></script>
</body>

</html>