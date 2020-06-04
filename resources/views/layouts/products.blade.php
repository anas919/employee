<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="google-site-verification" content="xVPW9vyRGZ0BSdBJuXzMlXTgQT9ln5DFYR4Tqksv4RQ" />
    <meta name="msvalidate.01" content="6854F3F4CA8991529E255A00C1536FB7" />
    <meta name="author" content="TextWik" />
    
    <link rel="apple-touch-icon" href="{{ asset('site/assets/skin2/img/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('site/assets/skin2/img/favicon.ico') }}">
    

    <title><?php echo __('Textwik.com is the best online sms marketing tool in USA Canada UK and Other countries'); ?></title>
    <meta name="Description" content="Welcome to Textwik.com top bulk sms, sms marketing, mms marketing service for business across the Globe. We provide best online sms marketing tools to stay ahead of your marketing goals.">
    <meta name="Keywords" content="best online sms marketing tool, bulk sms service, text message marketing, sms marketing, business sms, mms marketing, online sms service">

    
    
    <!-- Place favicon.ico in the root directory -->
    
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Poppins:100,300,400,700,900') }}" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet"> -->
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Caveat') }}" rel="stylesheet">

    <!-- themeforest:css -->
    <link rel="stylesheet" href="{{ asset('site/assets/skin2/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/skin2/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/skin2/css/cookieconsent.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/skin2/fonts/fontawesome/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/skin2/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/skin/icon_fonts_assets/themefy/themify-icons.css') }}" rel="stylesheet">

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
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js') }}"></script>
    
</head>

