<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Dynamic Title -->
    <title><?= !empty($card->web_title) ? $card->web_title : 'Jaiswal'; ?></title>

    <!-- Dynamic Favicon -->
    <link rel="icon" type="image/x-icon"
        href="<?= !empty($card->web_icon) ? base_url($card->web_icon) : base_url('modules/assets/images/cicon.png'); ?>">

    <link rel="shortcut icon" type="image/x-icon"
        href="<?= !empty($card->web_icon) ? base_url($card->web_icon) : base_url('modules/assets/images/cicon.png'); ?>">

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


    <!-- <video class="body-overlay" id="bgVideo" muted autoplay loop playsinline controlsList="nodownload"
        disablePictureInPicture>
        <source src="<?= base_url('modules/assets/images/video1.mp4'); ?>" type="video/mp4">
    </video> -->
<img class="body-overlay" src="<?= base_url('modules/assets/images/photo1.png'); ?>" alt="Background Image">

    <div class="page-loader">
        <div class="bounceball"></div>
    </div>

    <!-- <span class="icon-menu">
        <span class="bar"></span>
        <span class="bar"></span>
    </span> -->

    <div class="global-color d-none">
        <span class="setting-toggle">
            <i class="las la-cog"></i>
        </span>
        <div class="inner">
            <div class="overlay"></div>
            <div class="global-color-option">
                <span class="close-settings">
                    <i class="las la-times"></i>
                </span>
                <h2>Configuration</h2>
                <div class="global-color-option-inner">
                    <p>Colors</p>
                    <div class="color-boxed">
                        <a href="<?php echo base_url('#'); ?>" class="clr-active" onclick="color1();"></a>
                        <a href="<?php echo base_url('#about'); ?>" onclick="color2();"></a>
                        <a href="<?php echo base_url('#resume'); ?>" onclick="color3();"></a>
                        <a href="<?php echo base_url('#'); ?>" onclick="color4();"></a>
                        <a href="<?php echo base_url('#skills'); ?>" onclick="color5();"></a>
                        <a href="<?php echo base_url('#portfolio'); ?>" onclick="color6();"></a>
                        <a href="<?php echo base_url('#testimonial'); ?>" onclick="color7();"></a>
                        <a href="<?php echo base_url('#contact'); ?>" onclick="color8();"></a>
                    </div>



                    <p>EIGHT BACKGROUND THEME</p>

                    <ul class="themes">
                        <li class="active">
                            <a href="javascript:void(0)" onclick="changeVideoReload('video1.mp4', this)">
                                THEME 1
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)" onclick="changeVideoReload('video2.mp4', this)">
                                THEME 2
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)" onclick="changeVideoReload('video3.mp4', this)">
                                THEME 3
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)" onclick="changeVideoReload('video4.mp4', this)">
                                THEME 4
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)" onclick="changeVideoReload('video5.mp4', this)">
                                THEME 5
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" onclick="changeVideoReload('video6.mp4', this)">
                                THEME 6
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" onclick="changeVideoReload('video7.mp4', this)">
                                THEME 7
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" onclick="changeVideoReload('video8.mp4', this)">
                                THEME 8
                            </a>
                        </li>
                    </ul>

                </div>
                <p class="copyright">
                    &copy; <?= date('Y'); ?> <?= $card->company_name; ?>. All Rights Reserved.
                    Designed by <a href="https://aidcom.in" target="_blank">Aidcom</a>.
                </p>
            </div>
        </div>
    </div>