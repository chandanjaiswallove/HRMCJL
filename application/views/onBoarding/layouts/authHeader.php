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
    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

    <main class="drake-main">

        <section class="testimonial-area page-section scroll-to-page p-5">
            <div class="testimonial-slider-wrap scroll-animation" data-animation="fade_from_bottom"
                style="display:flex;align-items:center;justify-content:center;min-height:100vh;">

                <div class="testimonial-item" style="width:100%;max-width:520px;">
                    <div class="testimonial-item-inner">

                        <!-- LOGO -->
                        <div class="section-header text-center mb-4 scroll-animation" data-animation="fade_from_left">
                            <a href="<?php echo base_url(''); ?>">
                                <img src="modules/assets/images/logo.png" alt="Logo">
                            </a>
                        </div>