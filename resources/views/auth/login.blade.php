@extends('layouts.auth')

@section('content')
<div class="container-fluid">
    <div class="row align-items-center">
        <div class="col-md-6 col-lg-7 fullscreen-md d-flex justify-content-center align-items-center overlay gradient gradient-53 alpha-7 image-background cover" style="background-image:url(http://beta.textwik.com/assets/skin/img/login-img.png)">
            <div class="content">
                <h2 class="display-4 display-md-3 color-1 mt-4 mt-md-0">Welcome to <span class="bold d-block">EmpWik</span></h2>
                <p class="lead color-1 alpha-5">Login to your account</p>
                <hr class="mt-md-6 w-25">
                <div class="d-flex flex-column">
                    <p class="small bold color-1">Or sign in with</p>
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
                <h1 class="bold">Login</h1>
                <p class="color-2 mt-0 mb-4 mb-md-6">Don't have an account yet? <a href="{{ route('register') }}" class="accent bold">Create it here</a></p>
                <!--Form-->
                <form method="post" accept-charset="utf-8" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div id="validationMessages" style="display:none"></div>
                    <label class="control-label bold small text-uppercase color-2">Email</label>
                    <div class="form-group has-icon{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="input text">
                            <input type="text" name="email" class="form-control form-control-rounded" placeholder="Email" value="{{ old('email') }}" required="required">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div><i class="icon fas fa-user"></i>
                    </div>
                    <label class="control-label bold small text-uppercase color-2">Password</label>
                    <div class="form-group has-icon{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="input password">
                            <input type="password" name="password" onkeypress="submitOnEnter(this, event);" class="form-control form-control-rounded" placeholder="Password" required="required" id="user-passwrd">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div><i class="icon fas fa-lock"></i>
                    </div>
                    <div class="text-center text-muted custom-checkbox" style="float: left;">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" style="padding-bottom: 1em;width:100%;margin-left: 25%;" name="remember">Remember me</label>
                    </div>
                    <br>
                    <div class="form-group d-flex align-items-center justify-content-between" style="margin-top: 30px;">
						@if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
						<div class="ajax-button">
                            <button type="submit" class="btn btn-accent btn-rounded">Login <i class="fas fa-long-arrow-alt-right ml-2"></i></button>
                        </div>
                    </div>
                </form>
                <!--Form - End-->
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function submitOnEnter(inputElement, event) {
        if (event.keyCode == 13) {
            inputElement.form.submit();
        }
    }
</script>
<style>
    body{
        /*color: #949699 !important;*/
        font-family: Poppins,sans-serif !important;
    }
    .custom-control-input {
        position: absolute;
        z-index: 1;
    }
    .mb-md-6 {
        margin-bottom: 2rem !important;
    }
    .btn-accent {
        color: #fff !important;
        background-color: #34d085 !important;
        border-color: #34d085 !important;
    }
    .fullscreen-md {
        min-height: 101vh;
    }
    .btn {
        transition: all .3s ease !important;
        text-decoration: none !important;
        letter-spacing: 1.45px !important;
        font-family: Poppins,sans-serif !important;
        font-weight: 400 !important;
        text-transform: uppercase !important;
        padding: .5rem 1.25rem !important;
        font-size: .75rem !important;
        line-height: 1.5 !important;
        white-space: normal!important;
        text-align: left!important;
        border-radius: 25rem !important;
    }
    ::placeholder {
        color: #d1d2d3 !important;
    }
    .input {
        width: -webkit-fill-available;
    }
</style>

@endsection
