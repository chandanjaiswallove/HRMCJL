<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Dynamic Title -->
    <title><?= !empty($card->web_title) ? $card->web_title : 'Drake'; ?></title>

    <!-- Dynamic Favicon -->
    <link rel="icon" type="image/x-icon"
        href="<?= !empty($card->web_icon) ? base_url($card->web_icon) : base_url('modules/assets/images/favicon.png'); ?>">

    <link rel="shortcut icon" type="image/x-icon"
        href="<?= !empty($card->web_icon) ? base_url($card->web_icon) : base_url('modules/assets/images/favicon.png'); ?>">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Stylesheet -->
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="modules/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="modules/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="modules/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="modules/assets/css/animate.min.css">
    <link rel="stylesheet" href="modules/assets/css/smooth-scrollbar.css">
    <link rel="stylesheet" href="modules/assets/css/lightbox.min.css">

    <link rel="stylesheet" href="modules/assets/css/style.css">
    <link rel="stylesheet" href="modules/assets/css/responsive.css">

</head>

<body class="home1-page">


    <video class="body-overlay" id="bgVideo" muted autoplay loop>
        <source src="<?= base_url('modules/assets/images/video3.mp4'); ?>" type="video/mp4">
    </video>


    <div class="page-loader">
        <div class="bounceball"></div>
    </div>


    <div class="d-flex align-items-center justify-content-center vh-100 text-center">

        <div class="text-white">

            <h1 style="font-size:140px; font-weight:800; line-height:1;">
                404
            </h1>

            <h3 class="mb-3">
                Oops! Page Not Found
            </h3>

            <p style="max-width:500px; margin:auto; margin-bottom:30px;">
                The page you are looking for might have been removed,
                had its name changed, or is temporarily unavailable.
            </p>

            <a href="<?= base_url(); ?>" class="theme-btn">
                <i class="las la-home"></i> Back To Home
            </a>

        </div>

    </div>







    <!-- Header section ui_Footer  -->
    <?php
    $this->load->view('fronted/layouts/ui_Footer');
    ?>