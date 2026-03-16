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
    <title><?= !empty($card->web_title) ? $card->web_title : 'Jaiswal'; ?></title>

    <!-- Dynamic Favicon -->
    <link rel="icon" type="image/x-icon"
        href="<?= !empty($card->web_icon) ? base_url($card->web_icon) : base_url('modules/assets/images/cicon.png'); ?>">

    <link rel="shortcut icon" type="image/x-icon"
        href="<?= !empty($card->web_icon) ? base_url($card->web_icon) : base_url('modules/assets/images/cicon.png'); ?>">

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
    <!-- loader starts-->
    <div class="loader-wrapper">
        <div class="loader">
            <div class="loader4"></div>
        </div>
    </div>
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-header">
            <div class="header-wrapper row m-0">
                <form class="form-inline search-full col" action="#" method="get">
                    <div class="form-group w-100">
                        <div class="Typeahead Typeahead--twitterUsers">
                            <div class="u-posRelative">
                                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                                    placeholder="Search Riho .." name="q" title="" autofocus>
                                <div class="spinner-border Typeahead-spinner" role="status"><span
                                        class="sr-only">Loading... </span></div><i class="close-search"
                                    data-feather="x"></i>
                            </div>
                            <div class="Typeahead-menu"> </div>
                        </div>
                    </div>
                </form>
                <div class="header-logo-wrapper col-auto p-0">
                    <div class="logo-wrapper">
                        <a href="<?= base_url('admin_playground'); ?>">

                            <?php if (!empty($card->company_logo)) { ?>
                                <img class="img-fluid" src="<?= base_url($card->company_logo); ?>" alt="logo-light">
                            <?php } elseif (!empty($card->company_dark_logo)) { ?>
                                <img class="img-fluid" src="<?= base_url($card->company_dark_logo); ?>" alt="logo-dark">
                            <?php } ?>

                        </a>
                    </div>
                    <div class="toggle-sidebar"> <i class="status_toggle middle sidebar-toggle"
                            data-feather="align-center"></i></div>
                </div>
                <div class="left-header col-xxl-5 col-xl-6 col-lg-5 col-md-4 col-sm-3 p-0">
                    <div> <a class="toggle-sidebar" href="#"> <i class="iconly-Category icli"> </i></a>
                        <div class="d-flex align-items-center gap-2 ">
                            <h4 class="f-w-600">Welcome <?= $card->person_name ?? '' ?></h4><img class="mt-0"
                                src="modules/assets2/images/hand.gif" alt="hand-gif">
                        </div>
                    </div>
                    <div class="welcome-content d-xl-block d-none"><span class="text-truncate col-12">Here’s what’s
                            happening with your store today. </span></div>
                </div>
                <div class="nav-right col-xxl-7 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
                    <ul class="nav-menus">

                        <!-- This code comment for not using search functionality in dashboard. If you want to use it then uncomment this code and add search logic in controller and model. -->
                        <!-- <li class="d-md-block d-none">
                            <div class="form search-form mb-0">
                                <div class="input-group"><span class="input-icon">
                                        <svg>
                                            <use href="modules/assets2/svg/icon-sprite.svg#search-header"></use>
                                        </svg>
                                        <input class="w-100" type="search" placeholder="Search"></span></div>
                            </div>
                        </li> -->

                        <!-- <li class="d-md-none d-block">
                            <div class="form search-form mb-0 ">
                                <div class="input-group"> <span class="input-show">
                                        <svg id="searchIcon">
                                            <use href="modules/assets2/svg/icon-sprite.svg#search-header"></use>
                                        </svg>
                                        <div id="searchInput">
                                            <input type="search" placeholder="Search">
                                        </div>
                                    </span></div>
                            </div>
                        </li> -->


                        <li>
                            <div class="mode"><i class="moon" data-feather="moon"> </i></div>
                        </li>

                        <li class="onhover-dropdown notification-down rounded-pill">
                            <div class="notification-box">
                                <svg>
                                    <use href="modules/assets2/svg/icon-sprite.svg#notification-header"></use>
                                </svg><span class="badge rounded-pill badge-secondary"><?= $notification_count ?></span>
                            </div>
                            <div class="onhover-show-div notification-dropdown">
                                <div class="card mb-0">
                                    <div class="card-header">
                                        <div class="common-space">
                                            <h4 class="text-start f-w-600">Notitications</h4>
                                            <div>
                                                <span><?= $notification_count ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="notitications-bar">

                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-aboutus"
                                                    role="tabpanel" aria-labelledby="pills-aboutus-tab">
                                                    <?php if (!empty($notifications)): ?>
                                                        <?php foreach ($notifications as $row): ?>
                                                            <div class="user-message">
                                                                <div class="d-flex justify-content-between">
                                                                    <div>
                                                                        <a href="<?= base_url('visitors') ?>"
                                                                            class="f-w-500 f-12">
                                                                            <?= $row->visitor_fullname ?>
                                                                        </a>
                                                                        <div>
                                                                            <span class="f-light f-12">
                                                                                <?= substr($row->visitor_message, 0, 40) ?>...
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <span class="f-light f-12">
                                                                        <?= date('H:i', strtotime($row->contact_date)) ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <div class="text-center p-3">No new messages</div>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="card-footer pb-0 pr-0 pl-0">
                                                    <?php if ($notification_count > 5): ?>

                                                        <div class="text-center">
                                                            <a href="<?= base_url('visitors') ?>">
                                                                <button class="btn btn-primary">
                                                                    Check all
                                                                </button>
                                                            </a>
                                                        </div>

                                                    <?php endif; ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>


                        <li class="profile-nav onhover-dropdown">
                            <div class="media profile-media">
                                <img class="b-r-10" src="<?= !empty($card->profile_photo)
                                    ? base_url($card->profile_photo)
                                    : base_url('modules/assets2/images/dashboard/profile.png'); ?>" alt="Profile"
                                    style="width:41px; height:41px; object-fit:cover;">

                                <div class="media-body d-xxl-block d-none box-col-none">
                                    <div class="d-flex align-items-center gap-2">
                                        <span><?= $card->person_name ?? '' ?></span>
                                        <i class="middle fa fa-angle-down"></i>
                                    </div>
                                    <p class="mb-0 font-roboto">Admin</p>
                                </div>
                            </div>


                            <ul class="profile-dropdown onhover-show-div">

                                <!-- My Profile -->
                                <li>
                                    <a href="<?php echo base_url('profile_card'); ?>">
                                        <i data-feather="user"></i>
                                        <span>My Profile</span>
                                    </a>
                                </li>

                                <!-- Inbox -->
                                <li>
                                    <a href="<?= base_url('visitors'); ?>">
                                        <i data-feather="mail"></i>
                                        <span>Inbox</span>
                                    </a>
                                </li>



                                <?php if (!empty($card->whatsapp_support)): ?>
                                    <!-- Support -->
                                    <li class="d-sm-none d-block">
                                        <a href="https://wa.me/<?= $card->whatsapp_support; ?>?text=<?= urlencode('Hello I need support'); ?>"
                                            target="_blank">

                                            <i data-feather="headphones"></i>
                                            <span>Support</span>
                                        </a>
                                    </li>
                                <?php endif; ?>










                                <!-- Log Out -->
                                <li>
                                    <a class="btn btn-pill btn-outline-primary btn-sm"
                                        href="<?= base_url('logout'); ?>">
                                        Log Out
                                    </a>
                                </li>


                                <li class="customizer-links d-sm-none d-block">
                                    <a id="c-pills-home-tab" data-bs-toggle="pill" href="#c-pills-home" role="tab"
                                        aria-controls="c-pills-home" aria-selected="true">
                                        <i class="settings" data-feather="settings"></i>
                                    </a>
                                </li>


                            </ul>







                        </li>

                    </ul>
                </div>
                <script class="result-template" type="text/x-handlebars-template">
                    <div class="ProfileCard u-cf">                        
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details"> 
            <div class="ProfileCard-realName">{{name}}</div>
            </div> 
            </div>
          </script>
                <script class="empty-template" type="text/x-handlebars-template">
                    <div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div>
                </script>
            </div>
        </div>
        <!-- Page Header Ends-->
        <!-- Page Body Start-->

        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <div class="sidebar-wrapper" data-layout="stroke-svg">


                <div class="logo-wrapper">
                    <a href="<?php echo base_url('admin_playground') ?>">

                        <?php if (!empty($card->company_logo)) { ?>
                            <img class="img-fluid" src="<?= base_url($card->company_logo); ?>" alt="Company Logo"
                                style="height:36px; width:128px;">

                        <?php } elseif (!empty($card->company_dark_logo)) { ?>
                            <img class="img-fluid" src="<?= base_url($card->company_dark_logo); ?>" alt="Company Logo"
                                style="height:36px; width:128px;">

                        <?php } else { ?>
                            <img class="img-fluid" alt="Company Logo" style="height:36px; width:128px;">
                        <?php } ?>

                    </a>

                    <div class="back-btn">
                        <i class="fa fa-angle-left"></i>
                    </div>

                    <div class="toggle-sidebar">
                        <i class="status_toggle middle sidebar-toggle" data-feather="grid"></i>
                    </div>
                </div>
                <nav class="sidebar-main">
                    <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>

                    <div id="sidebar-menu">
                        <ul class="sidebar-links" id="simple-bar">
                            <li class="back-btn">
                                <a href="#">

                                    <?php if (!empty($card->company_logo)) { ?>
                                        <img class="img-fluid" src="<?= base_url($card->company_logo); ?>"
                                            alt="Company Logo" style="height:36px; width:128px;">

                                    <?php } elseif (!empty($card->company_dark_logo)) { ?>
                                        <img class="img-fluid" src="<?= base_url($card->company_dark_logo); ?>"
                                            alt="Company Logo" style="height:36px; width:128px;">

                                    <?php } else { ?>
                                        <img class="img-fluid" alt="Company Logo" style="height:36px; width:128px;">
                                    <?php } ?>

                                </a>

                                <div class="mobile-back text-end">
                                    <span>Back </span>
                                    <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                                </div>
                            </li>
                            <li class="pin-title sidebar-main-title">
                                <div>
                                    <h6>Pinned</h6>
                                </div>
                            </li>
                            <li class="sidebar-main-title">
                                <div>
                                    <h6 class="lan-1">General</h6>
                                </div>
                            </li>


                            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a
                                    class="sidebar-link sidebar-title" href="#">
                                    <svg class="stroke-icon">
                                        <use href="modules/assets2/svg/icon-sprite.svg#stroke-home"></use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="modules/assets2/svg/icon-sprite.svg#fill-home"></use>
                                    </svg><span class="lan-3">Dashboards</span></a>
                                <ul class="sidebar-submenu">
                                    <li><a href="<?php echo base_url('profile_card') ?>" class="active">Profile Card</a>
                                    </li>
                                    <li><a href="<?php echo base_url('introduce') ?>" class="active">Introduce</a>
                                    </li>
                                    <li><a href="<?php echo base_url('about') ?>" class="active">About </a>
                                    </li>
                                    <li><a href="<?php echo base_url('services') ?>" class="active">Services </a>
                                    </li>
                                    <li><a href="<?php echo base_url('my_skill') ?>" class="active">Skills </a>
                                    </li>
                                    <li><a href="<?php echo base_url('projects') ?>" class="active">Project </a>
                                    </li>
                                    <li><a href="<?php echo base_url('testimonials') ?>" class="active">Testimonials
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a
                                    class="sidebar-link sidebar-title" href="#">
                                    <svg class="stroke-icon">
                                        <use href="modules/assets2/svg/icon-sprite.svg#stroke-widget"></use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="modules/assets2/svg/icon-sprite.svg#fill-widget"></use>
                                    </svg>
                                    <span class="lan-6">Widgets</span></a>
                                <ul class="sidebar-submenu">
                                    <li><a href="<?php echo base_url('resume') ?>" class="active">Resume </a>
                                    </li>
                                    <li><a href="<?php echo base_url('pricing') ?>" class="active">Price Card </a>
                                    </li>
                                    <li><a href="<?php echo base_url('visitors') ?>" class="active">Contact </a>
                                    </li>
                                </ul>
                            </li>


                        </ul>
                    </div>
                </nav>
            </div>