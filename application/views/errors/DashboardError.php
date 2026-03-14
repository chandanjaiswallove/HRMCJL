<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Riho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Riho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <!-- Dynamic Title -->
    <title><?= !empty($card->web_title) ? $card->web_title : 'Drake'; ?></title>

    <!-- Dynamic Favicon -->
    <link rel="icon" type="image/x-icon"
        href="<?= !empty($card->web_icon) ? base_url($card->web_icon) : base_url('modules/assets/images/favicon.png'); ?>">

    <link rel="shortcut icon" type="image/x-icon"
        href="<?= !empty($card->web_icon) ? base_url($card->web_icon) : base_url('modules/assets/images/favicon.png'); ?>">

    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="modules/assets2/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="modules/assets2/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="modules/assets2/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="modules/assets2/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="modules/assets2/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="modules/assets2/css/vendors/slick.css">
    <link rel="stylesheet" type="text/css" href="modules/assets2/css/vendors/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="modules/assets2/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="modules/assets2/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="modules/assets2/css/vendors/echart.css">
    <link rel="stylesheet" type="text/css" href="modules/assets2/css/vendors/date-picker.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="modules/assets2/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="modules/assets2/css/style.css">
    <link id="color" rel="stylesheet" href="modules/assets2/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="modules/assets2/css/responsive.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="error-wrapper text-center" style="padding:120px 0;">



                    <div class="error-content">
                        <div class="error-heading">
                            <h1 style="font-size:120px;font-weight:700;color:#7366ff;">404</h1>
                        </div>
                        <h2>Page Not Found</h2>

                        <p style="max-width:500px;margin:auto;">
                            The page you are looking for might have been removed,
                            had its name changed, or is temporarily unavailable.
                        </p>

                        <div style="margin-top:30px;">

                            <a href="<?= base_url('admin_playground'); ?>" class="btn btn-primary btn-lg">
                                <i data-feather="home"></i> Back to Dashboard
                            </a>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>




</body>

</html>