<body style="min-width: 440px;">

    <!-- Making stripe menu -->
    <nav class="st-nav navbar main-nav navigation fixed-top">
        <div class="container">
            <ul class="st-nav-menu nav navbar-nav">
                <li class="st-nav-section nav-item">
                    <a href="" class="navbar-brand">
                        <img src="{{ asset('site/assets/skin2/img/textwik-logo.png') }}" alt="Textwik" class="logo logo-sticky d-block d-md-none">
                        <img src="{{ asset('site/assets/skin2/img/textwik-logo-white.png') }}" alt="Textwik" class="logo d-none d-md-block">
                    </a>
                </li>

                <li class="st-nav-section st-nav-primary nav-item" style="margin-left: 14%;">
                    <a class="st-root-link nav-link" href="">Home </a>
                    <a class="st-root-link item-company st-has-dropdown nav-link" data-dropdown="aboutus">About Us </a>
                    <a class="st-root-link item-company st-has-dropdown nav-link" data-dropdown="products">Products</a>
                    <a class="st-root-link item-company st-has-dropdown nav-link" data-dropdown="developers">Developers</a>   
                    <a class="st-root-link nav-link" href="{{ asset('site/pages/pricing') }}">Pricing </a> 
                </li>

                <li class="st-nav-section st-nav-secondary nav-item">
                    <a class="btn btn-rounded btn-outline mr-3 px-3" href="{{ asset('site/users/login') }}" >
                        <i class="fas fa-sign-in-alt d-none d-md-inline mr-md-0 mr-lg-2"></i>
                        <span class="d-md-none d-lg-inline">Login</span>
                    </a>
                    <a class="btn btn-rounded btn-solid px-3" href="{{ asset('site/users/add') }}" >
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
                                <a class="regular text-primary" href="http://beta.textwik.com">
                                        <i class="fas fa-home icon"></i> Home </a>
                                <a class="regular text-info" href="http://beta.textwik.com/company/about">
                                    <i class="far fa-building icon"></i> About </a>
                                <a class="regular text-success" href="http://beta.textwik.com/company/contact">
                                    <i class="far fa-envelope icon"></i> Contact </a>
                                <a class="regular text-warning" href="http://beta.textwik.com/pages/pricing">
                                    <i class="fas fa-hand-holding-usd icon"></i> Pricing </a>
                                <a class="regular text-info" href="http://beta.textwik.com/company/faqs">
                                    <i class="far fa-question-circle icon"></i> FAQs</a>
                            </div>
                            <div style=" margin-left:  5%; margin-right: -22%;" class="st-dropdown-content-group b-t bw-2">
                                <h4  style="    margin-left: 3%;"class="text-uppercase regular">Products</h4>
                                <div class="row">
                                    <div class="col mr-4">
                                        <a class="regular text-primary" href="http://beta.textwik.com/products/messaging">
                                        <i class="fas fa-sms icon "></i> SMS/MMS MESSAGING </a>
                                            <a class="regular text-primary" href="http://beta.textwik.com/products/voice">
                                        <i class="fas fa-microphone icon "></i> VOICE MESSAGING </a>
                                            <a class="regular text-primary"href="http://beta.textwik.com/products/pushnotification">
                                        <i class="fas fa-bell icon  "></i> PUSH NOTIFICATION </a>
                                            <a class="regular text-primary" href="http://beta.textwik.com/products/rcs">
                                        <i class="fas fa-robot icon  "></i> RCS MESSAGING </a>
                                           <a class="regular text-primary" href="http://beta.textwik.com/products/Survey">
                                        <i class="fas fa-clipboard-list icon"></i>TEXTING SURVEY</a>
                                    </div>
                                    <h4  style="margin-top: -6%; margin-right: -20%;" class="text-uppercase regular">Developers</h4>

                                    <div class="col mr-4">
                                        <a class="regular text-primary" href="http://beta.textwik.com/developer/messaging_api">
                                        <i class="fas fa-sms icon "></i> Messaging-Api </a>
                                        <a class="regular text-primary" href="http://beta.textwik.com/developer/Voice-Api">
                                        <i class="fas fa-microphone icon  "></i> Voice-Api </a>
                                        <a class="regular text-primary" href="http://beta.textwik.com/developer/smpp_access">
                                        <i class="fas fa-key icon  "></i> SMPP Access </a>
                                        <a class="regular text-primary" href="http://beta.textwik.com/developer/sdk_tools">
                                        <i class="fas fa-tools icon  "></i> SDK&Tools </a>
                                        <a class="regular text-primary" href="http://beta.textwik.com/developer/tutorials">
                                        <i class="far fa-lightbulb icon  "></i> Tutorials </a>
                                        <a class="regular text-primary" href="http://beta.textwik.com/developer/documentation">
                                        <i class="fas fa-book    icon  "></i> Documentation </a>
                                    </div>
                                </div>
                            </div>
                            
                            <div style="    margin-left: 7%;" class="st-dropdown-content-group bg-6 b-t">
                                <a href="https://beta.textwik.com/users/login">Sign in
                                    <i class="fas fa-arrow-right"></i>
                                </a>

                            </div>
                            <div style="    margin-left: 7%;" class="st-dropdown-content-group bg-6 b-t">
                                <a href="https://beta.textwik.com/users/add">Sign UP
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
                                    <a class="dropdown-item"  href="{{ asset('site/company/about') }}">About Us</a> 
                                    <a class="dropdown-item"  href="{{ asset('site/company/contact') }}">Contact us</a> 
                                    <a class="dropdown-item"  href="{{ asset('site/company/testimonials') }}">Testimonials</a>
                                    <a class="dropdown-item"  href="{{ asset('site/company/faqs') }}">FAQs</a> 
                                    
                                </div>
                                <div class="col mr-4">
                                    <a class="dropdown-item"  href="{{ asset('site/company/investors') }}">Investors</a>
                                    <a class="dropdown-item"  href="{{ asset('site/company/carrers') }}">Careers</a> 
                                </div>
                                
                                <div class="col"> 

                                    <a class="dropdown-item"  href="{{ asset('site/legal/terms_conditions') }}">Terms & Conditions</a>
                                    <a class="dropdown-item"  href="{{ asset('site/legal/privacy_policy') }}">Privacy Policy</a>
                                    <a class="dropdown-item"  href="{{ asset('site/legal/antispam') }}">Anti-Spam Policy </a>
                                    <a class="dropdown-item"  href="{{ asset('site/legal/dmca') }}">DMCA Compliance </a> 
                                    <a class="dropdown-item"  href="{{ asset('site/legal/refund_policy') }}">Refund Policy</a>
                                    <a class="dropdown-item"  href="{{ asset('site/legal/shortcodes') }}">Shortcodes T&Cs</a>
                                </div>
                            
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
                <div class="st-dropdown-section" data-dropdown="developers">
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
                                            <a  href="{{ asset('site/developer/messaging_api') }}">Messaging API</a>
                                        </li>
                                        <li>
                                            <a  href="{{ asset('site/developer/voice') }}">Voice API</a>
                                        </li>
                                        <li>
                                            <a  href="{{ asset('site/developer/smpp_access') }}">SMPP Access</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <ul class="mr-4">
                                        <li>
                                            <h4 class="text-uppercase regular">.</h4>
                                        </li>
                                        <li>
                                            <a  href="{{ asset('site/developer/sdk_tools') }}">SDK &  Tools</a>
                                        </li>
                                        <li>
                                            <a  href="{{ asset('site/developer/tutorials') }}">Tutorials</a>
                                        </li>
                                        <li>
                                            <a  href="{{ asset('site/developer/documentation') }}">Documentation</a>
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
                              <div class="mb-4">
                                <h3 class="color-5 light text-nowrap">
                                    <span class="bold regular">Useful Tools</span> you'll need</h3>
                                <p class="color-2 mt-0">Build modern, high-quality voice applications in the cloud.</p>
                            </div>
                                 <div class="row">
                                <div class="col">
                                    <ul class="mr-4">
                                       
                                        <li>
                                              <a class="dropdown-item"  href="{{ asset('site/products/messaging') }}">
                                <div class="media mb-4">
                                    <i class="fas fa-sms icon fa-2x"></i>
                                    <div class="media-body">
                                        <h3 class="link-title m-0">SMS/MMS MESSAGING</h3>
                                        <p class="m-0 color-2">Send and Receive Highly Targeted Text Messages Globally</p>
                                    </div>
                                </div>
                                                </a>
                                        </li>
                                        <li>
                              <a class="dropdown-item"  href="{{ asset('site/products/voice') }}">
                                <div class="media mb-4">
                                    <i class="fas fa-microphone icon fa-2x"></i>
                                    <div class="media-body">
                                        <h3 class="link-title m-0">VOICE MESSAGING</h3>
                                        <p class="m-0 color-2">Powerful and Easy-to-Use IVR To Create and Send Voice </p>
                                    </div>
                                </div>
                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item"  href="{{ asset('site/products/pushnotification') }}">
                                <div class="media mb-4">
                                    <i class="fas fa-bell icon fa-2x"></i>
                                    <div class="media-body">
                                        <h3 class="link-title m-0">PUSH NOTIFICATION</h3>
                                        <p class="m-0 color-2">Keep Subscribers Engaged & Coming Back on Your Website</p>
                                    </div>
                                </div>
                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <ul style="margin-top: -6;" class="mr-4">
                                       
                                        <li>
                                              
                            <a class="dropdown-item"  href="{{ asset('site/products/rcs') }}">
                                <div class="media mb-4">
                                    <i class="fas fa-robot icon fa-2x"></i>
                                    <div class="media-body">
                                        <h3 class="link-title m-0">RCS MESSAGING</h3>
                                        <p class="m-0 color-2">Combine Rich Text & Images, Trackable Actions and Brand Name</p>
                                    </div>
                                </div>
                            </a>
                                        </li>
                                        <li>
                                       <a class="dropdown-item"  href="{{ asset('site/products/survey') }}">
                                <div class="media mb-4">
                                    <i class="fas fa-clipboard-list icon fa-2x"></i>
                                    <div class="media-body">
                                        <h3 class="link-title m-0">TEXTING SURVEY</h3>
                                        <p class="m-0 color-2">Survey Customers with SMS and Instantly Reach Your Target Audience</p>
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
                                    <a class="dropdown-item"  href="{{ asset('site/products/livechat') }}">Live Chat</a>
                                    <a class="dropdown-item"  href="{{ asset('site/products/phone-numbers') }}">Phone numbers</a>
                                </div>
                                <div class="col mr-4">
                                    <a class="dropdown-item"  href="{{ asset('site/products/appointments') }}">Appointments</a>
                                    <a class="dropdown-item"  href="{{ asset('site/products/autoresponders') }}">Autoresponders</a> 
                                </div>
                                <div class="col mr-4">
                                    <a class="dropdown-item"  href="{{ asset('site/products/app_messaging') }}">In-app Messaging</a>
                                   
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <!-- END Produits -->
            </div>
        </div>
    </nav>

        
        @yield('content')
 
    <footer class="site-footer section text-center" data-aos="fade-up">
        <div class="container pb-4">
            <div class="font-md regular">BE IN THE KNOW</div>
            <p class="color-2 mb-5">By registering with us you will receive right in your inbox all new features and updates</p>
            <div class="row">
                <div class="col-12 col-md-6 mx-auto overflow-hidden">
                    <form action="srv/register.php" class="form" data-response-message-animation="slide-in-left">
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
        </div>
    </footer>
    <!-- ./Footer - Simple -->
    <footer class="site-footer section">
        <div class="container py-4">
            <div class="row align-items-center">
                <div class="col-md-5 text-center text-md-left">
                    <nav class="nav justify-content-center justify-content-md-start">
                        <a class="nav-item nav-link" href="{{ asset('site/company/about') }}">About</a>
                        <a class="nav-item nav-link" href="#">Services</a>
                        <a class="nav-item nav-link" href="{{ asset('site/legal') }}">Privacy</a>
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
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/maps.js"></script>
<script src="https://www.amcharts.com/lib/4/geodata/worldLow.js"></script>
<script src="https://www.amcharts.com/lib/4/geodata/usaLow.js"></script>

    <!-- themeforest:js -->
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
    

    

<!-- Resources -->

<!--Start of Tawk chating .to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ae3a5e25f7cdf4f0533af6e/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    <!-- endinject -->
</body>

</html>

