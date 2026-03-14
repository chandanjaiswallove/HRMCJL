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

    <span class="icon-menu">
        <span class="bar"></span>
        <span class="bar"></span>
    </span>

    <div class="global-color">
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
                        <a href="<?php echo base_url('#services'); ?>" onclick="color4();"></a>
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

    <div class="responsive-sidebar-menu">
        <div class="overlay"></div>
        <div class="sidebar-menu-inner">
            <div class="menu-wrap">
                <p>Menu</p>

                    <a class="scroll-to" href="<?= base_url('onBoarding'); ?>">
                        <i class="las la-stream"></i> <span>Sign in</span>
                    </a>
               
                
                <ul class="menu scroll-nav-responsive d-flex">
                    <li>
                        <a class="scroll-to" href="#home">
                            <i class="las la-home"></i> <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a class="scroll-to" href="#about">
                            <i class="lar la-user"></i> <span>About</span>
                        </a>
                    </li>
                    <li>
                        <a class="scroll-to" href="#resume">
                            <i class="las la-briefcase"></i> <span>Resume</span>
                        </a>
                    </li>
                    <li>
                        <a class="scroll-to" href="#services">
                            <i class="las la-stream"></i> <span>Services</span>
                        </a>
                    </li>
                    <li>
                        <a class="scroll-to" href="#skills">
                            <i class="las la-shapes"></i> <span>Skills</span>
                        </a>
                    </li>
                    <li>
                        <a class="scroll-to" href="#portfolio">
                            <i class="las la-grip-vertical"></i> <span>Portfolios</span>
                        </a>
                    </li>
                    <li>
                        <a class="scroll-to" href="#testimonial">
                            <i class="lar la-comment"></i> <span>Testimonial</span>
                        </a>
                    </li>
                    <li>
                        <a class="scroll-to" href="#contact">
                            <i class="las la-envelope"></i> <span>Contact</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="sidebar-social">
                <p>Social</p>
                <ul class="social-links d-flex align-items-center">

                    <?php if ($card->social_one): ?>
                        <li>
                            <a href="<?= $card->social_one; ?>" target="_blank">
                                <i class="lab la-twitter"></i>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if ($card->social_two): ?>
                        <li>
                            <a href="<?= $card->social_two; ?>" target="_blank">
                                <i class="lab la-dribbble"></i>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if ($card->social_three): ?>
                        <li>
                            <a href="<?= $card->social_three; ?>" target="_blank">
                                <i class="lab la-instagram"></i>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if ($card->social_four): ?>
                        <li>
                            <a href="<?= $card->social_four; ?>" target="_blank">
                                <i class="lab la-github"></i>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if ($card->whatsapp_contact): ?>
                        <li>
                            <a href="https://wa.me/<?= $card->whatsapp_contact; ?>?text=<?= urlencode($card->whatsapp_message); ?>"
                                target="_blank">
                                <i class="lab la-whatsapp"></i>
                            </a>
                        </li>
                    <?php endif; ?>



                </ul>
          
                <p class="copyright">
                    Designed by <a href="https://aidcom.in" target="_blank">Aidcom</a>
                </p>

            </div>


        </div>
    </div>




    <ul class="menu scroll-nav d-flex">
        <li>
            <a class="scroll-to" href="#home">
                <span>Home</span> <i class="las la-home"></i>
            </a>
        </li>
        <li>
            <a class="scroll-to" href="#about">
                <span>About</span> <i class="lar la-user"></i>
            </a>
        </li>
        <li>
            <a class="scroll-to" href="#resume">
                <span>Resume</span> <i class="las la-briefcase"></i>
            </a>
        </li>
        <li>
            <a href="#services">
                <span>Services</span> <i class="las la-stream"></i>
            </a>
        </li>
        <li>
            <a class="scroll-to" href="#skills">
                <span>Skills</span> <i class="las la-shapes"></i>
            </a>
        </li>
        <li>
            <a class="scroll-to" href="#portfolio">
                <span>Portfolios</span> <i class="las la-grip-vertical"></i>
            </a>
        </li>
        <li>
            <a class="scroll-to" href="#testimonial">
                <span>Testimonial</span> <i class="lar la-comment"></i>
            </a>
        </li>
        <li>
            <a class="scroll-to" href="#contact">
                <span>Contact</span> <i class="las la-envelope"></i>
            </a>
        </li>
    </ul>

    <div class="left-sidebar">

        <div class="sidebar-header d-flex align-items-center justify-content-between">
            <a href="<?= base_url(); ?>">
                <img src="<?= base_url($card->company_logo); ?>" alt="Company_Logo" style="height:36px; width: 128px; !important;">
            </a>
        </div>

        <img class="me" src="<?= base_url($card->profile_photo); ?>" alt="Me">

        <h2 class="email"><?= $card->person_name; ?></h2>
        <h2 class="address"><?= $card->address; ?></h2>

        <p class="copyright">
            &copy; <?= date('Y'); ?> <?= $card->company_name; ?>. All Rights Reserved
        </p>

        <ul class="social-profile d-flex align-items-center flex-wrap justify-content-center">

            <?php if ($card->social_one): ?>
                <li>
                    <a href="<?= $card->social_one; ?>" target="_blank">
                        <i class="lab la-twitter"></i>
                    </a>
                </li>
            <?php endif; ?>

            <?php if ($card->social_two): ?>
                <li>
                    <a href="<?= $card->social_two; ?>" target="_blank">
                        <i class="lab la-dribbble"></i>
                    </a>
                </li>
            <?php endif; ?>

            <?php if ($card->social_three): ?>
                <li>
                    <a href="<?= $card->social_three; ?>" target="_blank">
                        <i class="lab la-instagram"></i>
                    </a>
                </li>
            <?php endif; ?>

            <?php if ($card->social_four): ?>
                <li>
                    <a href="<?= $card->social_four; ?>" target="_blank">
                        <i class="lab la-github"></i>
                    </a>
                </li>
            <?php endif; ?>

        </ul>

        <a href="https://wa.me/<?= $card->whatsapp_contact; ?>?text=<?= urlencode($card->whatsapp_message); ?>"
            target="_blank" class="theme-btn">
            <i class="lab la-whatsapp"></i> Contact Me
        </a>

    </div>