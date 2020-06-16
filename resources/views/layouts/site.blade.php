<!DOCTYPE html>
<head>
    <style type="text/css">
.image-background.contain {
    background-size: contain;
    height: 100px !important;
}
.media-body > p{
    font-size: 80%;
}
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="author" content="Ocam" />

    <link rel="apple-touch-icon" href="{{ asset('site/assets/skin2/img/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('site/assets/skin2/img/favicon.ico') }}">


    <title>EmpWik | Track & collaborate & organise your team's and employees for better productivity</title>
    <meta name="Description" content="Welcome to EmpWik.">
    <meta name="Keywords" content="Keywords separated by cama">



    <!-- Stylesheet Files -->

    <link href="{{ asset('https://fonts.googleapis.com/css?family=Poppins:100,300,400,700,900') }}" rel="stylesheet">
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Caveat') }}" rel="stylesheet">

    <!-- themeforest:css -->
    <link rel="stylesheet" href="{{ asset('site/assets/skin2/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('site/assets/skin2/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/skin2/css/cookieconsent.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/skin2/fonts/fontawesome/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/skin2/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/skin/icon_fonts_assets/themefy/themify-icons.css') }}">



    <link rel="stylesheet" href="{{ asset('site/assets/skin2/css/helper.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/skin2/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/skin2/css/odometer-theme-minimal.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/skin2/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/skin2/css/prettify.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/skin2/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/skin2/css/smart_wizard.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/skin2/css/smart_wizard_theme_arrows.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/skin2/css/smart_wizard_theme_circles.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/skin2/css/smart_wizard_theme_dots.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/skin2/css/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/skin2/css/styles1.css') }}">
    <!-- End - Stylesheet Files -->
</head>

