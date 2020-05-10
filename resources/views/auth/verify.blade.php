@extends('layouts.auth')

@section('content')
<div class="container-fluid">
    <div class="row align-items-center">
        <div class="col-md-6 col-lg-7 fullscreen-md d-flex justify-content-center align-items-center overlay gradient gradient-53 alpha-7 image-background cover" style="background-image:url(http://beta.textwik.com/assets/skin/img/login-img.png)">
            <div class="content">
                <h2 class="display-4 display-md-3 color-1 mt-4 mt-md-0">Welcome to <span class="bold d-block">TextWik</span></h2>
                <p class="lead color-1 alpha-5">Account verification</p>
                <hr class="mt-md-6 w-25">
                <div class="d-flex flex-column">
                    <p class="small bold color-1">Sign up with</p>
                    <nav class="nav mb-4">
                        <a class="btn btn-rounded btn-outline-2 brand-facebook mr-2" href="#"><i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="btn btn-rounded btn-outline-2 brand-twitter mr-2" href="#"><i class="fab fa-twitter"></i>
                        </a>
                        <a class="btn btn-rounded btn-outline-2 brand-linkedin" href="#"><i class="fab fa-linkedin-in"></i>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
        <div style="margin-bottom: auto;" class="col-md-5 col-lg-4 mx-auto">
            <div class="login-form mt-5 mt-md-0">
                <img src="{{ asset('site/assets/skin2/img/favicon.ico') }}" class="logo img-responsive mb-4 mb-md-6" alt="">
                <h1 class="color-5 bold">{{ __('Verify Your Email Address') }}</h1>
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif
                <p class="color-2 mt-0 mb-4 mb-md-6">{{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
					<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
