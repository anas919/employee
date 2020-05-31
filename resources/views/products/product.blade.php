@extends('layouts.products')

@section('content')
<main >
        
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
                        <h1 class="regular display-4 color-1 mb-4">In-app Messaging </h1>
                        <p class="lead color-1">Here are the answers to some of the most common questions we hear from our appreciated customers.</p>
                    </div>
                </div>
            </div>
        </header>

        
    
        <section class="section bg-6 edge bottom-right">
            <div class="container bring-to-front">
                <div class="section-heading text-center">
                    <h2>A solution for every need</h2>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aperiam atque dicta dignissimos eius excepturi fuga laudantium libero nam nihil, obcaecati pariatur quaerat quam, quia quisquam repudiandae sed tenetur veniam!</p>
                </div>
                <div class="row align-items-center gap-y">
                    <div class="col-md-6 col-lg-5 text-center text-md-left">
                        <ul class="list-unstyled">
                            <li class="media d-block d-lg-flex">
                                <i class="pe pe-3x pe-7s-plugin accent icon-lg mr-3 text-lg-right"></i>
                                <div class="media-body mt-3 mt-lg-0 text-center text-md-left">
                                    <h5 class="bold color-5">Full Code</h5>
                                    <p class="mt-0 mb-5">DashCore comes with fully documented HTML, SASS, JS, PHP code, all in a well organized and structured way.</p>
                                </div>
                            </li>
                            <li class="media d-block d-lg-flex">
                                <i class="pe pe-3x pe-7s-tools accent icon-lg mr-3 text-lg-right"></i>
                                <div class="media-body mt-3 mt-lg-0 text-center text-md-left">
                                    <h5 class="bold color-5">Free Updates</h5>
                                    <p class="mt-0 mb-5">You'll get lifetime free updates as we improve or add new features.</p>
                                </div>
                            </li>
                            <li class="media d-block d-lg-flex">
                                <i class="pe pe-3x pe-7s-medal accent icon-lg mr-3 text-lg-right"></i>
                                <div class="media-body mt-3 mt-lg-0 text-center text-md-left">
                                    <h5 class="bold color-5">Premium Support</h5>
                                    <p class="mt-0">In case you need it, We got you covered, with our premium quality fast support service.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-5 ml-md-auto">
                        <div class="shadow card">
                            <div class="card-header overlay gradient gradient-34 alpha-5 image-background cover" style="background-image: url(img/screens/dash/4.png)">
                                <div class="content">
                                    <h2 class="mt-9 color-1 light">Dashboard Included</h2>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>Our template is packed with a
                                    <span class="bold">Starter Admin Dashboard</span> to help you get started right away with your project. You'll have not a beautiful HTML template to promote your product but a starting point admin template</p>
                                <a href="admin/" class="btn btn-accent btn-rounded mt-4">Try the Dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

          <section class="section">
            <div class="container bring-to-front">
                <div class="shadow rounded text-center overlay overlay-5 alpha-8 color-1 p-5 image-background cover" style="background-image: url(https://picsum.photos/350/200/?random&amp;gravity=south)">
                    <div class="content">
                        <div class="section-heading">
                            <h2 class="color-1">Discover how DashCore works</h2>
                        </div>
                        <p class="handwritten highlight font-md">Play the video</p>
                        <a href="https://www.youtube.com/watch?v=MXghcI8hcWU" class="modal-popup mfp-iframe btn btn-circle btn-lg btn-accent" data-effect="mfp-fade">
                            <i class="pe pe-7s-play pe-2x ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

          
    </main>
@endsection