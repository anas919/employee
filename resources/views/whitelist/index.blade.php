<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>{{ ucfirst(Auth::user()->subdomain) }} - Chat</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="keywords here" name="keywords">
    <meta content="Farih Anas" name="author">
    <meta content="Dashboard of management employees" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{ asset('favicon.ico') }}" rel="shortcut icon">
    <link href="{{ asset('apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link href="{{ asset('fonts/Varela-Round.css') }}" rel="stylesheet">
    <link href="{{ asset('icon_fonts_assets/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
    <script>
        window.auth = {!!auth()->user()!!}
    </script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css?version=4.4.0') }}" rel="stylesheet">
    <link href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
    <style>
        .os-icon-basic-2-259-calendar:before {
            content: "\e926";
            color: #0073ff;
        }
        .floated-chat-w{
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>
<body @if(Auth::user()->pref_theme == 0) class="menu-position-side menu-side-left full-screen" @else class="menu-position-side menu-side-left full-screen color-scheme-dark" @endif>
    <div class="all-wrapper solid-bg-all">
        <div class="search-with-suggestions-w">
            <div class="search-with-suggestions-modal">
                <div class="element-search">
                    <input class="search-suggest-input" placeholder="Start typing to search..." type="text">
                      <div class="close-search-suggestions">
                        <i class="os-icon os-icon-x"></i>
                      </div>
                    </input>
                </div>
                <div class="search-suggestions-group">
                    <div class="ssg-header">
                        <div class="ssg-icon">
                            <div class="os-icon os-icon-box"></div>
                        </div>
                        <div class="ssg-name">
                            Projects
                        </div>
                        <div class="ssg-info">
                            24 Total
                        </div>
                    </div>
                    <div class="ssg-content">
                        <div class="ssg-items ssg-items-boxed">
                            <a class="ssg-item" href="users_profile_big.html">
                                <div class="item-media" style="background-image: url({{ asset('img/company6.png') }})"></div>
                                <div class="item-name">
                                    Integ<span>ration</span> with API
                                </div>
                            </a>
                            <a class="ssg-item" href="users_profile_big.html">
                                <div class="item-media" style="background-image: url({{ asset('img/company7.png') }})"></div>
                                <div class="item-name">
                                    Deve<span>lopm</span>ent Project
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="search-suggestions-group">
                    <div class="ssg-header">
                        <div class="ssg-icon">
                            <div class="os-icon os-icon-users"></div>
                        </div>
                        <div class="ssg-name">
                            Customers
                        </div>
                        <div class="ssg-info">
                            12 Total
                        </div>
                    </div>
                    <div class="ssg-content">
                        <div class="ssg-items ssg-items-list">
                            <a class="ssg-item" href="users_profile_big.html">
                                @if(Auth::user()->media_id)
                                    <img alt="" src="{{ asset('storage/'.Auth::user()->media->reference) }}">
                                @else
                                    <div class="avatar" style="border-radius: 50%;">{{ substr(Auth::user()->first_name, 0, 1).substr(Auth::user()->last_name, 0, 1)}}</div>
                                @endif
                                <div class="item-name">
                                    John Ma<span>yer</span>s
                                </div>
                            </a>
                            <a class="ssg-item" href="users_profile_big.html">
                                <div class="item-media" style="background-image: url({{ asset('img/avatar2.jpg') }})"></div>
                                <div class="item-name">
                                    Th<span>omas</span> Mullier
                                </div>
                            </a>
                            <a class="ssg-item" href="users_profile_big.html">
                                <div class="item-media" style="background-image: url({{ asset('img/avatar3.jpg') }})"></div>
                                <div class="item-name">
                                    Kim C<span>olli</span>ns
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="search-suggestions-group">
                    <div class="ssg-header">
                        <div class="ssg-icon">
                            <div class="os-icon os-icon-folder"></div>
                        </div>
                        <div class="ssg-name">
                            Files
                        </div>
                        <div class="ssg-info">
                            17 Total
                        </div>
                    </div>
                    <div class="ssg-content">
                        <div class="ssg-items ssg-items-blocks">
                            <a class="ssg-item" href="#">
                              <div class="item-icon">
                                <i class="os-icon os-icon-file-text"></i>
                              </div>
                              <div class="item-name">
                                Work<span>Not</span>e.txt
                              </div>
                            </a>
                            <a class="ssg-item" href="#">
                              <div class="item-icon">
                                <i class="os-icon os-icon-film"></i>
                              </div>
                              <div class="item-name">
                                V<span>ideo</span>.avi
                              </div>
                            </a>
                            <a class="ssg-item" href="#">
                              <div class="item-icon">
                                <i class="os-icon os-icon-database"></i>
                              </div>
                              <div class="item-name">
                                User<span>Tabl</span>e.sql
                              </div>
                            </a>
                            <a class="ssg-item" href="#">
                              <div class="item-icon">
                                <i class="os-icon os-icon-image"></i>
                              </div>
                              <div class="item-name">
                                wed<span>din</span>g.jpg
                              </div>
                            </a>
                        </div>
                        <div class="ssg-nothing-found">
                            <div class="icon-w">
                                <i class="os-icon os-icon-eye-off"></i>
                            </div>
                            <span>No files were found. Try changing your query...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="layout-w">
            <!--------------------
            START - Mobile Menu
            -------------------->
            <div class="menu-mobile menu-activated-on-click color-scheme-dark">
                <div class="mm-logo-buttons-w">
                    <a class="mm-logo" href="index.html"><img src="{{ asset('img/logo.png') }}"><span>Org Name</span></a>
                    <div class="mm-buttons">
                        <div class="content-panel-open">
                            <div class="os-icon os-icon-grid-circles"></div>
                        </div>
                        <div class="mobile-menu-trigger">
                            <div class="os-icon os-icon-hamburger-menu-1"></div>
                        </div>
                    </div>
                </div>
                <div class="menu-and-user">
                    <div class="logged-user-w">
                        <div class="avatar-w">
                            @if(Auth::user()->media_id)
                                <img src="{{ asset('storage/'.Auth::user()->media->reference) }}">
                            @else
                                <div class="avatar" style="border-radius: 50%;">{{ substr(Auth::user()->first_name, 0, 1).substr(Auth::user()->last_name, 0, 1)}}</div>
                            @endif
                        </div>
                        <div class="logged-user-info-w">
                            <div class="logged-user-name">
                                Maria Gomez
                            </div>
                            <div class="logged-user-role">
                                Administrator
                            </div>
                        </div>
                    </div>
                    <!--------------------
                    START - Mobile Menu List
                    -------------------->
                    <ul class="main-menu">
                        <li class="">
                            <a href="home.html">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-layout"></div>
                                </div>
                                <span>Home</span>
                            </a>
                        </li>
                        <li class="has-sub-menu">
                            <a href="layouts_menu_top_image.html">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-layers"></div>
                                </div>
                                <span>Menu Styles</span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="layouts_menu_side_full.html">Side Menu Light</a>
                                </li>
                                <li>
                                    <a href="layouts_menu_side_full_dark.html">Side Menu Dark</a>
                                </li>
                                <li>
                                    <a href="layouts_menu_side_transparent.html">Side Menu Transparent <strong class="badge badge-danger">New</strong></a>
                                </li>
                                <li>
                                    <a href="apps_pipeline.html">Side &amp; Top Dark</a>
                                </li>
                                <li>
                                    <a href="apps_projects.html">Side &amp; Top</a>
                                </li>
                                <li>
                                    <a href="layouts_menu_side_mini.html">Mini Side Menu</a>
                                </li>
                                <li>
                                    <a href="layouts_menu_side_mini_dark.html">Mini Menu Dark</a>
                                </li>
                                <li>
                                    <a href="layouts_menu_side_compact.html">Compact Side Menu</a>
                                </li>
                                <li>
                                    <a href="layouts_menu_side_compact_dark.html">Compact Menu Dark</a>
                                </li>
                                <li>
                                    <a href="layouts_menu_right.html">Right Menu</a>
                                </li>
                                <li>
                                    <a href="layouts_menu_top.html">Top Menu Light</a>
                                </li>
                                <li>
                                    <a href="layouts_menu_top_dark.html">Top Menu Dark</a>
                                </li>
                                <li>
                                    <a href="layouts_menu_top_image.html">Top Menu Image <strong class="badge badge-danger">New</strong></a>
                                </li>
                                <li>
                                    <a href="layouts_menu_sub_style_flyout.html">Sub Menu Flyout</a>
                                </li>
                                <li>
                                    <a href="layouts_menu_sub_style_flyout_dark.html">Sub Flyout Dark</a>
                                </li>
                                <li>
                                    <a href="layouts_menu_sub_style_flyout_bright.html">Sub Flyout Bright</a>
                                </li>
                                <li>
                                    <a href="layouts_menu_side_compact_click.html">Menu Inside Click</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub-menu">
                            <a href="apps_bank.html">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-package"></div>
                                </div>
                                <span>Applications</span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="apps_email.html">Email Application</a>
                                </li>
                                <li>
                                    <a href="apps_support_dashboard.html">Support Dashboard</a>
                                </li>
                                <li>
                                    <a href="apps_support_index.html">Tickets Index</a>
                                </li>
                                <li>
                                    <a href="apps_crypto.html">Crypto Dashboard <strong class="badge badge-danger">New</strong></a>
                                </li>
                                <li>
                                    <a href="apps_projects.html">Projects List</a>
                                </li>
                                <li>
                                    <a href="apps_bank.html">Banking <strong class="badge badge-danger">New</strong></a>
                                </li>
                                <li>
                                    <a href="apps_full_chat.html">Chat Application</a>
                                </li>
                                <li>
                                    <a href="apps_todo.html">To Do Application <strong class="badge badge-danger">New</strong></a>
                                </li>
                                <li>
                                    <a href="misc_chat.html">Popup Chat</a>
                                </li>
                                <li>
                                    <a href="apps_pipeline.html">CRM Pipeline</a>
                                </li>
                                <li>
                                    <a href="rentals_index_grid.html">Property Listing <strong class="badge badge-danger">New</strong></a>
                                </li>
                                <li>
                                    <a href="misc_calendar.html">Calendar</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!--------------------
                    END - Mobile Menu List
                    -------------------->
                    <div class="mobile-menu-magic">
                        <h4>
                            Light Admin
                        </h4>
                        <p>
                            Clean Bootstrap 4 Template
                        </p>
                        <div class="btn-w">
                            <a class="btn btn-white btn-rounded" href="#" target="_blank">Purchase Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--------------------
            END - Mobile Menu
            -------------------->
            <!--------------------
            START - Main Menu
            -------------------->
            <div @if(Auth::user()->pref_theme == 0) class="menu-w menu-activated-on-hover menu-has-selected-link selected-menu-color-light color-scheme-light color-style-default sub-menu-color-dark menu-position-side menu-side-left menu-layout-compact sub-menu-style-over" @else  class="menu-w menu-activated-on-hover menu-has-selected-link sub-menu-color-dark menu-position-side menu-side-left menu-layout-compact sub-menu-style-over color-scheme-dark color-style-trent selected-menu-color-bright" @endif>
                <div class="logo-w">
                    <a class="logo" href="{{ route('members',Auth::user()->subdomain) }}">
                        <div class="logo-element"></div>
                        <div class="logo-label">
                            {{ Auth::user()->subdomain }}
                        </div>
                    </a>
                </div>
                <div class="logged-user-w avatar-inline">
                    <div class="logged-user-i">
                        <div class="avatar-w">
                            @if(Auth::user()->media_id)
                                <img alt="" src="{{ asset('storage/'.Auth::user()->media->reference) }}">
                            @else
                                <div class="avatar" style="border-radius: 50%;">{{ substr(Auth::user()->first_name, 0, 1).substr(Auth::user()->last_name, 0, 1)}}</div>
                            @endif
                        </div>
                        <div class="logged-user-info-w">
                            <div class="logged-user-name">
                                Maria Gomez
                            </div>
                            <div class="logged-user-role">
                                Administrator
                            </div>
                        </div>
                        <div class="logged-user-toggler-arrow">
                            <div class="os-icon os-icon-chevron-down"></div>
                        </div>
                        <div class="logged-user-menu color-style-bright">
                            <div class="logged-user-avatar-info">
                                <div class="avatar-w">
                                    @if(Auth::user()->media_id)
                                        <img alt="" src="{{ asset('storage/'.Auth::user()->media->reference) }}">
                                    @else
                                        <div class="avatar" style="border-radius: 50%;">{{ substr(Auth::user()->first_name, 0, 1).substr(Auth::user()->last_name, 0, 1)}}</div>
                                    @endif
                                </div>
                                <div class="logged-user-info-w">
                                    <div class="logged-user-name">
                                      Maria Gomez
                                    </div>
                                    <div class="logged-user-role">
                                          Administrator
                                    </div>
                                </div>
                            </div>
                            <div class="bg-icon">
                                <i class="os-icon os-icon-wallet-loaded"></i>
                            </div>
                            <ul>
                                <li>
                                    <a href="users_profile_big.html"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a>
                                </li>
                                <li>
                                    <a href="users_profile_small.html"><i class="os-icon os-icon-coins-4"></i><span>Billing Details</span></a>
                                </li>
                                <li>
                                    <a href="#"><i class="os-icon os-icon-others-43"></i><span>Notifications</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
                                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="menu-actions">
                    <div class="messages-notifications os-dropdown-trigger os-dropdown-position-right">
                        <i class="os-icon os-icon-bell"></i>
                        <div class="new-messages-count">
                            12
                        </div>
                        <div class="os-dropdown light message-list">
                            <ul>
                                <li>
                                    <a href="#">
                                        <div class="user-avatar-w">
                                            @if(Auth::user()->media_id)
                                                <img alt="" src="{{ asset('storage/'.Auth::user()->media->reference) }}">
                                            @else
                                                <div class="avatar" style="border-radius: 50%;">{{ substr(Auth::user()->first_name, 0, 1).substr(Auth::user()->last_name, 0, 1)}}</div>
                                            @endif
                                        </div>
                                        <div class="message-content">
                                            <h6 class="message-from">
                                              John Mayers
                                            </h6>
                                            <h6 class="message-title">
                                              Account Update
                                            </h6>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="user-avatar-w">
                                            <img alt="" src="{{ asset('img/avatar2.jpg') }}">
                                        </div>
                                        <div class="message-content">
                                            <h6 class="message-from">
                                              Phil Jones
                                            </h6>
                                            <h6 class="message-title">
                                              Secutiry Updates
                                            </h6>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="user-avatar-w">
                                            <img alt="" src="{{ asset('img/avatar3.jpg') }}">
                                        </div>
                                        <div class="message-content">
                                            <h6 class="message-from">
                                                Bekky Simpson
                                            </h6>
                                            <h6 class="message-title">
                                                Vacation Rentals
                                            </h6>
                                        </div>
                                    </a>
                                </li>
                                <li style="background-color: #C6C0D9;">
                                    <a href="#">
                                        <div class="user-avatar-w">
                                            <img alt="" src="{{ asset('img/avatar4.jpg') }}">
                                        </div>
                                        <div class="message-content">
                                            <h6 class="message-from">
                                                Alice Priskon
                                            </h6>
                                            <h6 class="message-title">
                                                Payment Confirmation
                                            </h6>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-right">
                        <i class="os-icon os-icon-ui-46"></i>
                        <div class="os-dropdown">
                            <div class="icon-w">
                                <i class="os-icon os-icon-ui-46"></i>
                            </div>
                            <ul>
                                <li>
                                    <a href="users_profile_small.html"><i class="os-icon os-icon-ui-49"></i><span>Profile Settings</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="messages-notifications os-dropdown-trigger os-dropdown-position-right">
                        <i class="os-icon os-icon-zap"></i>
                        <div class="new-messages-count">
                            4
                        </div>
                        <div class="os-dropdown light message-list">
                            <div class="icon-w">
                                <i class="os-icon os-icon-zap"></i>
                            </div>
                            <ul>
                                <li>
                                    <a href="#">
                                        <div class="user-avatar-w">
                                            @if(Auth::user()->media_id)
                                                <img alt="" src="{{ asset('storage/'.Auth::user()->media->reference) }}">
                                            @else
                                                <div class="avatar" style="border-radius: 50%;">{{ substr(Auth::user()->first_name, 0, 1).substr(Auth::user()->last_name, 0, 1)}}</div>
                                            @endif
                                        </div>
                                        <div class="message-content">
                                            <h6 class="message-from">
                                                John Mayers
                                            </h6>
                                            <h6 class="message-title">
                                                Account Update
                                            </h6>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="user-avatar-w">
                                            <img alt="" src="{{ asset('img/avatar2.jpg') }}">
                                        </div>
                                        <div class="message-content">
                                            <h6 class="message-from">
                                                Phil Jones
                                            </h6>
                                            <h6 class="message-title">
                                                Secutiry Updates
                                            </h6>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="user-avatar-w">
                                            <img alt="" src="{{ asset('img/avatar3.jpg') }}">
                                        </div>
                                        <div class="message-content">
                                            <h6 class="message-from">
                                                Bekky Simpson
                                            </h6>
                                            <h6 class="message-title">
                                                Vacation Rentals
                                            </h6>
                                        </div>
                                    </a>
                                </li>
                                <li  style="background-color: #C6C0D9;">
                                    <a href="#">
                                        <div class="user-avatar-w">
                                            <img alt="" src="{{ asset('img/avatar4.jpg') }}">
                                        </div>
                                        <div class="message-content">
                                            <h6 class="message-from">
                                                Alice Priskon
                                            </h6>
                                            <h6 class="message-title">
                                                Payment Confirmation
                                            </h6>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                      </div>
                    </div>
                </div>
                <div class="element-search autosuggest-search-activator">
                    <input placeholder="Start typing to search..." type="text">
                </div>
                <h1 class="menu-page-header">
                    Page Header
                </h1>
                <ul class="main-menu">
                    <li class="sub-header">
                        <span>Dashboard</span>
                    </li>
                    <li class="selected">
                        <a href="{{ route('dashboard', Auth::user()->subdomain) }}">
                            <div class="icon-w">
                                <div class="os-icon os-icon-layout"></div>
                            </div>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('members', Auth::user()->subdomain) }}">
                            <div class="icon-w">
                                <div class="os-icon os-icon-users"></div>
                            </div>
                            <span>Employees</span>
                        </a>
                    </li>
                    <li class="has-sub-menu">
                        <a href="{{ route('offers', Auth::user()->subdomain) }}">
                            <div class="icon-w">
                                <div class="os-icon os-icon-bar-chart-stats-up"></div>
                            </div>
                            <span>Hiring</span>
                        </a>
                        <div class="sub-menu-w">
                            <div class="sub-menu-header">
                                Hiring
                            </div>
                            <div class="sub-menu-icon">
                                <i class="os-icon os-icon-layers"></i>
                            </div>
                            <div class="sub-menu-i">
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{ route('offers', Auth::user()->subdomain) }}">Offers</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('candidates', Auth::user()->subdomain) }}">Condidates</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="">
                        <a href="{{ route('payroll', Auth::user()->subdomain) }}">
                            <div class="icon-w">
                                <div class="os-icon os-icon-wallet-loaded"></div>
                            </div>
                            <span>Payroll</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('projects', Auth::user()->subdomain) }}">
                            <div class="icon-w">
                                <div class="os-icon os-icon-calendar-time"></div>
                            </div>
                            <span>Projects</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('teams',Auth::user()->subdomain) }}">
                            <div class="icon-w">
                                <div class="os-icon os-icon-hierarchy-structure-2"></div>
                            </div>
                            <span>Teams</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('timeoffs',Auth::user()->subdomain) }}">
                            <div class="icon-w">
                                <div class="os-icon os-icon-ui-44"></div>
                            </div>
                            <span>Time Off</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('schedules',Auth::user()->subdomain) }}">
                            <div class="icon-w">
                                <div class="os-icon os-icon-basic-2-259-calendar"></div>
                            </div>
                            <span>Scedules/Shifts (Admin)</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('timesheets',Auth::user()->subdomain) }}">
                            <div class="icon-w">
                                <div class="os-icon os-icon-basic-2-259-calendar"></div>
                            </div>
                            <span>Timesheets</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('attendance',Auth::user()->subdomain) }}">
                            <div class="icon-w">
                                <div class="os-icon os-icon-basic-2-259-calendar"></div>
                            </div>
                            <span>Attendance</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('boards',Auth::user()->subdomain) }}">
                            <div class="icon-w">
                                <div class="os-icon os-icon-clipboard"></div>
                            </div>
                            <span>Boards</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('tasks',Auth::user()->subdomain) }}">
                            <div class="icon-w">
                                <div class="os-icon os-icon-tasks-checked"></div>
                            </div>
                            <span>Tasks</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('invoices',Auth::user()->subdomain) }}">
                            <div class="icon-w">
                                <div class="os-icon os-icon-documents-03"></div>
                            </div>
                            <span>Invoices</span>
                        </a>
                    </li>
                    <li class="has-sub-menu">
                        <a href="{{ route('screenshots', Auth::user()->subdomain) }}">
                            <div class="icon-w">
                                <div class="os-icon os-icon-bar-chart-stats-up"></div>
                            </div>
                            <span>Monitoring</span>
                        </a>
                        <div class="sub-menu-w">
                            <div class="sub-menu-header">
                                Activities
                            </div>
                            <div class="sub-menu-icon">
                                <i class="os-icon os-icon-layers"></i>
                            </div>
                            <div class="sub-menu-i">
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{ route('screenshots', Auth::user()->subdomain) }}">Screenshots</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('apps', Auth::user()->subdomain) }}">Apps</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('urls', Auth::user()->subdomain) }}">URLs</a>
                                    </li>
                                    <!-- <li>
                                        <a href="locations.html">Locations</a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="">
                        <a href="{{ route('clients', Auth::user()->subdomain) }}">
                            <div class="icon-w">
                                <div class="os-icon os-icon-users"></div>
                            </div>
                            <span>Clients</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('permissions', Auth::user()->subdomain) }}">
                            <div class="icon-w">
                                <div class="os-icon os-icon-users"></div>
                            </div>
                            <span>Roles & Permissions</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('whitelist', Auth::user()->subdomain) }}">
                            <div class="icon-w">
                                <div class="os-icon os-icon-users"></div>
                            </div>
                            <span>Chat</span>
                            <strong class="text-right badge badge-danger">0</strong>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('settings', Auth::user()->subdomain) }}">
                            <div class="icon-w">
                                <div class="os-icon os-icon-layout"></div>
                            </div>
                            <span>Settings</span>
                        </a>
                    </li>
                </ul>
                <div class="side-menu-magic">
                    <h4>
                        Upgrade Account
                    </h4>
                    <p>
                        Go Premuim Now !
                    </p>
                    <div class="btn-w">
                        <a class="btn btn-white btn-rounded" href="#" target="_blank">Purchase Now</a>
                    </div>
                </div>
            </div>
            <!--------------------
            END - Main Menu
            -------------------->
            <div class="content-w">
                <!--------------------
                START - Top Bar
                -------------------->
                <div @if(Auth::user()->pref_theme == 0) class="top-bar color-scheme-light" @else class="top-bar color-scheme-transparent" @endif>
                    <div class="fancy-selector-w">
                        <div class="fancy-selector-current">
                            <div class="fs-img shadowless">
                                <i class="os-icon os-icon-inbox" style="font-size: 1.9rem;"></i>
                            </div>
                            <div class="fs-main-info">
                                <div class="fs-name">
                                    Duscussion
                                </div>
                                <div class="fs-sub">
                                    <span>New Messages:</span><strong>12</strong>
                                </div>
                            </div>
                            <div class="fs-selector-trigger">
                                <i class="os-icon os-icon-arrow-down4"></i>
                            </div>
                        </div>
                        <div class="fancy-selector-options">
                            <div class="fancy-selector-option">
                                <div class="fs-img shadowless">
                                    <i class="os-icon os-icon-grid-squares-22" style="font-size: 1.9rem;"></i>
                                </div>
                                <div class="fs-main-info">
                                    <div class="fs-name">
                                        Our Products
                                    </div>
                                </div>
                            </div>
                            <div class="fancy-selector-option"><!-- Add class active-->
                                <div class="fs-img shadowless">
                                    <i class="os-icon os-icon-help-circle" style="font-size: 1.9rem;"></i>
                                </div>
                                <div class="fs-main-info">
                                    <div class="fs-name">
                                        Support
                                    </div>
                                    <div class="fs-sub">
                                        <span>Live Support</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="top-menu-controls">
                        <div class="element-search autosuggest-search-activator">
                            <input placeholder="Start typing to search..." type="text">
                        </div>
                        <div class="messages-notifications os-dropdown-trigger os-dropdown-position-left">
                            <i class="os-icon os-icon-bell"></i>
                            <div class="new-messages-count">
                                12
                            </div>
                            <div class="os-dropdown light message-list">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <div class="user-avatar-w">
                                                @if(Auth::user()->media_id)
                                                    <img alt="" src="{{ asset('storage/'.Auth::user()->media->reference) }}">
                                                @else
                                                    <div class="avatar" style="border-radius: 50%;">{{ substr(Auth::user()->first_name, 0, 1).substr(Auth::user()->last_name, 0, 1)}}</div>
                                                @endif
                                            </div>
                                            <div class="message-content">
                                                <h6 class="message-from">
                                                    John Mayers
                                                </h6>
                                                <h6 class="message-title">
                                                    Account Update
                                                </h6>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="user-avatar-w">
                                                <img alt="" src="{{ asset('img/avatar2.jpg') }}">
                                            </div>
                                            <div class="message-content">
                                                <h6 class="message-from">
                                                    Phil Jones
                                                </h6>
                                                <h6 class="message-title">
                                                    Secutiry Updates
                                                </h6>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="user-avatar-w">
                                                <img alt="" src="{{ asset('img/avatar3.jpg') }}">
                                            </div>
                                            <div class="message-content">
                                                <h6 class="message-from">
                                                    Bekky Simpson
                                                </h6>
                                                <h6 class="message-title">
                                                    Vacation Rentals
                                                </h6>
                                            </div>
                                        </a>
                                    </li>
                                    <li style="background-color: #C6C0D9;">
                                        <a href="#">
                                            <div class="user-avatar-w">
                                                <img alt="" src="{{ asset('img/avatar4.jpg') }}">
                                            </div>
                                            <div class="message-content">
                                                <h6 class="message-from">
                                                    Alice Priskon
                                                </h6>
                                                <h6 class="message-title">
                                                    Payment Confirmation
                                                </h6>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-left">
                            <i class="os-icon os-icon-ui-46"></i>
                            <div class="os-dropdown">
                                <div class="icon-w">
                                    <i class="os-icon os-icon-ui-46"></i>
                                </div>
                                <ul>
                                    <li>
                                        <a href="users_profile_small.html"><i class="os-icon os-icon-ui-49"></i><span>Profile Settings</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="logged-user-w">
                            <div class="logged-user-i">
                                <div class="avatar-w">
                                    @if(Auth::user()->media_id)
                                        <img alt="" src="{{ asset('storage/'.Auth::user()->media->reference) }}">
                                    @else
                                        <div class="avatar" style="border-radius: 50%;">{{ substr(Auth::user()->first_name, 0, 1).substr(Auth::user()->last_name, 0, 1)}}</div>
                                    @endif
                                </div>
                                <div class="logged-user-menu color-style-bright">
                                    <div class="logged-user-avatar-info">
                                        <div class="avatar-w">
                                            @if(Auth::user()->media_id)
                                                <img alt="" src="{{ asset('storage/'.Auth::user()->media->reference) }}">
                                            @else
                                                <div class="avatar" style="border-radius: 50%;">{{ substr(Auth::user()->first_name, 0, 1).substr(Auth::user()->last_name, 0, 1)}}</div>
                                            @endif
                                        </div>
                                        <div class="logged-user-info-w">
                                            <div class="logged-user-name">
                                                Maria Gomez
                                            </div>
                                            <div class="logged-user-role">
                                                Administrator
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-icon">
                                        <i class="os-icon os-icon-wallet-loaded"></i>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="users_profile_big.html"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a>
                                        </li>
                                        <li>
                                            <a href="users_profile_small.html"><i class="os-icon os-icon-coins-4"></i><span>Billing Details</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="os-icon os-icon-others-43"></i><span>Notifications</span></a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout') }}"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-i" id="app">
                    <div id="loading" style="display: none;">
                        <div class="modal-backdrop fade show"></div>
                        <div class="fade show loading">
                            <img id="loading-img" src="{{asset('img/loading.gif')}}" alt="Loading">
                        </div>
                    </div>
                    <chat-component></chat-component>

                @include('layouts.alert')
                </div>
            </div>
        <div class="display-type"></div>
    </div>
</body>
</html>