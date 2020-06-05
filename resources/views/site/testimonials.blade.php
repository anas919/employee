@extends('layouts.template')

@section('content')
<main>
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
                    <h1 class="regular display-4 color-1 mb-4">Faq's </h1>
                    <p class="lead color-1">Here are the answers to some of the most common questions we hear from our appreciated customers.</p>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid py-3 demo-blocks">
    <!-- ./Testimonials -->
    <section class="block bg-contrast">
      <div class="container py-4">
         <div class="section-heading text-center">
            <h5 class="text-secondary">Over 3,000 customers rely on DashCore</h5>
            <h2>Customer reviews</h2>
         </div>
         <div class="testimonials-slider">
            <div class="swiper-container swiper-container-initialized swiper-container-horizontal">
               <div class="swiper-wrapper text-center w-50" style="transform: translate3d(-3690px, 0px, 0px); transition-duration: 0ms;">
                  <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" data-swiper-slide-index="3" style="width: 1230px;">
                     <div class="d-flex flex-column align-items-center">
                        <img src="../img/avatar/4.jpg" alt="" class="rounded-circle shadow mb-4">
                        <p class="w-75 lead mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus asperiores consequatur cum distinctio, dolorem earum error esse ex fugiat inventore maiores minima, non placeat praesentium quam quas ut, vero voluptatem.</p>
                        <hr class="w-50">
                        <footer>
                           <cite class="bold text-primary text-uppercase">Jane Doe,</cite>
                           <p class="small text-secondary mt-0">Awesome Company</p>
                        </footer>
                     </div>
                  </div>
                  <div class="swiper-slide" data-swiper-slide-index="0" style="width: 1230px;">
                     <div class="d-flex flex-column align-items-center">
                        <img src="../img/avatar/1.jpg" alt="" class="rounded-circle shadow mb-4">
                        <p class="w-75 lead mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus asperiores consequatur cum distinctio, dolorem earum error esse ex fugiat inventore maiores minima, non placeat praesentium quam quas ut, vero voluptatem.</p>
                        <hr class="w-50">
                        <footer>
                           <cite class="bold text-primary text-uppercase">Jane Doe,</cite>
                           <p class="small text-secondary mt-0">Awesome Company</p>
                        </footer>
                     </div>
                  </div>
                  <div class="swiper-slide swiper-slide-prev" data-swiper-slide-index="1" style="width: 1230px;">
                     <div class="d-flex flex-column align-items-center">
                        <img src="../img/avatar/2.jpg" alt="" class="rounded-circle shadow mb-4">
                        <p class="w-75 lead mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus asperiores consequatur cum distinctio, dolorem earum error esse ex fugiat inventore maiores minima, non placeat praesentium quam quas ut, vero voluptatem.</p>
                        <hr class="w-50">
                        <footer>
                           <cite class="bold text-primary text-uppercase">Jane Doe,</cite>
                           <p class="small text-secondary mt-0">Awesome Company</p>
                        </footer>
                     </div>
                  </div>
                  <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="2" style="width: 1230px;">
                     <div class="d-flex flex-column align-items-center">
                        <img src="../img/avatar/3.jpg" alt="" class="rounded-circle shadow mb-4">
                        <p class="w-75 lead mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus asperiores consequatur cum distinctio, dolorem earum error esse ex fugiat inventore maiores minima, non placeat praesentium quam quas ut, vero voluptatem.</p>
                        <hr class="w-50">
                        <footer>
                           <cite class="bold text-primary text-uppercase">Jane Doe,</cite>
                           <p class="small text-secondary mt-0">Awesome Company</p>
                        </footer>
                     </div>
                  </div>
                  <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="3" style="width: 1230px;">
                     <div class="d-flex flex-column align-items-center">
                        <img src="../img/avatar/4.jpg" alt="" class="rounded-circle shadow mb-4">
                        <p class="w-75 lead mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus asperiores consequatur cum distinctio, dolorem earum error esse ex fugiat inventore maiores minima, non placeat praesentium quam quas ut, vero voluptatem.</p>
                        <hr class="w-50">
                        <footer>
                           <cite class="bold text-primary text-uppercase">Jane Doe,</cite>
                           <p class="small text-secondary mt-0">Awesome Company</p>
                        </footer>
                     </div>
                  </div>
                  <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="0" style="width: 1230px;">
                     <div class="d-flex flex-column align-items-center">
                        <img src="../img/avatar/1.jpg" alt="" class="rounded-circle shadow mb-4">
                        <p class="w-75 lead mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus asperiores consequatur cum distinctio, dolorem earum error esse ex fugiat inventore maiores minima, non placeat praesentium quam quas ut, vero voluptatem.</p>
                        <hr class="w-50">
                        <footer>
                           <cite class="bold text-primary text-uppercase">Jane Doe,</cite>
                           <p class="small text-secondary mt-0">Awesome Company</p>
                        </footer>
                     </div>
                  </div>
               </div>
               <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
            <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"></div>
            <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"></div>
         </div>
      </div>
    </section>
    <!-- ./Testimonials -->
    <section class="block bg-contrast">
      <div class="container py-4">
         <div class="section-heading text-center">
            <h2><span class="bold">Our clients</span> have a lot to say</h2>
         </div>
         <div class="swiper-container swiper-container-initialized swiper-container-horizontal" data-sw-navigation="#sw-nav-testimonials-1" data-sw-navigation-active="icon-lg" data-sw-active-selector="img">
            <div class="swiper-wrapper" style="transform: translate3d(-2460px, 0px, 0px); transition-duration: 0ms;">
               <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="3" style="width: 1230px;">
                  <figure class="icon company logo mockup"><img src="../img/logos/4.png" alt="" class="img-responsive mb-4"></figure>
                  <blockquote class="w-75 ml-4">
                     <i class="quote fas fa-quote-left"></i>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aut consectetur dignissimos dolor doloribus earum excepturi incidunt itaque maiores molestias natus pariatur, quasi quis soluta unde vel veritatis? Eligendi, voluptatibus</p>
                     <hr class="w-10 mt-5">
                     <footer class="author font-sm"><cite class="bold text-uppercase text-primary">Jane Doe</cite> | <span class="text-secondary italic">Marketing Director</span></footer>
                  </blockquote>
               </div>
               <div class="swiper-slide swiper-slide-prev" data-swiper-slide-index="0" style="width: 1230px;">
                  <figure class="icon company logo mockup"><img src="../img/logos/1.png" alt="" class="img-responsive mb-4"></figure>
                  <blockquote class="w-75 ml-4">
                     <i class="quote fas fa-quote-left"></i>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aut consectetur dignissimos dolor doloribus earum excepturi incidunt itaque maiores molestias natus pariatur, quasi quis soluta unde vel veritatis? Eligendi, voluptatibus</p>
                     <hr class="w-10 mt-5">
                     <footer class="author font-sm"><cite class="bold text-uppercase text-primary">Jane Doe</cite> | <span class="text-secondary italic">Marketing Director</span></footer>
                  </blockquote>
               </div>
               <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="1" style="width: 1230px;">
                  <figure class="icon company logo mockup"><img src="../img/logos/2.png" alt="" class="img-responsive mb-4"></figure>
                  <blockquote class="w-75 ml-4">
                     <i class="quote fas fa-quote-left"></i>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aut consectetur dignissimos dolor doloribus earum excepturi incidunt itaque maiores molestias natus pariatur, quasi quis soluta unde vel veritatis? Eligendi, voluptatibus</p>
                     <hr class="w-10 mt-5">
                     <footer class="author font-sm"><cite class="bold text-uppercase text-primary">Jane Doe</cite> | <span class="text-secondary italic">Marketing Director</span></footer>
                  </blockquote>
               </div>
               <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="2" style="width: 1230px;">
                  <figure class="icon company logo mockup"><img src="../img/logos/3.png" alt="" class="img-responsive mb-4"></figure>
                  <blockquote class="w-75 ml-4">
                     <i class="quote fas fa-quote-left"></i>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aut consectetur dignissimos dolor doloribus earum excepturi incidunt itaque maiores molestias natus pariatur, quasi quis soluta unde vel veritatis? Eligendi, voluptatibus</p>
                     <hr class="w-10 mt-5">
                     <footer class="author font-sm"><cite class="bold text-uppercase text-primary">Jane Doe</cite> | <span class="text-secondary italic">Marketing Director</span></footer>
                  </blockquote>
               </div>
               <div class="swiper-slide" data-swiper-slide-index="3" style="width: 1230px;">
                  <figure class="icon company logo mockup"><img src="../img/logos/4.png" alt="" class="img-responsive mb-4"></figure>
                  <blockquote class="w-75 ml-4">
                     <i class="quote fas fa-quote-left"></i>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aut consectetur dignissimos dolor doloribus earum excepturi incidunt itaque maiores molestias natus pariatur, quasi quis soluta unde vel veritatis? Eligendi, voluptatibus</p>
                     <hr class="w-10 mt-5">
                     <footer class="author font-sm"><cite class="bold text-uppercase text-primary">Jane Doe</cite> | <span class="text-secondary italic">Marketing Director</span></footer>
                  </blockquote>
               </div>
               <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev" data-swiper-slide-index="0" style="width: 1230px;">
                  <figure class="icon company logo mockup"><img src="../img/logos/1.png" alt="" class="img-responsive mb-4"></figure>
                  <blockquote class="w-75 ml-4">
                     <i class="quote fas fa-quote-left"></i>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aut consectetur dignissimos dolor doloribus earum excepturi incidunt itaque maiores molestias natus pariatur, quasi quis soluta unde vel veritatis? Eligendi, voluptatibus</p>
                     <hr class="w-10 mt-5">
                     <footer class="author font-sm"><cite class="bold text-uppercase text-primary">Jane Doe</cite> | <span class="text-secondary italic">Marketing Director</span></footer>
                  </blockquote>
               </div>
            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
         </div>
         <nav id="sw-nav-testimonials-1" class="nav nav-circle mt-4 align-items-center"><a class="nav-item nav-link" href="#" data-step="1"><img src="../img/avatar/1.jpg" alt="" class="rounded-circle shadow icon-md mr-0"> </a><a class="nav-item nav-link" href="#" data-step="2"><img src="../img/avatar/2.jpg" alt="" class="rounded-circle shadow icon-md mr-0 icon-lg"> </a><a class="nav-item nav-link" href="#" data-step="3"><img src="../img/avatar/3.jpg" alt="" class="rounded-circle shadow icon-md mr-0"> </a><a class="nav-item nav-link" href="#" data-step="4"><img src="../img/avatar/4.jpg" alt="" class="rounded-circle shadow icon-md mr-0"></a></nav>
      </div>
    </section>
    </div>
</main>
@endsection
