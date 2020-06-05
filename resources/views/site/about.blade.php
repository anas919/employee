@extends('layouts.template')

@section('content')
<main class="position-relative overflow-hidden">
   <!-- ./Page header -->
   <header class="page header color-1 overlay alpha-8 image-background cover gradient gradient-43" style="background-image: url('img/bg/waves.jpg')">
       <div class="divider-shape">
           <!-- waves divider -->
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none" class="shape-waves" style="left: 0; transform: rotate3d(0,1,0,180deg);">
               <path class="shape-fill shape-fill-6" d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z" />
           </svg>
       </div>
       <div class="container" style="">
           <div class="row">
               <div class="col-md-6">
                   <h1 class="regular display-4 color-1 mb-4">About Us </h1>
                   <p class="lead color-1">DashCore is an all included HTML template, it's packed with a admin dashboard template to help you get started with your project.</p>
               </div>
           </div>
       </div>
   </header>
   <!-- ./Overview - Floating boxes -->
   <section class="section overview">
      <div class="container">
         <div class="row align-items-center gap-y">
            <div class="col-lg-5 mr-auto text-center text-md-left">
               <div class="section-heading">
                  <p class="badge badge-success bold">Succeed with DashCore</p>
                  <h2>The new way to showcase your Startup</h2>
                  <p class="lead text-secondary">DashCore is a Bootstrap 4 HTML template. Designed to help you promote your solution in an easy and beautiful way.</p>
               </div>
               <p>It includes multiple components and pre-made demos ready for you to personalize according to your own needs. DashCore includes a ready-to-go Admin Dashboard with many out-of-the-box features.</p>
            </div>
            <div class="col-lg-6">
               <div class="row gap-y">
                  <div class="col-6 col-sm-5 col-md-6 mt-6 ml-lg-auto">
                     <div class="card rounded p-2 p-sm-4 shadow text-center text-md-left aos-init" data-aos="fade-up">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar stroke-primary">
                           <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                           <line x1="16" y1="2" x2="16" y2="6"></line>
                           <line x1="8" y1="2" x2="8" y2="6"></line>
                           <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        <p class="bold mb-0">Calendar</p>
                        <p class="op-7 small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi at, cumque dolores dolorum est.</p>
                     </div>
                  </div>
                  <div class="col-6 col-sm-5 col-md-6 mr-lg-auto">
                     <div class="text-contrast bg-info-gradient card rounded p-2 p-sm-4 shadow text-center text-md-left aos-init" data-aos="fade-up">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart">
                           <line x1="12" y1="20" x2="12" y2="10"></line>
                           <line x1="18" y1="20" x2="18" y2="4"></line>
                           <line x1="6" y1="20" x2="6" y2="16"></line>
                        </svg>
                        <p class="bold mb-0">Dashboard</p>
                        <p class="op-7 small">Cupiditate debitis delectus dolor dolore doloremque, doloribus eveniet illo in labore neque.</p>
                     </div>
                  </div>
                  <div class="col-6 col-sm-5 col-md-6 ml-lg-auto">
                     <div class="card rounded p-2 p-sm-4 shadow text-center text-md-left aos-init" data-aos="fade-up">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail stroke-primary">
                           <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                           <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        <p class="bold mb-0">Inbox</p>
                        <p class="op-7 small">Amet aperiam cumque delectus eligendi, esse, modi nemo nisi officiis rem repellat sed ulla.</p>
                     </div>
                  </div>
                  <div class="col-6 col-sm-5 col-md-6 mt-n6 mr-lg-auto">
                     <div class="card rounded p-2 p-sm-4 shadow text-center text-md-left aos-init" data-aos="fade-up">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard stroke-primary">
                           <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                           <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                        </svg>
                        <p class="bold mb-0">Invoicing</p>
                        <p class="op-7 small">Ad aliquam dicta, eaque eos iusto totam velit. Amet atque dolorum eaque ipsa sed. Aliquid cupiditate.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- ./Video -->
   <section class="section">
      <div class="container bring-to-front">
         <div class="shadow rounded text-center overlay overlay-dark alpha-8 text-contrast p-5 image-background cover" style="background-image: url(https://picsum.photos/350/200/?random&amp;gravity=south)">
            <div class="content">
               <div class="section-heading">
                  <h2 class="text-contrast">Discover how DashCore works</h2>
               </div>
               <p class="handwritten highlight font-md">Play the video</p>
               <a href="https://www.youtube.com/watch?v=MXghcI8hcWU" class="modal-popup mfp-iframe btn btn-circle btn-lg btn-primary" data-effect="mfp-fade">
                  <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play ml-2">
                     <polygon points="5 3 19 12 5 21 5 3"></polygon>
                  </svg>
               </a>
            </div>
         </div>
      </div>
   </section>
   <!-- ./Dashboard Included -->
   <section class="section bg-light edge top-left">
      <div class="container bring-to-front">
         <div class="section-heading text-center">
            <h2>A solution for every need</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aperiam atque dicta dignissimos eius excepturi fuga laudantium libero nam nihil, obcaecati pariatur quaerat quam, quia quisquam repudiandae sed tenetur veniam!</p>
         </div>
         <div class="row align-items-center gap-y">
            <div class="col-md-6 col-lg-5 text-center text-md-left">
               <ul class="list-unstyled">
                  <li class="media d-block d-lg-flex">
                     <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box stroke-primary mr-3 text-lg-right">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                     </svg>
                     <div class="media-body mt-3 mt-lg-0 text-center text-md-left">
                        <h5 class="bold text-darker">Full Code</h5>
                        <p class="mt-0 mb-5">DashCore comes with fully documented HTML, SASS, JS, PHP code, all in a well organized and structured way.</p>
                     </div>
                  </li>
                  <li class="media d-block d-lg-flex">
                     <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings stroke-primary mr-3 text-lg-right">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                     </svg>
                     <div class="media-body mt-3 mt-lg-0 text-center text-md-left">
                        <h5 class="bold text-darker">Free Updates</h5>
                        <p class="mt-0 mb-5">You'll get lifetime free updates as we improve or add new features.</p>
                     </div>
                  </li>
                  <li class="media d-block d-lg-flex">
                     <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award stroke-primary mr-3 text-lg-right">
                        <circle cx="12" cy="8" r="7"></circle>
                        <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                     </svg>
                     <div class="media-body mt-3 mt-lg-0 text-center text-md-left">
                        <h5 class="bold text-darker">Premium Support</h5>
                        <p class="mt-0">In case you need it, We got you covered, with our premium quality fast support service.</p>
                     </div>
                  </li>
               </ul>
            </div>
            <div class="col-md-6 col-lg-5 ml-md-auto">
               <div class="shadow card">
                  <div class="card-header overlay gradient gradient-blue-purple alpha-5 image-background cover" style="background-image: url(img/screens/dash/4.png)">
                     <div class="content">
                        <h2 class="mt-9 text-contrast light">Dashboard Included</h2>
                     </div>
                  </div>
                  <div class="card-body">
                     <p>Our template is packed with a <span class="bold">Starter Admin Dashboard</span> to help you get started right away with your project. You'll have not a beautiful HTML template to promote your product but a starting point admin template</p>
                     <a href="admin/" class="btn btn-primary btn-rounded mt-4">Try the Dashboard</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- ./Counters -->
   <section class="bg-contrast edge top-left">
      <div class="container">
         <div class="row">
            <div class="col-xs-4 col-md-3 text-center">
               <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box stroke-primary">
                  <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                  <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                  <line x1="12" y1="22.08" x2="12" y2="12"></line>
               </svg>
               <p class="counter bold text-darker font-md mt-0" style="visibility: visible;">273</p>
               <p class="text-secondary m-0">Components</p>
            </div>
            <div class="col-xs-4 col-md-3 text-center">
               <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download-cloud stroke-primary">
                  <polyline points="8 17 12 21 16 17"></polyline>
                  <line x1="12" y1="12" x2="12" y2="21"></line>
                  <path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29"></path>
               </svg>
               <p class="counter bold text-darker font-md mt-0" style="visibility: visible;">654</p>
               <p class="text-secondary m-0">Downloads</p>
            </div>
            <div class="col-xs-4 col-md-3 text-center">
               <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings stroke-primary">
                  <circle cx="12" cy="12" r="3"></circle>
                  <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
               </svg>
               <p class="counter bold text-darker font-md mt-0" style="visibility: visible;">7941</p>
               <p class="text-secondary m-0">Followers</p>
            </div>
            <div class="col-xs-4 col-md-3 text-center">
               <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award stroke-primary">
                  <circle cx="12" cy="8" r="7"></circle>
                  <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
               </svg>
               <p class="counter bold text-darker font-md mt-0" style="visibility: visible;">654</p>
               <p class="text-secondary m-0">New users</p>
            </div>
         </div>
      </div>
   </section>
   <!-- ./Features - Boxed -->
   <section class="section features bg-light-gradient">
      <div class="container">
         <div class="section-heading text-center">
            <h2>Our features stack</h2>
            <p class="lead text-secondary">Take the control of your web with DashCore. You can customize the theme according to your needs or just use the ready-to-use content we made for you</p>
         </div>
         <div class="row gap-y">
            <div class="col-md-3">
               <div class="shadow-box shadow-hover border-0 card">
                  <div class="card-body text-center">
                     <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone stroke-primary">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                     </svg>
                     <p class="mb-0">Responsive</p>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="shadow-box shadow-hover border-0 card">
                  <div class="card-body text-center">
                     <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings stroke-primary">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                     </svg>
                     <p class="mb-0">Customizable</p>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="shadow-box shadow-hover border-0 card">
                  <div class="card-body text-center">
                     <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award stroke-primary">
                        <circle cx="12" cy="8" r="7"></circle>
                        <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                     </svg>
                     <p class="mb-0">Clean Code</p>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="shadow-box shadow-hover border-0 card">
                  <div class="card-body text-center">
                     <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star stroke-primary">
                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                     </svg>
                     <p class="mb-0">Creative</p>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="shadow-box shadow-hover border-0 card">
                  <div class="card-body text-center">
                     <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send stroke-primary">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                     </svg>
                     <p class="mb-0">Ready-Content</p>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="shadow-box shadow-hover border-0 card">
                  <div class="card-body text-center">
                     <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-headphones stroke-primary">
                        <path d="M3 18v-6a9 9 0 0 1 18 0v6"></path>
                        <path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path>
                     </svg>
                     <p class="mb-0">Supported</p>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="shadow-box shadow-hover border-0 card">
                  <div class="card-body text-center">
                     <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hard-drive stroke-primary">
                        <line x1="22" y1="12" x2="2" y2="12"></line>
                        <path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path>
                        <line x1="6" y1="16" x2="6.01" y2="16"></line>
                        <line x1="10" y1="16" x2="10.01" y2="16"></line>
                     </svg>
                     <p class="mb-0">Documented</p>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="shadow-box shadow-hover border-0 card">
                  <div class="card-body text-center">
                     <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box stroke-primary">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                     </svg>
                     <p class="mb-0">Components</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- ./Customers -->
   <section class="section bg-contrast edge bottom-right">
      <div class="container">
         <div class="section-heading text-center">
            <h2>Third party integration</h2>
            <p class="text-secondary lead">We use the latest trends because you deserve better</p>
         </div>
         <ul class="list-unstyled d-flex flex-wrap justify-content-around">
            <li data-aos-easing="ease-in-out-cubic" data-aos="fade-right" data-aos-delay="0" class="shadow-box bg-light rounded-circle icon-xxl image-background contain mt-6 aos-init" style="background-image: url(img/logos/1.png)"></li>
            <li data-aos-easing="ease-in-out-cubic" data-aos="fade-down-right" data-aos-delay="100" class="shadow-box bg-light rounded-circle icon-xxl image-background contain mt-4 aos-init" style="background-image: url(img/logos/2.png)"></li>
            <li data-aos-easing="ease-in-out-cubic" data-aos="fade-up-right" data-aos-delay="200" class="shadow-box bg-light rounded-circle icon-xxl image-background contain mt-5 aos-init" style="background-image: url(img/logos/3.png)"></li>
            <li data-aos-easing="ease-in-out-cubic" data-aos="fade-up" data-aos-delay="300" class="shadow-box bg-light rounded-circle icon-xxl image-background contain mt-6 aos-init" style="background-image: url(img/logos/4.png)"></li>
            <li data-aos-easing="ease-in-out-cubic" data-aos="fade-down-left" data-aos-delay="400" class="shadow-box bg-light rounded-circle icon-xxl image-background contain mt-4 aos-init" style="background-image: url(img/logos/5.png)"></li>
            <li data-aos-easing="ease-in-out-cubic" data-aos="fade-up-left" data-aos-delay="0" class="shadow-box bg-light rounded-circle icon-xxl image-background contain mt-5 aos-init" style="background-image: url(img/logos/1.png)"></li>
            <li data-aos-easing="ease-in-out-cubic" data-aos="fade-left" data-aos-delay="100" class="shadow-box bg-light rounded-circle icon-xxl image-background contain mt-6 aos-init" style="background-image: url(img/logos/2.png)"></li>
         </ul>
         <div class="text-center mt-6">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code stroke-primary">
               <polyline points="16 18 22 12 16 6"></polyline>
               <polyline points="8 6 2 12 8 18"></polyline>
            </svg>
            <p class="text-primary">Are you a developer?</p>
            <a href="developers.html" class="btn btn-rounded btn-primary">Review the specs</a>
         </div>
      </div>
   </section>
   <!-- ./Team -->
   <section class="section bg-light">
      <div class="container bring-to-front pt-0 pb-5">
         <div class="section-heading text-center">
            <h2>Get to know our team</h2>
            <p class="lead text-secondary">These amazing people have made possible to stay where we are</p>
         </div>
         <!-- sm: 576px, md: 768px,-->
         <div class="swiper-container pb-5 swiper-container-initialized swiper-container-horizontal" data-sw-centered-slides="false" data-sw-show-items="2" data-sw-space-between="30" data-sw-breakpoints="{&quot;576&quot;: {&quot;slidesPerView&quot;: 1, &quot;spaceBetween&quot;: 10, &quot;slidesPerGroup&quot;: 1}}">
            <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(-3780px, 0px, 0px);">
               <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="4" style="width: 600px; margin-right: 30px;">
                  <div class="card shadow">
                     <div class="container-fluid py-0">
                        <div class="row">
                           <div class="col-md-5 py-9 py-sm-7 overlay overlay-dark alpha-2 image-background cover center-top" style="background-image: url(img/avatar/team/5.jpg)"></div>
                           <div class="col-md-7">
                              <div class="p-4">
                                 <h6 class="bold font-l">Allison Fernandez</h6>
                                 <p class="small mt-0 text-primary text-uppercase mb-5">Client Support</p>
                                 <blockquote class="team-quote pt-1">
                                    <i class="quote fas fa-quote-left"></i>
                                    <p class="italic pl-4">Need any assistance with the product?</p>
                                 </blockquote>
                                 <hr class="w-25 mt-5">
                                 <nav class="nav"><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-facebook text-secondary"></i> </a><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-twitter text-secondary"></i> </a><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-dribbble text-secondary"></i></a></nav>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" data-swiper-slide-index="5" style="width: 600px; margin-right: 30px;">
                  <div class="card shadow">
                     <div class="container-fluid py-0">
                        <div class="row">
                           <div class="col-md-5 py-9 py-sm-7 overlay overlay-dark alpha-2 image-background cover center-top" style="background-image: url(img/avatar/team/6.jpg)"></div>
                           <div class="col-md-7">
                              <div class="p-4">
                                 <h6 class="bold font-l">Richard Smith</h6>
                                 <p class="small mt-0 text-primary text-uppercase mb-5">Lead Developer</p>
                                 <blockquote class="team-quote pt-1">
                                    <i class="quote fas fa-quote-left"></i>
                                    <p class="italic pl-4">Geek, manager, and manager of geeks.</p>
                                 </blockquote>
                                 <hr class="w-25 mt-5">
                                 <nav class="nav"><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-facebook text-secondary"></i> </a><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-twitter text-secondary"></i> </a><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-dribbble text-secondary"></i></a></nav>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="swiper-slide" data-swiper-slide-index="0" style="width: 600px; margin-right: 30px;">
                  <div class="card shadow">
                     <div class="container-fluid py-0">
                        <div class="row">
                           <div class="col-md-5 py-9 py-sm-7 overlay overlay-dark alpha-2 image-background cover center-top" style="background-image: url(img/avatar/team/1.jpg)"></div>
                           <div class="col-md-7">
                              <div class="p-4">
                                 <h6 class="bold font-l">Rafael Freeman</h6>
                                 <p class="small mt-0 text-primary text-uppercase mb-5">Founder &amp; CEO</p>
                                 <blockquote class="team-quote pt-1">
                                    <i class="quote fas fa-quote-left"></i>
                                    <p class="italic pl-4">Long time ago, this guy started it all.</p>
                                 </blockquote>
                                 <hr class="w-25 mt-5">
                                 <nav class="nav"><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-facebook text-secondary"></i> </a><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-twitter text-secondary"></i> </a><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-dribbble text-secondary"></i></a></nav>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="swiper-slide" data-swiper-slide-index="1" style="width: 600px; margin-right: 30px;">
                  <div class="card shadow">
                     <div class="container-fluid py-0">
                        <div class="row">
                           <div class="col-md-5 py-9 py-sm-7 overlay overlay-dark alpha-2 image-background cover center-top" style="background-image: url(img/avatar/team/2.jpg)"></div>
                           <div class="col-md-7">
                              <div class="p-4">
                                 <h6 class="bold font-l">Aline De Souza</h6>
                                 <p class="small mt-0 text-primary text-uppercase mb-5">Marketing Director</p>
                                 <blockquote class="team-quote pt-1">
                                    <i class="quote fas fa-quote-left"></i>
                                    <p class="italic pl-4">The girl that influences our products.</p>
                                 </blockquote>
                                 <hr class="w-25 mt-5">
                                 <nav class="nav"><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-facebook text-secondary"></i> </a><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-twitter text-secondary"></i> </a><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-dribbble text-secondary"></i></a></nav>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="swiper-slide" data-swiper-slide-index="2" style="width: 600px; margin-right: 30px;">
                  <div class="card shadow">
                     <div class="container-fluid py-0">
                        <div class="row">
                           <div class="col-md-5 py-9 py-sm-7 overlay overlay-dark alpha-2 image-background cover center-top" style="background-image: url(img/avatar/team/3.jpg)"></div>
                           <div class="col-md-7">
                              <div class="p-4">
                                 <h6 class="bold font-l">Jayden Gardner</h6>
                                 <p class="small mt-0 text-primary text-uppercase mb-5">Account Manager</p>
                                 <blockquote class="team-quote pt-1">
                                    <i class="quote fas fa-quote-left"></i>
                                    <p class="italic pl-4">Keeps all the numbers in place.</p>
                                 </blockquote>
                                 <hr class="w-25 mt-5">
                                 <nav class="nav"><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-facebook text-secondary"></i> </a><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-twitter text-secondary"></i> </a><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-dribbble text-secondary"></i></a></nav>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="swiper-slide swiper-slide-prev" data-swiper-slide-index="3" style="width: 600px; margin-right: 30px;">
                  <div class="card shadow">
                     <div class="container-fluid py-0">
                        <div class="row">
                           <div class="col-md-5 py-9 py-sm-7 overlay overlay-dark alpha-2 image-background cover center-top" style="background-image: url(img/avatar/team/4.jpg)"></div>
                           <div class="col-md-7">
                              <div class="p-4">
                                 <h6 class="bold font-l">Jacobi Edwards</h6>
                                 <p class="small mt-0 text-primary text-uppercase mb-5">VP of Sales</p>
                                 <blockquote class="team-quote pt-1">
                                    <i class="quote fas fa-quote-left"></i>
                                    <p class="italic pl-4">The man that leads the Global Sales team.</p>
                                 </blockquote>
                                 <hr class="w-25 mt-5">
                                 <nav class="nav"><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-facebook text-secondary"></i> </a><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-twitter text-secondary"></i> </a><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-dribbble text-secondary"></i></a></nav>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="4" style="width: 600px; margin-right: 30px;">
                  <div class="card shadow">
                     <div class="container-fluid py-0">
                        <div class="row">
                           <div class="col-md-5 py-9 py-sm-7 overlay overlay-dark alpha-2 image-background cover center-top" style="background-image: url(img/avatar/team/5.jpg)"></div>
                           <div class="col-md-7">
                              <div class="p-4">
                                 <h6 class="bold font-l">Allison Fernandez</h6>
                                 <p class="small mt-0 text-primary text-uppercase mb-5">Client Support</p>
                                 <blockquote class="team-quote pt-1">
                                    <i class="quote fas fa-quote-left"></i>
                                    <p class="italic pl-4">Need any assistance with the product?</p>
                                 </blockquote>
                                 <hr class="w-25 mt-5">
                                 <nav class="nav"><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-facebook text-secondary"></i> </a><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-twitter text-secondary"></i> </a><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-dribbble text-secondary"></i></a></nav>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="5" style="width: 600px; margin-right: 30px;">
                  <div class="card shadow">
                     <div class="container-fluid py-0">
                        <div class="row">
                           <div class="col-md-5 py-9 py-sm-7 overlay overlay-dark alpha-2 image-background cover center-top" style="background-image: url(img/avatar/team/6.jpg)"></div>
                           <div class="col-md-7">
                              <div class="p-4">
                                 <h6 class="bold font-l">Richard Smith</h6>
                                 <p class="small mt-0 text-primary text-uppercase mb-5">Lead Developer</p>
                                 <blockquote class="team-quote pt-1">
                                    <i class="quote fas fa-quote-left"></i>
                                    <p class="italic pl-4">Geek, manager, and manager of geeks.</p>
                                 </blockquote>
                                 <hr class="w-25 mt-5">
                                 <nav class="nav"><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-facebook text-secondary"></i> </a><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-twitter text-secondary"></i> </a><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-dribbble text-secondary"></i></a></nav>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="0" style="width: 600px; margin-right: 30px;">
                  <div class="card shadow">
                     <div class="container-fluid py-0">
                        <div class="row">
                           <div class="col-md-5 py-9 py-sm-7 overlay overlay-dark alpha-2 image-background cover center-top" style="background-image: url(img/avatar/team/1.jpg)"></div>
                           <div class="col-md-7">
                              <div class="p-4">
                                 <h6 class="bold font-l">Rafael Freeman</h6>
                                 <p class="small mt-0 text-primary text-uppercase mb-5">Founder &amp; CEO</p>
                                 <blockquote class="team-quote pt-1">
                                    <i class="quote fas fa-quote-left"></i>
                                    <p class="italic pl-4">Long time ago, this guy started it all.</p>
                                 </blockquote>
                                 <hr class="w-25 mt-5">
                                 <nav class="nav"><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-facebook text-secondary"></i> </a><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-twitter text-secondary"></i> </a><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-dribbble text-secondary"></i></a></nav>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="1" style="width: 600px; margin-right: 30px;">
                  <div class="card shadow">
                     <div class="container-fluid py-0">
                        <div class="row">
                           <div class="col-md-5 py-9 py-sm-7 overlay overlay-dark alpha-2 image-background cover center-top" style="background-image: url(img/avatar/team/2.jpg)"></div>
                           <div class="col-md-7">
                              <div class="p-4">
                                 <h6 class="bold font-l">Aline De Souza</h6>
                                 <p class="small mt-0 text-primary text-uppercase mb-5">Marketing Director</p>
                                 <blockquote class="team-quote pt-1">
                                    <i class="quote fas fa-quote-left"></i>
                                    <p class="italic pl-4">The girl that influences our products.</p>
                                 </blockquote>
                                 <hr class="w-25 mt-5">
                                 <nav class="nav"><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-facebook text-secondary"></i> </a><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-twitter text-secondary"></i> </a><a href="javascript:;" class="nav-item nav-link pb-0"><i class="fab fa-dribbble text-secondary"></i></a></nav>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"></div>
            <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"></div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 4"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 5"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 6"></span></div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
         </div>
      </div>
   </section>
   <!-- ./Brands -->
   <section class="section bg-light">
      <div class="container">
         <h4 class="bold text-center mb-5 text-secondary">They trust us</h4>
         <div class="row gap-y">
            <div class="col-md-3 col-xs-4 col-6 px-md-5"><img src="img/logos/1.png" alt="" class="img-responsive mx-auto op-7" style="max-height: 60px;"></div>
            <div class="col-md-3 col-xs-4 col-6 px-md-5"><img src="img/logos/2.png" alt="" class="img-responsive mx-auto op-7" style="max-height: 60px;"></div>
            <div class="col-md-3 col-xs-4 col-6 px-md-5"><img src="img/logos/3.png" alt="" class="img-responsive mx-auto op-7" style="max-height: 60px;"></div>
            <div class="col-md-3 col-xs-4 col-6 px-md-5"><img src="img/logos/4.png" alt="" class="img-responsive mx-auto op-7" style="max-height: 60px;"></div>
         </div>
      </div>
   </section>
   <!-- ./Join - As Developer/Designer -->
   <section class="section bg-light">
      <div class="container bring-to-front py-0">
         <div class="shadow bg-contrast p-5 rounded">
            <div class="row gap-y align-items-center text-center text-lg-left">
               <div class="col-12 col-md-6 py-4 px-5 b-md-r">
                  <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star stroke-primary">
                     <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                  </svg>
                  <a href="javascript:;" class="mt-4 text-primary d-flex align-items-center">
                     <h4 class="mr-3">Join as Designer</h4>
                     <i class="fas fa-long-arrow-alt-right"></i>
                  </a>
                  <p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, consequuntur fugit minima natus optio quisquam sint sunt? Earum harum in laudantium nobis obcaecati odio, praesentium, quis sequi soluta vel veniam.</p>
               </div>
               <div class="col-12 col-md-6 py-4 px-5">
                  <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code stroke-info">
                     <polyline points="16 18 22 12 16 6"></polyline>
                     <polyline points="8 6 2 12 8 18"></polyline>
                  </svg>
                  <a href="javascript:;" class="mt-4 text-info d-flex align-items-center">
                     <h4 class="mr-3">Join as Developer</h4>
                     <i class="fas fa-long-arrow-alt-right"></i>
                  </a>
                  <p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, consequuntur fugit minima natus optio quisquam sint sunt? Earum harum in laudantium nobis obcaecati odio, praesentium, quis sequi soluta vel veniam.</p>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- ./Newsletter Form -->
   <section class="section bg-contrast edge top-left b-b">
      <div class="container">
         <div class="row">
            <div class="col-md-6 b-md-r">
               <h2>DashCore official <span class="bold">Newsletter</span></h2>
            </div>
            <div class="col-md-5 ml-md-auto">
               <form action="srv/register.php" class="form" data-response-message-animation="slide-in-left" novalidate="novalidate">
                  <div class="input-group">
                     <input type="email" name="Subscribe[email]" class="form-control rounded-circle-left" placeholder="Enter your email" required="">
                     <div class="input-group-append"><button class="btn btn-rounded btn-info" type="submit">Register</button></div>
                  </div>
               </form>
               <div class="response-message">
                  <i class="fas fa-envelope font-lg"></i>
                  <p class="font-md m-0">Check your email</p>
                  <p class="response">We sent you an email with a link to get started. You’ll be in your account in no time.</p>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
@endsection