<body style="min-width: 440px;">


    <!-- Making stripe menu -->
    <nav class="st-nav navbar main-nav navigation fixed-top">
        <div class="container">
            <ul class="st-nav-menu nav navbar-nav">
                <li class="st-nav-section nav-item">
                    <a href="" class="navbar-brand">
                        <img src="{{ asset('site/assets/skin2/img/textwik-logo.png') }}" alt="Textwik" class="logo logo-sticky d-block d-md-none">
                        <img src="{{ asset('site/assets/skin2/img/textwik-logo.png') }}" alt="Textwik" class="logo d-none d-md-block">
                    </a>
                </li>

                <li class="st-nav-section st-nav-primary nav-item" style="margin-left: 14%;">
                    <a class="st-root-link nav-link" href="">Home </a>
                    <a class="st-root-link item-company st-has-dropdown nav-link" data-dropdown="aboutus">About Us </a>
                    <!-- <a class="st-root-link item-company st-has-dropdown nav-link" data-dropdown="menu">Menu</a> -->
                    <a class="st-root-link item-company st-has-dropdown nav-link" data-dropdown="products">Products</a>
                    <a class="st-root-link item-company st-has-dropdown nav-link" data-dropdown="cases">Use cases</a>
                    <a class="st-root-link nav-link" href="">Pricing </a>
                </li>
                <li class="st-nav-section st-nav-secondary nav-item">
                    <a class="btn btn-rounded btn-outline mr-3 px-3" href="{{ route('login') }}" >
                        <i class="fas fa-sign-in-alt d-none d-md-inline mr-md-0 mr-lg-2"></i>
                        <span class="d-md-none d-lg-inline">Login</span>
                    </a>
                    {{-- <a class="btn btn-rounded btn-outline mr-3 px-3" href="{{ route('login') }}" >
                        <i class="fas fa-sign-in-alt d-none d-md-inline mr-md-0 mr-lg-2"></i>
                        <span class="d-md-none d-lg-inline">Login</span>
                    </a> --}}
                    <a class="btn btn-rounded btn-solid px-3" href="{{ route('register') }}" >
                        <i class="fas fa-user-plus d-none d-md-inline mr-md-0 mr-lg-2"></i>
                        <span class="d-md-none d-lg-inline">Signup</span>
                    </a>
                </li>
                <li class="st-nav-section st-nav-mobile nav-item">
                    <button class="st-root-link navbar-toggler" type="button">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div style=" position: fixed;left: -55px;" class="st-popup">
                        <div class="st-popup-container">
                            <a class="st-popup-close-button">Close</a>
                            <div style="margin-left: 7%; margin-top: 3%;" class="st-dropdown-content-group">
                                <h4 style="    margin-left: 2%;" class="text-uppercase regular">Pages</h4>
                                <a class="regular text-primary" href="">
                                        <i class="fas fa-home icon"></i> Home </a>
                                <a class="regular text-info" href="">
                                    <i class="far fa-building icon"></i> About </a>
                                <a class="regular text-success" href="">
                                    <i class="far fa-envelope icon"></i> Contact </a>
                                <a class="regular text-warning" href="">
                                    <i class="fas fa-hand-holding-usd icon"></i> Pricing </a>
                                <a class="regular text-info" href="">
                                    <i class="far fa-question-circle icon"></i> FAQs</a>
                            </div>
                            <div style=" margin-left:  5%; margin-right: -22%;" class="st-dropdown-content-group b-t bw-2">
                                <h4  style="    margin-left: 3%;"class="text-uppercase regular">Products</h4>
                                <div class="row">
                                    <div class="col mr-4">
                                        <a class="regular text-primary" href="">
                                        <i class="fas fa-sms icon "></i> SMS/MMS MESSAGING </a>
                                            <a class="regular text-primary" href="">
                                        <i class="fas fa-microphone icon "></i> VOICE MESSAGING </a>
                                            <a class="regular text-primary"href="">
                                        <i class="fas fa-bell icon  "></i> PUSH NOTIFICATION </a>
                                            <a class="regular text-primary" href="">
                                        <i class="fas fa-robot icon  "></i> RCS MESSAGING </a>
                                            <a class="regular text-primary" href="">
                                        <i class="fas fa-clipboard-list icon"></i>TEXTING SURVEY</a>

                                    </div>
                                    <h4  style="margin-top: -6%; margin-right: -20%;" class="text-uppercase regular">Use cases</h4>

                                    <div class="col mr-4">
                                        <a class="regular text-primary" href="">
                                        <i class="fas fa-sms icon "></i> Messaging-Api </a>
                                        <a class="regular text-primary" href="">
                                        <i class="fas fa-microphone icon  "></i> Voice-Api </a>
                                        <a class="regular text-primary" href="">
                                        <i class="fas fa-key icon  "></i> SMPP Access </a>
                                        <a class="regular text-primary" href="">
                                        <i class="fas fa-tools icon  "></i> SDK&Tools </a>
                                        <a class="regular text-primary" href="">
                                        <i class="far fa-lightbulb icon  "></i> Tutorials </a>
                                        <a class="regular text-primary" href="">
                                        <i class="fas fa-book    icon  "></i> Documentation </a>
                                    </div>
                                </div>
                            </div>

                            <div style="    margin-left: 7%;" class="st-dropdown-content-group bg-6 b-t">
                                <a href="">Sign in
                                    <i class="fas fa-arrow-right"></i>
                                </a>

                            </div>
                            <div style="    margin-left: 7%;" class="st-dropdown-content-group bg-6 b-t">
                                <a href="">Sign UP
                                    <i class="fas fa-user-plus"></i>
                                </a>

                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="st-dropdown-root">
            <div class="st-dropdown-bg">
                <div class="st-alt-bg"></div>
            </div>
            <div class="st-dropdown-arrow"></div>

            <div class="st-dropdown-container">
                <div class="st-dropdown-section" data-dropdown="aboutus">
                    <div class="st-dropdown-content">
                        <div class="st-dropdown-content-group">
                            <div class="row">
                                <div class="col mr-4">
                                    <a class="dropdown-item"  href="{{route('about-us')}}">About Us</a>
                                    <a class="dropdown-item"  href="{{route('contact')}}">Contact us</a>
                                </div>
                                <div class="col mr-4">
                                    <a class="dropdown-item"  href="{{route('testimonials')}}">Testimonials</a>
                                    <a class="dropdown-item"  href="{{route('faqs')}}">FAQs</a>
                                </div>
								<div class="col mr-4">
                                    <a class="dropdown-item"  href="{{route('careers')}}">Careers</a>
                                </div>
                                 <!--
                                <div class="col">

                                    <a class="dropdown-item"  href="">Terms & Conditions</a>
                                    <a class="dropdown-item"  href="">Privacy Policy</a>
                                    <a class="dropdown-item"  href="">Anti-Spam Policy </a>
                                    <a class="dropdown-item"  href="">DMCA Compliance </a>
                                    <a class="dropdown-item"  href="">Refund Policy</a>
                                    <a class="dropdown-item"  href="">Shortcodes T&Cs</a>
                                </div>
                            -->
                            </div>
                        </div>
                          <div class="st-dropdown-content-group">
                            <div class="row">
                                <div class="col">
                                    <a class="dropdown-item bold" href="#">
                                    <i class="fab fa-facebook icon"></i> Facebook </a>
                                </div>
                                <div class="col">
                                        <a class="dropdown-item bold" href="#">
                                    <i class="fab fa-twitter icon"></i> Twiter </a>
                                </div>
                                <div class="col">
                                  <a class="dropdown-item bold" href="#">
                                    <i class="fab fa-linkedin icon"></i> LinkedIn </a>
                                </div><div class="col">
                                   <a class="dropdown-item bold" href="#">
                                    <i class="fab fa-instagram icon"></i> Instagram </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- developers -->
                <div class="st-dropdown-section" data-dropdown="cases">
                    <div class="st-dropdown-content">
                        <div class="st-dropdown-content-group">
                            <div class="mb-4">
                                <h3 class="color-5 light text-nowrap">
                                    <span class="bold regular">Useful Tools</span> you'll need</h3>
                                <p class="color-2 mt-0">Build modern, high-quality voice applications in the cloud.</p>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <ul class="mr-4">
                                        <li>
                                            <h4 class="text-uppercase regular">API Reference</h4>
                                        </li>
                                        <li>
                                            <a  href="">Messaging API</a>
                                        </li>
                                        <li>
                                            <a  href="">Voice API</a>
                                        </li>
                                        <li>
                                            <a  href="">SMPP Access</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <ul class="mr-4">

                                        <li>
                                            <a  href="">SDK &  Tools</a>
                                        </li>
                                        <li>
                                            <a  href="">Tutorials</a>
                                        </li>
                                        <li>
                                            <a  href="">Documentation</a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="st-dropdown-content-group">
                            <div class="row">
                                <div class="col">
                                    <a class="dropdown-item bold"  href="#">
                                    <i class="ti-github icon"></i> Github </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-item bold"  href="#">
                                    <i class="ti-youtube icon"></i> Youtube </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-item bold"  href="#">
                                    <i class="ti-stack-overflow icon"></i> Stackoverflow</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- END developers -->
                <!-- Produits -->
                <div class="st-dropdown-section" data-dropdown="products">
                    <div class="st-dropdown-content">
                        <div class="st-dropdown-content-group">
                            <div class="mb-4 align-items-center">
                                <h3 class="color-5 light text-nowrap">
                                    <span class="bold regular">Useful Tools</span> you'll need</h3>
                                <p class="color-2 mt-0">Build modern, high-quality voice applications in the cloud.</p>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <ul class="mr-4">
                                        <li>
                                            <a class="dropdown-item"  href="{{route('products')}}">
                                                <div class="media align-items-center mb-2">
													<div class="text-contrast icon-md center-flex rounded-circle mr-3">
                                                    	<i class="fas fa-stopwatch icon fa-2x"></i>
													</div>
                                                    <div class="media-body">
                                                        <h3 class="link-title m-0">TIME TRACKING</h3>
                                                        <p class="m-0 color-2">Flexible & Easy To Use Time Tracking Tool </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item"  href="">
                                                <div class="media align-items-center mb-2">
													<div class="text-contrast icon-md center-flex rounded-circle mr-3">
                                                    	<i class="fas fa-chart-pie icon fa-2x"></i>
													</div>
                                                    <div class="media-body">
                                                        <h3 class="link-title m-0">TIMESHEETS</h3>
                                                        <p class="m-0 color-2">Simple timesheets and powerful reports </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item"  href="">
                                                <div class="media align-items-center mb-2">
													<div class="text-contrast icon-md center-flex rounded-circle mr-3">
                                                    	<i class="fas fa-calendar-alt icon fa-2x"></i>
													</div>
                                                    <div class="media-body">
                                                        <h3 class="link-title m-0">SCHEDULING</h3>
                                                        <p class="m-0 color-2">Plan Your Team's Schedules and Mark Attendance</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item"  href="">
                                                <div class="media align-items-center mb-2">
													<div class="text-contrast icon-md center-flex rounded-circle mr-3">
                                                    	<i class="fas fa-clipboard-list icon fa-2x"></i>
													</div>
                                                    <div class="media-body">
                                                        <h3 class="link-title m-0">Tasks</h3>
                                                        <p class="m-0 color-2">Organize & Prioritise tasks and projects within boards.</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <ul style="margin-top: -6;" class="mr-4">
                                       <li>
                                            <a class="dropdown-item"  href="">
                                                <div class="media align-items-center mb-2">
													<div class="text-contrast icon-md center-flex rounded-circle mr-3">
                                                    	<i class="fas fa-handshake icon fa-2x"></i>
													</div>
                                                    <div class="media-body">
                                                        <h3 class="link-title m-0">ONLINE INVOICING</h3>
                                                        <p class="m-0 color-2">Easy to create, send and manage your company's invoices</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item"  href="">
                                                <div class="media align-items-center mb-2">
													<div class="text-contrast icon-md center-flex rounded-circle mr-3">
                                                    	<i class="fas fa-file-invoice-dollar icon fa-2x" style="margin-left:10px"></i>
													</div>
                                                    <div class="media-body">
                                                        <h3 class="link-title m-0">Payroll</h3>
                                                        <p class="m-0 color-2">Automates the Management of Employees' Salaries, Earnings & Deductions</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
										<li>
                                            <a class="dropdown-item"  href="">
                                                <div class="media align-items-center mb-2">
													<div class="text-contrast icon-md center-flex rounded-circle mr-3">
                                                    	<i class="fas fa-eye icon fa-2x" style="margin-left:10px"></i>
													</div>
                                                    <div class="media-body">
                                                        <h3 class="link-title m-0">MONITORING</h3>
                                                        <p class="m-0 color-2">Track Employee Activities & Increase engagement </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <h4 class="text-uppercase regular">Huge Tools list</h4>
                            <div class="row">
                                <div class="col mr-4">
                                    <a class="dropdown-item"  href="">Live Chat</a>
                                    <a class="dropdown-item"  href="">Phone numbers</a>
                                </div>
                                <div class="col mr-4">
                                    <a class="dropdown-item"  href="">Appointments</a>
                                    <a class="dropdown-item"  href="">Autoresponders</a>
                                </div>
                                <div class="col mr-4">
                                    <a class="dropdown-item"  href="">In-app Messaging</a>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- END Produits -->
            </div>
        </div>
    </nav>
    <main>
        <header class="section header header-v6">
            <div class="shape-wrapper">
                <img src="{{ asset('site/assets/skin2/img/v6/header/bg-shape.svg') }}" class="main-background img-responsive" alt="" style="">
                <div class="shape shape-background shape-top center-xy"></div>
                <div class="shape shape-background shape-right"></div>
            </div>
            <div class="container overflow-hidden">
                <div class="row gap-y" style="">
                    <div class="col-md-7" data-aos="fade-right" style="padding-top: 28px;">
                        <h1 class="extra-bold display-md-3 font-md" style="font-size: 3.5rem !important;">
                           Maximize Productivity
                            <span class="d-block light" style="font-size: 50px;padding-top: 15px;"> Communication and Performance</span>
                        </h1>
                        <p class="lead">
                            Need to plan and manage your projects? EmpWik let you manage project task's within teams, track time and monitor Employees.</p>
                            <p class="handwritten font-md highlight px-4">Get Free Trial</p>
                        <nav class="nav mt-5">
                            <a style="background-image: linear-gradient(-135deg, #028fff 25%, #34d085 100%);" href="#" class="nav-link mr-3 btn btn-rounded btn-success">Free Trial </a>
                            <a style="background-color: #34d085;color: #ffffff;" href="#" class="nav-link btn btn btn-rounded btn-1">
                                <i class="fas fa-tag mr-3"></i> Book a demo{{-- Plans & pricing --}}</a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="main-shape-wrapper" style="">
                <div data-aos="fade-left" data-aos-delay="300" class="aos-init aos-animate">
                    <img style="max-width: 120%;" class="img-responsive main-shape" alt="" src="{{ asset('site/assets/skin2/img/home/home_header.png') }}" >
                </div>
            </div>
        </header>
        <section class="section mt-n " data-aos="flip-right">
            <div class="container pt-0">
                <div class="shadow bg-1 p-4 rounded">
                    <div class="row gap-y text-center">
                        <div class="col-12 col-md-4 py-4 px-5 d-flex flex-column b-r">
                            <div class="icon-shape mb-4">
                                <img src="{{ asset('site/assets/skin2/img/shps/bullets/1.svg') }}" class="shape shape-xxl icon-xxl" alt="">
                                <div class="rounded-circle bg-3 shadow-3 p-3 d-flex align-items-center justify-content-center shadow icon-xl center-xy">
                                    <img src="{{ asset('site/assets/skin2/img/textwik-marketers.png') }}" class="img-responsive" alt="">
                                </div>
                            </div>
                            <h4 class="color-5 bold mt-3">Owners</h4>
                            <p class="mt-4">Our solution helps business owners monitoring members organization, workflow of projects and business processes.</p>
                        </div>
                        <div class="col-12 col-md-4 py-4 px-5 d-flex flex-column b-r">
                            <div class="icon-shape mb-4">
                                <img src="{{ asset('site/assets/skin2/img/shps/bullets/2.svg') }}" class="shape shape-xxl icon-xxl" alt="">
                                <div class="rounded-circle gradient gradient-34 shadow-4 p-3 d-flex align-items-center justify-content-center shadow icon-xl center-xy">
                                    <img src="{{ asset('site/assets/skin2/img/textwik-coders.png') }}" class="img-responsive" alt="">
                                </div>
                            </div>
                            <h4 class="color-5 bold mt-3">Managers </h4>
                            <p class="mt-4">Project management shouldn’t be a pain for managers, Our solution gives more control of projects workflow, Ensure a more efficient way for managing teams, prioritizing tasks and monitor team members.</p>
                        </div>
                        <div class="col-12 col-md-4 py-4 px-5 d-flex flex-column">
                            <div class="icon-shape mb-4">
                                <img src="{{ asset('site/assets/skin2/img/shps/bullets/3.svg') }}" class="shape shape-xxl icon-xxl" alt="">
                                <div class="rounded-circle bg-4 shadow-4 p-3 d-flex align-items-center justify-content-center shadow icon-xl center-xy">
                                    <img src="{{ asset('site/assets/skin2/img/textwik-operators.png') }}" class="img-responsive" alt="">
                                </div>
                            </div>
                            <h4 class="color-5 bold mt-3">Employees </h4>
                            <p class="mt-4">Ensure collaboration and communications between team members, Make work more enjoyable.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Features -->
        <section class="section">
            <div class="shape-wrapper">
                <div  class="shape shape-background shape-right"></div>
                <div class="shape shape-background top shape-left bg-4 op-1"></div>
            </div>
            <div class="container pb-9">
                <div class="row gap-y align-items-center py-5">
                    <div class="col-md-6">
                        <figure data-aos="fade-right">
                            <img src="{{ asset('site/assets/skin2/img/home/SMS_MMS.png') }}" class="img-responsive w50" alt="">
                        </figure>
                    </div>
                    <div class="col-md-6">
                        <div class="icon-xxl mb-4">
                            <div class="icon-shape">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 219.98 213.35" class="shape shape-xxl drop-shadow">
                                    <defs>
                                        <style>
                                            .cls-shape {
                                                fill: #59ecaf;
                                            }
                                        </style>
                                    </defs>
                                    <title>shape-4</title>
                                    <g id="layer_1" data-name="layer_1">
                                        <g id="OBJECTS">
                                            <path class="cls-shape" d="M92.2.36c58.51-4,85.65,25.71,100.68,65.52s37.29,53.51,21.92,99.33-70.9,51.88-92.59,46.52S78,192.49,51,182.07C10.79,166.56.86,146.16.06,126.06-1.07,97.63,13.92,94.45,18.73,63.28,24.51,25.93,46.43,3.47,92.2.36Z" />
                                        </g>
                                    </g>
                                </svg>
                                <img src="{{ asset('site/assets/skin2/img/textwik-sms.png') }}" class="icon  fa-2x fa-user center-xy color-1">
                            </div>
                        </div>
                        <h2 class="bold text-capitalize"> Engage Your Audience </h2>
                        <p class="regular">Send targeted Promotional and Transactional end-to-end encrypted SMS messages. Supported Sender ID, automatic character encoding, picture transcoding and long message concatenation characters or less.</p>
                        <a href="#" class="btn gradient gradient-43 color-1 btn-rounded btn-outline-1 bw-2 bold mt-4">All The Features</a>
                        <a href="#" class="btn gradient gradient-43 color-1 btn-rounded btn-outline-1 bw-2 bold mt-4">Sign Up Free</a>
                    </div>
                </div>
                <div class="row gap-y align-items-center py-5">
                    <div class="col-md-6 order-md-2">
                        <figure data-aos="fade-left">
                            <img src="{{ asset('site/assets/skin2/img/voice1.png') }}" class="img-responsive" alt="">
                        </figure>
                    </div>
                    <div class="col-md-6">
                        <div class="icon-xxl mb-4">
                            <div class="icon-shape">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 219.98 213.35" class="shape shape-xxl drop-shadow">
                                    <defs>
                                        <style>
                                            .cls-shape {
                                                fill: #59ecaf;
                                            }

                                        </style>
                                    </defs>
                                    <title>shape-4</title>
                                    <g id="layer_1" data-name="layer_1">
                                        <g id="OBJECTS">
                                            <path class="cls-shape" d="M92.2.36c58.51-4,85.65,25.71,100.68,65.52s37.29,53.51,21.92,99.33-70.9,51.88-92.59,46.52S78,192.49,51,182.07C10.79,166.56.86,146.16.06,126.06-1.07,97.63,13.92,94.45,18.73,63.28,24.51,25.93,46.43,3.47,92.2.36Z" />
                                        </g>
                                    </g>
                                </svg>
                                <img src="{{ asset('site/assets/skin2/img/textwik-voice.png') }}" class="icon  fa-2x fa-user center-xy color-1">
                            </div>
                        </div>
                        <h2 class="bold text-capitalize">Voice Messaging  </h2>
                        <p class="regular">Instantly send interactive voice message that was prerecorded or converted from a text and manage the entire process right from the platform. Send alerts, notifications, reminders, and interactive polls or surveys.</p>
                        <a href="#" class="btn gradient gradient-43 color-1 btn-rounded btn-outline-1 bw-2 bold mt-4">Learn More</a>
                    </div>
                </div>
                <div class="row gap-y align-items-center py-5">
                    <div class="col-md-6">
                        <figure data-aos="fade-right">
                            <img src="{{ asset('site/assets/skin2/img/home/mobile_web_push.png') }}" class="img-responsive" alt="">
                        </figure>
                    </div>
                    <div class="col-md-6">
                        <div class="icon-xxl mb-4">
                            <div class="icon-shape">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 219.98 213.35" class="shape shape-xxl drop-shadow">
                                    <defs>
                                        <style>
                                            .cls-shape {
                                                fill: #59ecaf;
                                            }

                                        </style>
                                    </defs>
                                    <title>shape-4</title>
                                    <g id="layer_1" data-name="layer_1">
                                        <g id="OBJECTS">
                                            <path class="cls-shape" d="M92.2.36c58.51-4,85.65,25.71,100.68,65.52s37.29,53.51,21.92,99.33-70.9,51.88-92.59,46.52S78,192.49,51,182.07C10.79,166.56.86,146.16.06,126.06-1.07,97.63,13.92,94.45,18.73,63.28,24.51,25.93,46.43,3.47,92.2.36Z" />
                                        </g>
                                    </g>
                                </svg>
                                <img src="{{ asset('site/assets/skin2/img/textwik-push.png') }}" class="icon  fa-2x fa-user center-xy color-1">
                            </div>
                        </div>
                        <h2 class="bold text-capitalize">Push Notification</h2>
                        <p class="regular">Notify your users with Web Push, Mobile Push Notifications <br>and In-App Messaging as part of your mobile marketing strategy. Build, test, and deliver targeted push notifications based on real-time user behaviors.</p>
                        <a href="#" class="btn gradient gradient-43 color-1 btn-rounded btn-outline-1 bw-2 bold mt-4">Learn More</a>
                    </div>
                </div>


                <div class="row gap-y align-items-center py-5">
                    <div class="col-md-6 order-md-2">
                        <figure data-aos="fade-left">
                            <img src="{{ asset('site/assets/skin2/img/home/rcs.png') }}" class="img-responsive" alt="">
                        </figure>
                    </div>
                    <div class="col-md-6">
                        <div class="icon-xxl mb-4">
                            <div class="icon-shape">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 219.98 213.35" class="shape shape-xxl drop-shadow">
                                    <defs>
                                        <style>
                                            .cls-shape {
                                                fill: #59ecaf;
                                            }

                                        </style>
                                    </defs>
                                    <title>shape-4</title>
                                    <g id="layer_1" data-name="layer_1">
                                        <g id="OBJECTS">
                                            <path class="cls-shape" d="M92.2.36c58.51-4,85.65,25.71,100.68,65.52s37.29,53.51,21.92,99.33-70.9,51.88-92.59,46.52S78,192.49,51,182.07C10.79,166.56.86,146.16.06,126.06-1.07,97.63,13.92,94.45,18.73,63.28,24.51,25.93,46.43,3.47,92.2.36Z" />
                                        </g>
                                    </g>
                                </svg>
                                <img src="{{ asset('site/assets/skin2/img/textwik-rcs.png') }}" class="icon  fa-2x fa-user center-xy color-1">
                            </div>
                        </div>
                        <h2 class="bold text-capitalize">Google RCS business messaging </h2>
                        <p class="regular">Tap into an upgraded SMS experience that includes branding, rich media, interactivity and analytics. With Google RCS, businesses can bring branded, interactive mobile experiences to the native messaging app on billions of Android devices.</p>
                        <a href="#" class="btn gradient gradient-43 color-1 btn-rounded btn-outline-1 bw-2 bold mt-4">Learn More</a>
                    </div>
                </div>

                <div class="row gap-y align-items-center py-5">
                    <div class="col-md-6">
                        <figure data-aos="fade-right">
                            <img src="{{ asset('site/assets/skin2/img/home/SMS_survey.png') }}" class="img-responsive" alt="">
                        </figure>
                    </div>
                    <div class="col-md-6">
                        <div class="icon-xxl mb-4">
                            <div class="icon-shape">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 219.98 213.35" class="shape shape-xxl drop-shadow">
                                    <defs>
                                        <style>
                                            .cls-shape {
                                                fill: #59ecaf;
                                            }

                                        </style>
                                    </defs>
                                    <title>shape-4</title>
                                    <g id="layer_1" data-name="layer_1">
                                        <g id="OBJECTS">
                                            <path class="cls-shape" d="M92.2.36c58.51-4,85.65,25.71,100.68,65.52s37.29,53.51,21.92,99.33-70.9,51.88-92.59,46.52S78,192.49,51,182.07C10.79,166.56.86,146.16.06,126.06-1.07,97.63,13.92,94.45,18.73,63.28,24.51,25.93,46.43,3.47,92.2.36Z" />
                                        </g>
                                    </g>
                                </svg>
                                <img src="{{ asset('site/assets/skin2/img/textwik-survey.png') }}" class="icon  fa-2x fa-user center-xy color-1">
                            </div>
                        </div>
                        <h2 class="bold text-capitalize">SMS Survey </h2>
                        <p class="regular">Send quick questionnaires and polls by SMS and reach your target audience on their mobile devices and receive customer feedback instantly. Using our 2 -way communication to achieve increased response rates and improved customer engagement.</p>
                        <a href="#" class="btn gradient gradient-43 color-1 btn-rounded btn-outline-1 bw-2 bold mt-4">Learn More</a>
                    </div>
                </div>


            </div>
        </section>


        <section style="margin-top: -10%;" class="section">
            <div class="shape-wrapper">
                <div style="left: 92%;" class="shape shape-background shape-right"></div>
                <div class="shape shape-background top shape-left bg-4 op-1"></div>
            </div>

            <div class="container pb-9">
                <div class="section-heading text-center">
                    <i class="pe pe-7s-box2 accent pe-3x"></i>
                    <h2>Developers Portal</h2>
                    <p class="lead color-2">We believe that a happy developer is an empowered developer. Discover our API ecosystem, we built a developer portal that is 100% dedicated to you.</p>
                </div>
                <div class="row" data-aos="zoom-in">
                    <div class="col-md-4 col-lg-3 ml-lg-auto order-md-2">
                        <nav id="sw-nav-developers" class="nav flex-md-column justify-content-between justify-content-md-start nav-pills nav-pills-light nav-fill">
                            <a class="nav-item nav-link bold text-md-left active" href="#" data-step="1">
                                <i class="icon fas fa-user-plus"></i> Add Contact</a>
                            <a class="nav-item nav-link bold text-md-left" href="#" data-step="2">
                                <i class="icon fas fa-id-badge"></i> Get Contact</a>
                            <a class="nav-item nav-link bold text-md-left" href="#" data-step="3">
                                <i class="icon fas fa-calendar-alt"></i> Appointment</a>
                            <a class="nav-item nav-link bold text-md-left" href="#" data-step="4">
                                <i class="icon fas fa-paper-plane"></i> Send Bulk SMS</a>
                        </nav>
                        <hr class="mt-5">
                        <a href="#" class="nav-link accent">Full resources reference
                            <i class="icon fas fa-long-arrow-alt-right"></i>
                        </a>
                    </div>
                    <div class="col-md-8">
                        <div class="swiper-container mt-4 mt-md-0" data-sw-navigation="#sw-nav-developers">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <pre class="prettyprint lang-php linenums">
