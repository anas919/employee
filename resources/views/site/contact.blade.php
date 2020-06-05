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
                    <h1 class="regular display-4 color-1 mb-4">Contact Us </h1>
                    <p class="lead color-1">Here are the answers to some of the most common questions we hear from our appreciated customers.</p>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid py-3 demo-blocks">
       <!-- ./Contact -->
       <section class="section block bg-contrast">
          <div class="container py-4">
             <div class="row gap-y">
                <div class="col-12 col-md-6">
                   <div class="section-heading">
                      <p class="text-uppercase">Contact us</p>
                      <h2 class="font-md bold">We'd like to hear from you</h2>
                   </div>
                   <p class="lead mb-5">Don't hesitate to get in contact with us no matter your request. We are here to help you.</p>
                   <ul class="list-unstyled list-icon">
                      <li>
                         <i class="fas fa-map-marker text-primary"></i>
                         <p>123 Street, City, Country</p>
                      </li>
                      <li>
                         <i class="fas fa-phone text-primary"></i>
                         <p>(123) 456-7890</p>
                      </li>
                      <li>
                         <i class="fas fa-envelope text-primary"></i>
                         <p><a href="mailto:support@5studios.net">support@5studios.net</a></p>
                      </li>
                   </ul>
                </div>
                <div class="col-12 col-md-6">
                   <form action="srv/contact.php" method="post" class="form form-contact" name="form-contact" data-response-message-animation="slide-in-up" novalidate="novalidate">
                      <div class="form-group"><label for="contact_email" class="bold mb-0">Email address</label> <small id="emailHelp" class="form-text text-secondary mt-0 mb-2 italic">We'll never share your email with anyone else.</small> <input type="email" name="Contact[email]" id="contact_email" class="form-control bg-contrast" placeholder="Valid Email" required=""></div>
                      <div class="form-group"><label for="contact_email" class="bold">Subject</label> <input type="text" name="Contact[subject]" id="contact_subject" class="form-control bg-contrast" placeholder="Subject" required=""></div>
                      <div class="form-group"><label for="contact_email" class="bold">Message</label> <textarea name="Contact[message]" id="contact_message" class="form-control bg-contrast" placeholder="What do you want to let us know?" rows="8" required=""></textarea></div>
                      <div class="form-group"><button id="contact-submit" data-loading-text="Sending..." name="submit" type="submit" class="btn btn-primary btn-rounded">Send Message</button></div>
                   </form>
                   <div class="response-message">
                      <div class="section-heading">
                         <i class="fas fa-check font-lg"></i>
                         <p class="font-md m-0">Thank you!</p>
                         <p class="response">Your message has been send, we will contact you as soon as possible.</p>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </section>
    </div>
</main>
@endsection
