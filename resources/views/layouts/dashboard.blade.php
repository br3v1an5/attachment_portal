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

    <link rel="stylesheet" type="text/css" href="/assets/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="/assets/vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/jquery-steps/jquery.steps.css">
    <link rel="stylesheet" type="text/css" href="/assets/vendors/styles/style.css">


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
    @include('sections.top-bar')
    @include('sections.side-bar')
    @include('sections.left-bar')

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                @yield('content');


            </div>
            @include('sections.error_popup')
            @include('sections.success_popup')
            @include('sections.footer')
        </div>
    </div>
    <!-- js -->
    <script src="/assets/vendors/scripts/core.js"></script>
    <script src="/assets/vendors/scripts/script.min.js"></script>
    <script src="/assets/vendors/scripts/process.js"></script>
    <script src="/assets/vendors/scripts/layout-settings.js"></script>
    <script src="/assets/src/plugins/jquery-steps/jquery.steps.js"></script>
    <script src="/assets/vendors/scripts/steps-setting.js"></script>
    <script src="/assets/js/apply.js"></script>
    <script src="/assets/js/gmap.js"></script>
</body>

</html>