PHP Code Sample (cURL):
$url = 'https://textwik.com/apis/addcontact/';
$fields = array('apikey' => $api_key,
    'group' => $group_name,
    'number' => $number,
    'name' => $name,
    'email' => $email,
    'bday' => $bday,
);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
$result = curl_exec($ch);
return $result;
                                    </pre>
                                </div>
                                <div class="swiper-slide">
                                    <pre class="prettyprint lang-php linenums">
PHP Code Sample (cURL):

$url = 'https://textwik.com/apis/getcontacts/';
$fields = array('apikey' => $api_key,
    'name' => $name,
);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
$result = curl_exec($ch);
return $result;
                                     </pre>
                                </div>
                                <div class="swiper-slide">
                                    <pre class="prettyprint lang-php linenums">
$url = 'https://www.textwik.com/apis/addappointment/';
$fields = array('apikey' => $api_key,
    'number' => $number,
    'apptdate' => $apptdate,
    'status' => $status,
);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
$result = curl_exec($ch);
return $result;
                                        };
                                    </pre>
                                </div>
                                <div class="swiper-slide">
                                    <pre class="prettyprint lang-js linenums">
$url = 'https://www.textwik.com/apis/smsgroup/';
$fields = array('apikey' => $api_key,
    'from' => $from,
    'to' => $to,
    'message' => $message,
    'rotate' => $rotate,
);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
$result = curl_exec($ch);
return $result;
                                    </pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section singl-testimonial">
           <div class="container pt-8 bring-to-front">
              <div class="swiper-container pb-0 pb-lg-8 swiper-container-initialized swiper-container-horizontal" data-sw-nav-arrows=".reviews-nav">
                 <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(-1230px, 0px, 0px);">
                    <div class="swiper-slide swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="6" style="width: 1230px;">
                       <div class="row gap-y align-items-center">
                          <div class="col-lg-6">
                             <figure class="testimonial-img ml-md-auto"><img src="{{asset('site/assets/skin2/img/v6/reviews/7.jpg')}}" class="img-responsive rounded shadow-lg" alt="..."></figure>
                          </div>
                          <div class="col-lg-6 ml-md-auto">
                             <div class="user-review text-center italic bg-primary text-contrast rounded shadow-lg py-5 px-4 px-lg-6">
                                <blockquote class="regular py-4"><i class="quote fas fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet aspernatur, autem deserunt distinctio dolores eius, exercitationem facilis inventore.</blockquote>
                                <div class="author mt-4">
                                   <p class="small"><span class="bold text-contrast">Daniel Hamilton,</span> Web Developer</p>
                                   <img src="{{asset('site/assets/skin2/img/v6/reviews/signature.svg')}}" class="img-responsive signature mx-auto" alt="...">
                                </div>
                                <div class="shape-wrapper aos-init" data-aos="fade-up">
                                   <svg class="svg-review-bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                                      <path d="M95,0 Q90,90 0,100 L100,100 100,0 Z" fill="#59ecaf"></path>
                                   </svg>
                                   <svg class="svg-review-bottom back" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                                      <path d="M95,0 Q90,90 0,100 L100,100 100,0 Z" fill="#59ecaf"></path>
                                   </svg>
                                   <svg class="svg-review-bottom back left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                                      <path d="M95,0 Q90,90 0,100 L100,100 100,0 Z" fill="#59ecaf"></path>
                                   </svg>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" style="width: 1230px;">
                       <div class="row gap-y align-items-center">
                          <div class="col-lg-6">
                             <figure class="testimonial-img ml-md-auto"><img src="{{asset('site/assets/skin2/img/v6/reviews/1.jpg')}}" class="img-responsive rounded shadow-lg" alt="..."></figure>
                          </div>
                          <div class="col-lg-6 ml-md-auto">
                             <div class="user-review text-center italic bg-primary text-contrast rounded shadow-lg py-5 px-4 px-lg-6">
                                <blockquote class="regular py-4"><i class="quote fas fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet aspernatur, autem deserunt distinctio dolores eius, exercitationem facilis inventore.</blockquote>
                                <div class="author mt-4">
                                   <p class="small"><span class="bold text-contrast">Jane Doe,</span> Web Developer</p>
                                   <img src="{{asset('site/assets/skin2/img/v6/reviews/signature.svg')}}" class="img-responsive signature mx-auto" alt="...">
                                </div>
                                <div class="shape-wrapper aos-init" data-aos="fade-up">
                                   <svg class="svg-review-bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                                      <path d="M95,0 Q90,90 0,100 L100,100 100,0 Z" fill="#35dc8c"></path>
                                   </svg>
                                   <svg class="svg-review-bottom back" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                                      <path d="M95,0 Q90,90 0,100 L100,100 100,0 Z" fill="#7cf5fb"></path>
                                   </svg>
                                   <svg class="svg-review-bottom back left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                                      <path d="M95,0 Q90,90 0,100 L100,100 100,0 Z" fill="#A45AFF"></path>
                                   </svg>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="1" style="width: 1230px;">
                       <div class="row gap-y align-items-center">
                          <div class="col-lg-6">
                             <figure class="testimonial-img ml-md-auto"><img src="{{asset('site/assets/skin2/img/v6/reviews/2.jpg')}}" class="img-responsive rounded shadow-lg" alt="..."></figure>
                          </div>
                          <div class="col-lg-6 ml-md-auto">
                             <div class="user-review text-center italic bg-primary text-contrast rounded shadow-lg py-5 px-4 px-lg-6">
                                <blockquote class="regular py-4"><i class="quote fas fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet aspernatur, autem deserunt distinctio dolores eius, exercitationem facilis inventore.</blockquote>
                                <div class="author mt-4">
                                   <p class="small"><span class="bold text-contrast">Lorem Team,</span> Web Developer</p>
                                   <img src="{{asset('site/assets/skin2/img/v6/reviews/signature.svg')}}" class="img-responsive signature mx-auto" alt="...">
                                </div>
                                <div class="shape-wrapper aos-init" data-aos="fade-up">
                                   <svg class="svg-review-bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                                      <path d="M95,0 Q90,90 0,100 L100,100 100,0 Z" fill="#35dc8c"></path>
                                   </svg>
                                   <svg class="svg-review-bottom back" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                                      <path d="M95,0 Q90,90 0,100 L100,100 100,0 Z" fill="#7cf5fb"></path>
                                   </svg>
                                   <svg class="svg-review-bottom back left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                                      <path d="M95,0 Q90,90 0,100 L100,100 100,0 Z" fill="#A45AFF"></path>
                                   </svg>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="swiper-slide" data-swiper-slide-index="2" style="width: 1230px;">
                       <div class="row gap-y align-items-center">
                          <div class="col-lg-6">
                             <figure class="testimonial-img ml-md-auto"><img src="{{asset('site/assets/skin2/img/v6/reviews/3.jpg')}}" class="img-responsive rounded shadow-lg" alt="..."></figure>
                          </div>
                          <div class="col-lg-6 ml-md-auto">
                             <div class="user-review text-center italic bg-primary text-contrast rounded shadow-lg py-5 px-4 px-lg-6">
                                <blockquote class="regular py-4"><i class="quote fas fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet aspernatur, autem deserunt distinctio dolores eius, exercitationem facilis inventore.</blockquote>
                                <div class="author mt-4">
                                   <p class="small"><span class="bold text-contrast">Ipsum Team,</span> Web Developer</p>
                                   <img src="{{asset('site/assets/skin2/img/v6/reviews/signature.svg')}}" class="img-responsive signature mx-auto" alt="...">
                                </div>
                                <div class="shape-wrapper aos-init" data-aos="fade-up">
                                   <svg class="svg-review-bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                                      <path d="M95,0 Q90,90 0,100 L100,100 100,0 Z" fill="#35dc8c"></path>
                                   </svg>
                                   <svg class="svg-review-bottom back" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                                      <path d="M95,0 Q90,90 0,100 L100,100 100,0 Z" fill="#7cf5fb"></path>
                                   </svg>
                                   <svg class="svg-review-bottom back left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                                      <path d="M95,0 Q90,90 0,100 L100,100 100,0 Z" fill="#A45AFF"></path>
                                   </svg>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="swiper-slide" data-swiper-slide-index="3" style="width: 1230px;">
                       <div class="row gap-y align-items-center">
                          <div class="col-lg-6">
                             <figure class="testimonial-img ml-md-auto"><img src="{{asset('site/assets/skin2/img/v6/reviews/4.jpg')}}" class="img-responsive rounded shadow-lg" alt="..."></figure>
                          </div>
                          <div class="col-lg-6 ml-md-auto">
                             <div class="user-review text-center italic bg-primary text-contrast rounded shadow-lg py-5 px-4 px-lg-6">
                                <blockquote class="regular py-4"><i class="quote fas fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet aspernatur, autem deserunt distinctio dolores eius, exercitationem facilis inventore.</blockquote>
                                <div class="author mt-4">
                                   <p class="small"><span class="bold text-contrast">Priscilla Campbell,</span> Web Developer</p>
                                   <img src="{{asset('site/assets/skin2/img/v6/reviews/signature.svg')}}" class="img-responsive signature mx-auto" alt="...">
                                </div>
                                <div class="shape-wrapper aos-init" data-aos="fade-up">
                                   <svg class="svg-review-bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                                      <path d="M95,0 Q90,90 0,100 L100,100 100,0 Z" fill="#35dc8c"></path>
                                   </svg>
                                   <svg class="svg-review-bottom back" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                                      <path d="M95,0 Q90,90 0,100 L100,100 100,0 Z" fill="#7cf5fb"></path>
                                   </svg>
                                   <svg class="svg-review-bottom back left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                                      <path d="M95,0 Q90,90 0,100 L100,100 100,0 Z" fill="#A45AFF"></path>
                                   </svg>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="swiper-slide" data-swiper-slide-index="4" style="width: 1230px;">
                       <div class="row gap-y align-items-center">
                          <div class="col-lg-6">
                             <figure class="testimonial-img ml-md-auto"><img src="{{asset('site/assets/skin2/img/v6/reviews/5.jpg')}}" class="img-responsive rounded shadow-lg" alt="..."></figure>
                          </div>
                          <div class="col-lg-6 ml-md-auto">
                             <div class="user-review text-center italic bg-primary text-contrast rounded shadow-lg py-5 px-4 px-lg-6">
                                <blockquote class="regular py-4"><i class="quote fas fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet aspernatur, autem deserunt distinctio dolores eius, exercitationem facilis inventore.</blockquote>
                                <div class="author mt-4">
                                   <p class="small"><span class="bold text-contrast">Edith Fisher,</span> Web Developer</p>
                                   <img src="{{asset('site/assets/skin2/img/v6/reviews/signature.svg')}}" class="img-responsive signature mx-auto" alt="...">
                                </div>
                                <div class="shape-wrapper aos-init" data-aos="fade-up">
                                   <svg class="svg-review-bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                                      <path d="M95,0 Q90,90 0,100 L100,100 100,0 Z" fill="#35dc8c"></path>
                                   </svg>
                                   <svg class="svg-review-bottom back" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                                      <path d="M95,0 Q90,90 0,100 L100,100 100,0 Z" fill="#7cf5fb"></path>
                                   </svg>
                                   <svg class="svg-review-bottom back left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                                      <path d="M95,0 Q90,90 0,100 L100,100 100,0 Z" fill="#A45AFF"></path>
                                   </svg>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="swiper-slide" data-swiper-slide-index="5" style="width: 1230px;">
                       <div class="row gap-y align-items-center">
                          <div class="col-lg-6">
                             <figure class="testimonial-img ml-md-auto"><img src="{{asset('site/assets/skin2/img/v6/reviews/6.jpg')}}" class="img-responsive rounded shadow-lg" alt="..."></figure>
                          </div>
                          <div class="col-lg-6 ml-md-auto">
                             <div class="user-review text-center italic bg-primary text-contrast rounded shadow-lg py-5 px-4 px-lg-6">
                                <blockquote class="regular py-4"><i class="quote fas fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet aspernatur, autem deserunt distinctio dolores eius, exercitationem facilis inventore.</blockquote>
                                <div class="author mt-4">
                                   <p class="small"><span class="bold text-contrast">Kenneth Reyes,</span> Web Developer</p>
                                   <img src="{{asset('site/assets/skin2/img/v6/reviews/signature.svg')}}" class="img-responsive signature mx-auto" alt="...">
                                </div>
                                <div class="shape-wrapper aos-init" data-aos="fade-up">
                                   <svg class="svg-review-bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                                      <path d="M95,0 Q90,90 0,100 L100,100 100,0 Z" fill="#35dc8c"></path>
                                   </svg>
                                   <svg class="svg-review-bottom back" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                                      <path d="M95,0 Q90,90 0,100 L100,100 100,0 Z" fill="#7cf5fb"></path>
                                   </svg>
                                   <svg class="svg-review-bottom back left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                                      <path d="M95,0 Q90,90 0,100 L100,100 100,0 Z" fill="#A45AFF"></path>
                                   </svg>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="swiper-slide swiper-slide-duplicate-prev" data-swiper-slide-index="6" style="width: 1230px;">
                       <div class="row gap-y align-items-center">
                          <div class="col-lg-6">
                             <figure class="testimonial-img ml-md-auto"><img src="{{asset('site/assets/skin2/img/v6/reviews/7.jpg')}}" class="img-responsive rounded shadow-lg" alt="..."></figure>
                          </div>
                          <div class="col-lg-6 ml-md-auto">
                             <div class="user-review text-center italic bg-primary text-contrast rounded shadow-lg py-5 px-4 px-lg-6">
                                <blockquote class="regular py-4"><i class="quote fas fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet aspernatur, autem deserunt distinctio dolores eius, exercitationem facilis inventore.</blockquote>
                                <div class="author mt-4">
                                   <p class="small"><span class="bold text-contrast">Daniel Hamilton,</span> Web Developer</p>
                                   <img src="{{asset('site/assets/skin2/img/v6/reviews/signature.svg')}}" class="img-responsive signature mx-auto" alt="...">
                                </div>
                                <div class="shape-wrapper aos-init" data-aos="fade-up">
                                   <svg class="svg-review-bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                                      <path d="M95,0 Q90,90 0,100 L100,100 100,0 Z" fill="#35dc8c"></path>
                                   </svg>
                                   <svg class="svg-review-bottom back" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                                      <path d="M95,0 Q90,90 0,100 L100,100 100,0 Z" fill="#7cf5fb"></path>
                                   </svg>
                                   <svg class="svg-review-bottom back left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                                      <path d="M95,0 Q90,90 0,100 L100,100 100,0 Z" fill="#A45AFF"></path>
                                   </svg>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="0" style="width: 1230px;">
                       <div class="row gap-y align-items-center">
                          <div class="col-lg-6">
                             <figure class="testimonial-img ml-md-auto"><img src="{{asset('site/assets/skin2/img/v6/reviews/1.jpg')}}" class="img-responsive rounded shadow-lg" alt="..."></figure>
                          </div>
                          <div class="col-lg-6 ml-md-auto">
                             <div class="user-review text-center italic bg-primary text-contrast rounded shadow-lg py-5 px-4 px-lg-6">
                                <blockquote class="regular py-4"><i class="quote fas fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet aspernatur, autem deserunt distinctio dolores eius, exercitationem facilis inventore.</blockquote>
                                <div class="author mt-4">
                                   <p class="small"><span class="bold text-contrast">Jane Doe,</span> Web Developer</p>
                                   <img src="{{asset('site/assets/skin2/img/v6/reviews/signature.svg')}}" class="img-responsive signature mx-auto" alt="...">
                                </div>
                                <div class="shape-wrapper aos-init" data-aos="fade-up">
                                   <svg class="svg-review-bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                                      <path d="M95,0 Q90,90 0,100 L100,100 100,0 Z" fill="#35dc8c"></path>
                                   </svg>
                                   <svg class="svg-review-bottom back" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                                      <path d="M95,0 Q90,90 0,100 L100,100 100,0 Z" fill="#7cf5fb"></path>
                                   </svg>
                                   <svg class="svg-review-bottom back left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                                      <path d="M95,0 Q90,90 0,100 L100,100 100,0 Z" fill="#A45AFF"></path>
                                   </svg>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
                 <!-- Add Arrows -->
                 <div class="reviews-navigation">
                    <div class="reviews-nav reviews-nav-prev btn btn-light btn-rounded shadow-box shadow-hover" tabindex="0" role="button" aria-label="Previous slide">
                       <!-- <span class="text-uppercase small">Next</span> --> <i class="reviews-nav-icon fas fa-long-arrow-alt-left"></i>
                    </div>
                    <div class="reviews-nav reviews-nav-next btn btn-light btn-rounded shadow-box shadow-hover" tabindex="0" role="button" aria-label="Next slide">
                       <!-- <span class="text-uppercase small">Next</span> --> <i class="reviews-nav-icon fas fa-long-arrow-alt-right"></i>
                    </div>
                 </div>
                 <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
              </div>
           </div>
        </section>

        <section class="section overflow-hidden" style="">
            <div class="container pt-4 bring-to-front">
                <div class="">
                    <div class="section-heading text-center">
                    <h2>Integration</h2>
                    <p style="    font-size: medium;" class="color-2 lead">We play nice with others through our most popular RESTful API that uses simple query parameters via SMPP, HTTP etcetera.</p>
                </div>
                <ul class="list-unstyled d-flex flex-wrap justify-content-around">
                    <li data-aos-delay="0" style="background-image: url({{ asset('site/assets/skin2/img/integration/wordpress.png') }});" class="shadow-box bg-6 rounded-circle icon-xxl image-background contain mt-6 aos-init aos-animate"></li>
                    <li data-aos-easing="ease-in-out-cubic" data-aos="fade-down-right" data-aos-delay="100" class="shadow-box bg-6 rounded-circle icon-xxl image-background contain mt-4 aos-init" style="background-image: url({{ asset('site/assets/skin2/img/integration/shopify.png') }})"></li>
                    <li data-aos-easing="ease-in-out-cubic" data-aos="fade-up-right" data-aos-delay="200" class="shadow-box bg-6 rounded-circle icon-xxl image-background contain mt-5 aos-init" style="background-image: url({{ asset('site/assets/skin2/img/integration/magento.png') }})"></li>
                    <li data-aos-easing="ease-in-out-cubic" data-aos="fade-up" data-aos-delay="300" class="shadow-box bg-6 rounded-circle icon-xxl image-background contain mt-6 aos-init" style="background-image: url({{ asset('site/assets/skin2/img/integration/laravel.png') }})"></li>
                    <li data-aos-easing="ease-in-out-cubic" data-aos="fade-down-left" data-aos-delay="400" class="shadow-box bg-6 rounded-circle icon-xxl image-background contain mt-4 aos-init" style="background-image: url({{ asset('site/assets/skin2/img/integration/woocommerce.png') }})"></li>
                    <li data-aos-easing="ease-in-out-cubic" data-aos="fade-up-left" data-aos-delay="0" class="shadow-box bg-6 rounded-circle icon-xxl image-background contain mt-5 aos-init" style="background-image: url({{ asset('site/assets/skin2/img/integration/codeIgniter.png') }})"></li>
                    <li data-aos-easing="ease-in-out-cubic" data-aos="fade-left" data-aos-delay="100" class="shadow-box bg-6 rounded-circle icon-xxl image-background contain mt-6 aos-init" style="background-image: url({{ asset('site/assets/skin2/img/integration/Cackephp.png') }})"></li>
                </ul>
            </div>
            </div>
        </section>

        <section class="section bg-6 b-b edge top-left" data-aos="flip-left">

            <div class="container bring-to-front">
                <div class="shadow rounded text-center bg-4-gradient color-1 p-5">
                    <h2 style="font-size: x-large;" class="mb-5">Boost Customer Engagement,Conversion & Retention </h2>
                    <p class="handwritten highlight font-md">Why wait? Start now!</p>
                    <a style="    background-color: #34d085; border-color: #34d085;" href="" class="btn btn-5 btn-rounded mt-4">Start now</a>
                </div>
            </div>
        </section>

        <section class="section b-b" data-aos="fade-up">
          <div class="container">
              <div class="row gap-y align-items-center text-center text-lg-left">
                  <div class="col-12 col-md-4 py-4 px-5 b-md-r">
                      <i class="pe pe-7s-headphones pe-3x color-5"></i>
                      <a href="#" class="mt-4 color-5 d-flex align-items-center">
                          <h4 class="mr-3">Contact Sales!</h4><i class="fas fa-long-arrow-alt-right"></i>
                      </a>
                      <p class="mt-4">Curious of our platform? Looking to try TextWik for enterprise deployment? or want a demonstration?
                       <a href="#">Contact Our sales</a>
                      </p>
                  </div>
                  <div class="col-12 col-md-4 py-4 px-5 b-md-r">
                      <i class="pe-7s-attention pe-3x color-5"></i>
                      <a href="#" class="mt-4 color-5 d-flex align-items-center">
                          <h4 class="mr-3">Report Abuse!</h4>
                          <i class="fas fa-long-arrow-alt-right"></i>
                      </a>
                      <p class="mt-4">TextWik is committed to fighting mobile spam. We don’t send SMS messages or phone calls directly to end-users.
                          <a href="#">Abuse Reporting</a>
                      </p>
                  </div>
                  <div class="col-12 col-md-4 py-4 px-5">
                      <i class="pe pe-7s-help1 pe-3x color-5"></i>
                      <a href="#" class="mt-4 color-5 d-flex align-items-center">
                          <h4 class="mr-3">Technical Support!</h4>
                          <i class="fas fa-long-arrow-alt-right"></i>
                      </a>
                      <p class="mt-4"> Already a customer? If you are encountering a technical or payment issue, for technical or billing questions.
                         <a href="#">Contact Support</a>
                      </p>
                  </div>
              </div>
          </div>
        </section>

    </main>
    <!-- ./Footer - Simple -->

    <footer  class="site-footer section text-center" data-aos="fade-up">
        <div class="container pb-4">
            <div class="font-md regular">BE IN THE KNOW</div>
            <p class="color-2 mb-5">By registering with us you will receive right in your inbox all new features and updates</p>
            <div class="row">
                <div class="col-12 col-md-6 mx-auto overflow-hidden">
                    <form action="#" class="form" data-response-message-animation="slide-in-left">
                        <div class="input-group">
                            <input type="email" name="Subscribe[email]" class="form-control rounded-circle-left" placeholder="Enter your email" required>
                            <div class="input-group-append">
                                <button class="btn btn-rounded btn-accent" type="submit">Register</button>
                            </div>
                        </div>
                    </form>
                    <div class="response-message">
                        <i class="fas fa-envelope font-lg"></i>
                        <p class="font-md m-0">Check your email</p>
                        <p class="response">We sent you an email with a link to get started. You’ll be in your account in no time.</p>
                    </div>
                </div>
            </div>
            <hr class="mt-5">
            <nav class="nav social-icons justify-content-center mt-4">
                <a href="#" class="mr-3 font-regular color-2">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="mr-3 font-regular color-2">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="mr-3 font-regular color-2">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="mr-3 font-regular color-2">
                    <i class="fas fa-rss"></i>
                </a>
                <a href="#" class="font-regular color-2">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </nav>
            <p class="small copyright color-2">Textwik Mno</p>
            @yield('content')
        </div>
    </footer>
    <!-- ./Footer - Simple -->
    <footer  class="site-footer section">
        <div class="container py-4">
            <div class="row align-items-center">
                <div class="col-md-5 text-center text-md-left">
                    <nav class="nav justify-content-center justify-content-md-start">
                        <a class="nav-item nav-link" href="{{route('about-us')}}">About</a>
                        <a class="nav-item nav-link" href="#">Services</a>
                        <a class="nav-item nav-link" href="{{route('terms')}}">Policies</a>
                    </nav>
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('site/assets/skin2/img/textwik-footer.png') }}" alt="" class="logo">
                </div>
                <div class="col-md-5 text-center text-md-right">
                    <p class="mt-2 mb-0 color-2 small">© 2019 Textwik, Ltd. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Script Files -->
    <script src="{{ asset('site/assets/skin2/js/01.cookie-consent-util.js') }}"></script>
    <script src="{{ asset('site/assets/skin2/js/02.1.cookie-consent-themes.js') }}"></script>
    <script src="{{ asset('site/assets/skin2/js/02.2.cookie-consent-custom-css.js') }}"></script>
    <script src="{{ asset('site/assets/skin2/js/02.3.cookie-consent-informational.js') }}"></script>
    <script src="{{ asset('site/assets/skin2/js/02.4.cookie-consent-opt-out.js') }}"></script>
    <script src="{{ asset('site/assets/skin2/js/02.5.cookie-consent-opt-in.js') }}"></script>
    <script src="{{ asset('site/assets/skin2/js/02.6.cookie-consent-location.js') }}"></script>

    <script src="{{ asset('site/assets/skin2/js/jquery.js') }}"></script>
    <script src="{{ asset('site/assets/skin2/js/jquery.animatebar.js') }}"></script>
    <script src="{{ asset('site/assets/skin2/js/odometer.min.js') }}"></script>
    <script src="{{ asset('site/assets/skin2/js/simplebar.js') }}"></script>
    <script src="{{ asset('site/assets/skin2/js/swiper.js') }}"></script>
    <script src="{{ asset('site/assets/skin2/js/popper.js') }}"></script>
    <script src="{{ asset('site/assets/skin2/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('site/assets/skin2/js/jquery.validate.js') }}"></script>
    <script src="{{ asset('site/assets/skin2/js/jquery.smartWizard.js') }}"></script>
    <script src="{{ asset('site/assets/skin2/js/bootstrap.js') }}"></script>
    <script src="{{ asset('site/assets/skin2/js/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('site/assets/skin2/js/jquery.counterup.js') }}"></script>
    <script src="{{ asset('site/assets/skin2/js/modernizr-2.8.3.min.js') }}"></script>
    <script src="{{ asset('site/assets/skin2/js/aos.js') }}"></script>
    <script src="{{ asset('site/assets/skin2/js/particles.js') }}"></script>
    <script src="{{ asset('site/assets/skin2/js/typed.js') }}"></script>
    <script src="{{ asset('site/assets/skin2/js/prettify.js') }}"></script>
    <script src="{{ asset('site/assets/skin2/js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('site/assets/skin2/js/cookieconsent.min.js') }}"></script>
    <script src="{{ asset('site/assets/skin2/js/common-script.js') }}"></script>
    <script src="{{ asset('site/assets/skin2/js/forms.js') }}"></script>
    <script src="{{ asset('site/assets/skin2/js/site.js') }}"></script>
    <script src="{{ asset('site/assets/skin2/js/stripe-menu.js') }}"></script>
    <!-- End - Script Files -->

</body>

</html>
