<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>{{ $offer->title }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="keywords here" name="keywords">
    <meta content="Farih Anas" name="author">
    <meta content="Dashboard of management employees" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <!-- Stylesheet Files -->
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Poppins:100,300,400,700,900') }}" rel="stylesheet">
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Caveat') }}" rel="stylesheet">
        <link href="{{ asset('icon_fonts_assets/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">

    <!-- themeforest:css -->
    <link rel="stylesheet" href="{{ asset('site/assets/skin2/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/skin2/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/skin2/css/cookieconsent.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/skin2/css/fontawesome-all.css') }}">
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
    <link rel="stylesheet" href="{{ asset('site/assets/skin2/css/styles.css') }}">
    <!-- End - Stylesheet Files -->
</head>

<body>
    <!-- ./Page header -->
    <header class="parallax image-background center-bottom cover overlay gradient gradient-53 alpha-8 color-1">
        <div class="container overflow-hidden">
            <div class="row">
                <div class="header-details">
                    <div class="logo">
                        <img src="{{ asset('img/logo.png') }}" alt="logo">
                    </div>
                    <div class="header-info">
                        <h1 class="offer-title">{{ $offer->title }}</h1>
                        <div class="location">
                            <i class="icon-location-pin"></i>
                            <span>{{ $offer->city }}, {{ $offer->country->country }}</span>
                        </div><br>
                        <div class="location">
                            <i class="icon-calendar"></i>
                            <span>Posted on : {{ (new DateTime($offer->updated_at))->format('M d,Y') }}</span>
                        </div>
                        <ul class="list-details">
                            <li>
                                <span>Company: </span>
                                <h3>{{ $company }}</h3>
                            </li>
                            <li>
                                <span>Position Type: </span>
                                <h3>{{ $offer->type }}</h3>
                            </li>
                            <li>
                                <span>Compentation: </span>
                                <h3>@if($offer->compentation) Negociation @else {{ $offer->compentation }} @endif</h3>
                            </li>
                        </ul>
                        <button class="btn btn-primary " type="button"> Apply</button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ./Design features -->
    <section id="features" class="section">
        <div class="container">
            @include('layouts.flash')
            <div class="section-heading aos-init aos-animate" data-aos="zoom-in">
                <h2 class="heading">Post description : </h2>
                <p class="">{!! $offer->description !!}</p>
            </div>
            <div class="section-heading aos-init aos-animate" data-aos="zoom-in">
                <h2 class="heading">Qualifications : </h2>
                    <p class="">{!! $offer->qualifications !!}</p>
            </div>
            <div class="section-heading aos-init aos-animate" data-aos="zoom-in">
                <h2 class="heading">Experience : </h2>
                    <p class="">@if($offer->experience == 'mid_level') Mid Level @else {{ ucfirst($offer->experience) }} @endif</p>
            </div>
        </div>
    </section>
    <!-- ./Features - hover animated -->
    <section class="section bg-6 bg-6-gradient edge bottom-right">
        <div class="container bring-to-front">
            <div class="section-heading text-center">
                <h2>Applicant form</h2>
            </div>
            <div class="row gap-y">
                <div class="col-sm-12">
                    <div class="element-box">
                        <form action="{{ route('apply-offer', $account) }}" enctype="multipart/form-data" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="offer" value="{{ $offer->link }}">
                            <div class="form-desc">
                                Fill all required fileds and submit form.
                            </div>
                            <fieldset class="form-group">
                                <legend><span>Personal Information</span></legend>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for=""> First Name *</label><input class="form-control" placeholder="" required="required" type="text" name="first_name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for=""> Last Name *</label><input class="form-control" placeholder="" required="required" type="text" name="last_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for=""> Email address *</label><input class="form-control" placeholder="Enter email" required="required" type="email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for=""> Phone Number *</label><input class="form-control" placeholder="" required="required" type="text" name="phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for=""> Country</label>
                                            <select class="form-control" name="country">
                                                @forelse($countries as $country)
                                                <option value="{{ $country->id }}">{{ ucfirst($country->country) }} ({{ strtoupper($country->code) }})</option>
                                                @empty
                                                <option disabled="">No Countries</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for=""> City *</label><input class="form-control" placeholder="" required="required" type="text" name="city">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for=""> Address *</label><textarea class="form-control" name="address" id="address"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <legend><span>Details</span></legend>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for=""> Picture (optional)</label><input class="form-control" placeholder="Browse picture" type="file" name="picture">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for=""> Resume *</label><input class="form-control" placeholder="Browse resume" required="required" type="file" name="resume">
                                        </div>
                                    </div>
                                    @if($offer->cover_letter != 0)
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for=""> Cover Letter @if($offer->cover_letter == 2) * @endif</label>
                                            <textarea cols="80" id="ckeditor1" name="ckeditor1" rows="10" @if($offer->cover_letter == 2) required @endif></textarea>
                                        </div>
                                    </div>
                                    @endif
                                    @if($offer->portfolio != 0)
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for=""> Portfolio @if($offer->portfolio == 2) * @endif</label>
                                            <textarea cols="80" id="ckeditor2" name="ckeditor2" rows="10" @if($offer->portfolio == 2) required @endif></textarea>
                                        </div>
                                    </div>
                                    @endif
                                    @if($offer->desired_salary != 0)
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for=""> Desired salary @if($offer->desired_salary == 2) * @endif</label><input class="form-control" required="required" @if($offer->desired_salary == 2) required @endif type="text" name="desired_salary">
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </fieldset>
							@if($offer->offerquestions)
							<fieldset class="form-group">
                                <legend><span>Questions</span></legend>
                                <div class="row">
									@forelse($offer->offerquestions->sortBy('required') as $question)
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for=""> <strong>{{$question->question}}</strong> @if($question->required=='0') (optional) @else (required) @endif</label><input class="form-control" placeholder="Answer Here" type="text" name="responses[{{$question->id}}]" @if($question->required=='1') required @endif>
                                        </div>
                                    </div>
									@empty
									@endforelse
								</div>
                            </fieldset>
							@endif
                            <div class="form-check" style="margin-top: auto;">
                                <label>
                                    <input type="checkbox" name="check"> <span class="label-text">I agree to terms and conditions</span>
                                </label>
                            </div>
                            <div class="form-buttons-w">
                                <button class="btn btn-primary" type="submit"> Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style type="text/css">
        .bg-6.edge.top-left::before {
        background-image: url(data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' preserveAspect…y='1'%3E%3Cpolygon points='0,250 100,250 100,0'%3E%3C/polygon%3E%3C/svg%3E);
        background-position: center center;
        background-repeat: no-repeat;
        background-size: 100% 100%;
        content: '';
        height: 0%;
        left: 0;
        position: absolute;
        right: 0;
        width: 100%;
        z-index: 1;
        top: -250px;
        }
        .image-background.contain {
        background-size: contain;
        height: 203px;
        }
    </style>
</body>
<style>
    .header-details {
        width: -webkit-fill-available;
        display: flex;
        padding: 45px 30px;
        margin-bottom: 30px;
    }
    .logo {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 200px;
        height: 200px;
    }
    .header-info {
        width: calc(100% - 150px);
        padding-left: 50px;
    }
    .main-details .details-content .header-details .offer-title {
        font-size: 25px;
        text-transform: uppercase;
        color: #165aa2;
        font-weight: 600;
        margin: 0 0 15px;
    }
    .location {
        display: inline-flex;
        align-items: center;
        justify-content: space-between;
    }
    .location span {
        margin-left: 8px;
        font-weight: 600;
        font-size: 16px;
    }
    .list-details {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 0 40px;
    }
    .list-details li {
        display: flex;
        flex-direction: column;
    }
    .list-details li span {
        font-weight: 600;
        color: #8b8b8b;
        margin-bottom: 8px;
        font-size: 16px;
    }
    .list-details li h3 {
        color: #000;
        font-weight: 700;
        font-size: 16px;
    }
    .heading {
        margin: 30px 0;
        font-size: 17px;
        font-weight: 700;
        color: #343434;
    }
</style>
<style>
    /*form*/
    .element-box {
        padding: 1.5rem 2rem;
        margin-bottom: 1rem;
    }
    .element-box {
        border-radius: 6px;
        background-color: #fff;
        -webkit-box-shadow: 0px 2px 4px rgba(126, 142, 177, 0.12);
        box-shadow: 0px 2px 4px rgba(126, 142, 177, 0.12);
    }
    .element-box {
        -webkit-animation-name: fadeUp;
        animation-name: fadeUp;
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
    }
    .form-header {
        margin-bottom: 1rem;
        padding-top: 0.5rem;
        display: block;
    }
    .form-desc {
        color: #999;
        margin-bottom: 1.5rem;
        font-weight: 300;
        font-size: 0.9rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        display: block;
    }
    fieldset {
        margin-top: 2rem;
    }
    fieldset {
        min-width: 0;
        padding: 0;
        margin: 0;
        border: 0;
    }
    legend {
        display: block;
        width: 100%;
        max-width: 100%;
        padding: 0;
        margin-bottom: .5rem;
        font-size: 1.5rem;
        line-height: inherit;
        color: inherit;
        white-space: normal;
    }

    legend {
        font-size: 0.99rem;
        display: block;
        margin-bottom: 1.5rem;
        position: relative;
        color: #047bf8;
    }
    legend span {
        padding: 0px 0.5rem 0 0;
        background-color: #fff;
        display: inline-block;
        z-index: 2;
        position: relative;
    }
    .form-buttons-w {
        margin-top: 1.5rem;
        padding-top: 1rem;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
    }
</style>
<script src="{{ asset('site/assets/skin2/js/jquery.js') }}"></script>
<script src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script>
<script>
    if ($('#ckeditor1').length) {
        CKEDITOR.replace('ckeditor1');
    }
    if ($('#ckeditor2').length) {
        CKEDITOR.replace('ckeditor2');
    }
</script>
</html>
