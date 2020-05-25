@extends('layouts.auth')

@section('content')
<?php

     $Option4=array('Afghanistan'=>'Afghanistan',
          'Albania'=>'Albania',
          'Algeria'=>'Algeria',
          'American Samoa'=>'American Samoa',
          'Andorra'=>'Andorra',
          'Angola'=>'Angola',
          'Anguilla'=>'Anguilla',
          'Antarctica'=>'Antarctica',
          'Antigua and Barbuda'=>'Antigua and Barbuda',
          'Argentina'=>'Argentina',
          'Armenia'=>'Armenia',
          'Aruba'=>'Aruba',
          'Australia'=>'Australia',
          'Austria'=>'Austria',
          'Azerbaijan'=>'Azerbaijan',
          'Bahamas'=>'Bahamas',
          'Bahrain'=>'Bahrain',
          'Bangladesh'=>'Bangladesh',
          'Barbados'=>'Barbados',
          'Belarus'=>'Belarus',
          'Belgium'=>'Belgium',
          'Belize'=>'Belize',
          'Benin'=>'Benin',
          'Bermuda'=>'Bermuda',
          'Bhutan'=>'Bhutan',
          'Bolivia'=>'Bolivia',
          'Bosnia and Herzegovina'=>'Bosnia and Herzegovina',
          'Botswana'=>'Botswana',
          'Bouvet Island'=>'Bouvet Island',
          'Brazil'=>'Brazil',
          'British Indian Ocean Territory'=>'British Indian Ocean Territory',
          'Brunei Darussalam'=>'Brunei Darussalam',
          'Bulgaria'=>'Bulgaria',
          'Burkina Faso'=>'Burkina Faso',
          'Burundi'=>'Burundi',
          'Cambodia'=>'Cambodia',
          'Cameroon'=>'Cameroon',
          'Canada'=>'Canada',
          'Cape Verde'=>'Cape Verde',
          'Cayman Islands'=>'Cayman Islands',
          'Central African Republic'=>'Central African Republic',
          'Chad'=>'Chad',
          'Chile'=>'Chile',
          'China'=>'China',
          'Christmas Island'=>'Christmas Island',
          'Cocos Keeling Islands'=>'Cocos Keeling Islands',
          'Colombia'=>'Colombia',
          'Comoros'=>'Comoros',
          'Congo'=>'Congo',
          'Congo The Democratic Republic of The'=>'Congo The Democratic Republic of The',
          'Cook Islands'=>'Cook Islands',
          'Costa Rica'=>'Costa Rica',
          'Croatia'=>'Croatia',
          'Cuba'=>'Cuba',
          'Cyprus'=>'Cyprus',
          'Czech Republic'=>'Czech Republic',
          'Denmark'=>'Denmark',
          'Djibouti'=>'Djibouti',
          'Dominica'=>'Dominica',
          'Dominican Republic'=>'Dominican Republic',
          'Ecuador'=>'Ecuador',
          'Egypt'=>'Egypt',
          'El Salvador'=>'El Salvador',
          'Equatorial Guinea'=>'Equatorial Guinea',
          'Eritrea'=>'Eritrea',
          'Estonia'=>'Estonia',
          'Ethiopia'=>'Ethiopia',
          'Falkland Islands Malvinas'=>'Falkland Islands Malvinas',
          'Faroe Islands'=>'Faroe Islands',
          'Fiji'=>'Fiji',
          'Finland'=>'Finland',
          'France'=>'France',
          'French Guiana'=>'French Guiana',
          'French Polynesia'=>'French Polynesia',
          'French Southern Territories'=>'French Southern Territories',
          'Gabon'=>'Gabon',
          'Gambia'=>'Gambia',
          'Georgia'=>'Georgia',
          'Germany'=>'Germany',
          'Ghana'=>'Ghana',
          'Gibraltar'=>'Gibraltar',
          'Greece'=>'Greece',
          'Greenland'=>'Greenland',
          'Grenada'=>'Grenada',
          'Guadeloupe'=>'Guadeloupe',
          'Guam'=>'Guam',
          'Guatemala'=>'Guatemala',
          'Guernsey'=>'Guernsey',
          'Guinea'=>'Guinea',
          'Guinea-bissau'=>'Guinea-bissau',
          'Guyana'=>'Guyana',
          'Haiti'=>'Haiti',
          'Heard Island and Mcdonald Islands'=>'Heard Island and Mcdonald Islands',
          'Honduras'=>'Honduras',
          'Hong Kong'=>'Hong Kong',
          'Hungary'=>'Hungary',
          'Iceland'=>'Iceland',
          'India'=>'India',
          'Indonesia'=>'Indonesia',
          'Iran Islamic Republic of'=>'Iran Islamic Republic of',
          'Iraq'=>'Iraq',
          'Ireland'=>'Ireland',
          'Isle of Man'=>'Isle of Man',
          'Israel'=>'Israel',
          'Italy'=>'Italy',
          'Jamaica'=>'Jamaica',
          'Japan'=>'Japan',
          'Jersey'=>'Jersey',
          'Jordan'=>'Jordan',
          'Kazakhstan'=>'Kazakhstan',
          'Kenya'=>'Kenya',
          'Kiribati'=>'Kiribati',
          'Korea Republic of'=>'Korea Republic of',
          'Kuwait'=>'Kuwait',
          'Kyrgyzstan'=>'Kyrgyzstan',
          'Latvia'=>'Latvia',
          'Lebanon'=>'Lebanon',
          'Lesotho'=>'Lesotho',
          'Liberia'=>'Liberia',
          'Libyan Arab Jamahiriya'=>'Libyan Arab Jamahiriya',
          'Liechtenstein'=>'Liechtenstein',
          'Lithuania'=>'Lithuania',
          'Luxembourg'=>'Luxembourg',
          'Macao'=>'Macao',
          'Macedonia The Former Yugoslav Republic of'=>'Macedonia The Former Yugoslav Republic of',
          'Madagascar'=>'Madagascar',
          'Malawi'=>'Malawi',
          'Malaysia'=>'Malaysia',
          'Maldives'=>'Maldives',
          'Mali'=>'Mali',
          'Malta'=>'Malta',
          'Marshall Islands'=>'Marshall Islands',
          'Martinique'=>'Martinique',
          'Mauritania'=>'Mauritania',
          'Mauritius'=>'Mauritius',
          'Mayotte'=>'Mayotte',
          'Mexico'=>'Mexico',
          'Micronesi Federated States of'=>'Micronesia Federated States of',
          'Moldova Republic of'=>'Moldova Republic of',
          'Monaco'=>'Monaco',
          'Mongolia'=>'Mongolia',
          'Montenegro'=>'Montenegro',
          'Montserrat'=>'Montserrat',
          'Morocco'=>'Morocco',
          'Mozambique'=>'Mozambique',
          'Myanmar'=>'Myanmar',
          'Namibia'=>'Namibia',
          'Nauru'=>'Nauru',
          'Nepal'=>'Nepal',
          'Netherlands'=>'Netherlands',
          'Netherlands Antilles'=>'Netherlands Antilles',
          'New Caledonia'=>'New Caledonia',
          'New Zealand'=>'New Zealand',
          'Nicaragua'=>'Nicaragua',
          'Niger'=>'Niger',
          'Nigeria'=>'Nigeria',
          'Niue'=>'Niue',
          'Norfolk Island'=>'Norfolk Island',
          'Northern Mariana Islands'=>'Northern Mariana Islands',
          'Norway'=>'Norway',
          'Oman'=>'Oman',
          'Pakistan'=>'Pakistan',
          'Palau'=>'Palau',
          'Palestinian Territory Occupied'=>'Palestinian Territory Occupied',
          'Panama'=>'Panama',
          'Papua New Guinea'=>'Papua New Guinea',
          'Paraguay'=>'Paraguay',
          'Peru'=>'Peru',
          'Philippines'=>'Philippines',
          'Pitcairn'=>'Pitcairn',
          'Poland'=>'Poland',
          'Portugal'=>'Portugal',
          'Puerto Rico'=>'Puerto Rico',
          'Qatar'=>'Qatar',
          'Reunion'=>'Reunion',
          'Romania'=>'Romania',
          'Russian Federation'=>'Russian Federation',
          'Rwanda'=>'Rwanda',
          'Saint Helena'=>'Saint Helena',
          'Saint Kitts and Nevis'=>'Saint Kitts and Nevis',
          'Saint Lucia'=>'Saint Lucia',
          'Saint Pierre and Miquelon'=>'Saint Pierre and Miquelon',
          'Saint Vincent and The Grenadines'=>'Saint Vincent and The Grenadines',
          'Samoa'=>'Samoa',
          'San Marino'=>'San Marino',
          'Sao Tome and Principe'=>'Sao Tome and Principe',
          'Saudi Arabia'=>'Saudi Arabia',
          'Senegal'=>'Senegal',
          'Serbia'=>'Serbia',
          'Seychelles'=>'Seychelles',
          'Sierra Leone'=>'Sierra Leone',
          'Singapore'=>'Singapore',
          'Slovakia'=>'Slovakia',
          'Slovenia'=>'Slovenia',
          'Solomon Islands'=>'Solomon Islands',
          'Somalia'=>'Somalia',
          'South Africa'=>'South Africa',
          'South Georgia and The South Sandwich Islands'=>'South Georgia and The South Sandwich Islands',
          'Spain'=>'Spain',
          'Sri Lanka'=>'Sri Lanka',
          'Sudan'=>'Sudan',
          'Suriname'=>'Suriname',
          'Svalbard and Jan Mayen'=>'Svalbard and Jan Mayen',
          'Swaziland'=>'Swaziland',
          'Sweden'=>'Sweden',
          'Switzerland'=>'Switzerland',
          'Syrian Arab Republic'=>'Syrian Arab Republic',
          'Taiwan, Province of China'=>'Taiwan, Province of China',
          'Tajikistan'=>'Tajikistan',
          'Tanzania, United Republic of'=>'Tanzania, United Republic of',
          'Thailand'=>'Thailand',
          'Timor-leste'=>'Timor-leste',
          'Togo'=>'Togo',
          'Tokelau'=>'Tokelau',
          'Tonga'=>'Tonga',
          'Trinidad and Tobago'=>'Trinidad and Tobago',
          'Tunisia'=>'Tunisia',
          'Turkey'=>'Turkey',
          'Turkmenistan'=>'Turkmenistan',
          'Turks and Caicos Islands'=>'Turks and Caicos Islands',
          'Tuvalu'=>'Tuvalu',
          'Uganda'=>'Uganda',
          'Ukraine'=>'Ukraine',
          'United Arab Emirates'=>'United Arab Emirates',
          'United Kingdom'=>'United Kingdom',
          'United States'=>'United States',
          'United States Minor Outlying Islands'=>'United States Minor Outlying Islands',
          'Uruguay'=>'Uruguay',
          'Uzbekistan'=>'Uzbekistan',
          'Vanuatu'=>'Vanuatu',
          'Venezuela'=>'Venezuela',
          'Viet Nam'=>'Viet Nam',
          'Virgin Islands - British'=>'Virgin Islands - British',
          'Virgin Islands - U.S.'=>'Virgin Islands - U.S.',
          'Wallis and Futuna'=>'Wallis and Futuna',
          'Western Sahara'=>'Western Sahara',
          'Yemen'=>'Yemen',
          'Zambia'=>'Zambia',
          'Zimbabwe'=>'Zimbabwe'
     );
?>
<div class="container-fluid">
     <div class="row align-items-center">
          <div class="col-md-6 col-lg-7 fullscreen-md d-flex justify-content-center align-items-center overlay gradient gradient-53 alpha-7 image-background cover" style="background-image:url(http://beta.textwik.com/assets/skin/img/login-img.png);">
               <div style="margin-top: 15%;" class="content">
                    <h2 class="display-4 display-md-3 color-1 mt-4 mt-md-0">Welcome to <span class="bold d-block">ManageEmp</span></h2>
                    {{-- <p class="lead color-1 alpha-5">Login to your account</p>
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
                    </div> --}}
               </div>
          </div>
          <div  class="col-md-5 col-lg-4 mx-auto">
               <div class="login-form mt-5 mt-md-0">
                    <img src="{{ asset('app/webroot/assets/skin2/img/textwik-logo.png') }}" class="logo img-responsive mb-4 mb-md-6" alt="">
                    <h1 class="color-5 bold">Register</h1>
                    <p class="color-2 mb-4 mb-md-6">Already have an account? <a href="{{ route('login') }}" class="accent bold">Sign In</a></p>
                    <div id="validationMessages" class="alert alert-danger" style="display:none"></div>
                    <!--Form-->
                    <form  accept-charset="utf-8" name="frmRegister" id="frmRegister" class="cozy" method="POST" action="{{ route('register') }}">
                         {{ csrf_field() }}
                         <input type="hidden" name="src" value="true">
                         <div class="row row-bordered">
                              <div class="col-md-6{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                   <label class="control-label bold small text-uppercase color-2">First Name</label>
                                   <div class="form-group has-icon">
                                        <div class="input text">
                                             <input type="text" name="first_name" class="form-control form-control-rounded" placeholder="First Name" value="{{ old('first_name') }}">
                                             @if ($errors->has('name'))
                                                  <span class="help-block">
                                                       <strong>{{ $errors->first('name') }}</strong>
                                                  </span>
                                             @endif
                                        </div>
                                        <i class="icon fas fa-user"></i>
                                   </div>
                              </div>
                              <div class="col-md-6{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                   <label class="control-label bold small text-uppercase color-2">Last Name</label>
                                   <div class="form-group has-icon">
                                        <div class="input text">
                                             <input type="text" name="last_name" class="form-control form-control-rounded" placeholder="Last Name" value="{{ old('last__name') }}">
                                             @if ($errors->has('last_name'))
                                                  <span class="help-block">
                                                       <strong>{{ $errors->first('last_name') }}</strong>
                                                  </span>
                                             @endif
                                        </div>
                                        <i class="icon fas fa-user"></i>
                                   </div>
                              </div>
                              <div class="col-md-12{{ $errors->has('email') ? ' has-error' : '' }}">
                                   <label class="control-label bold small text-uppercase color-2">Email</label>
                                   <div class="form-group has-icon">
                                        <div class="input email">
                                             <input type="email" name="email" class="form-control form-control-rounded" placeholder="Email" value="{{ $email }}">
                                             @if ($errors->has('email'))
                                                  <span class="help-block">
                                                       <strong>{{ $errors->first('email') }}</strong>
                                                  </span>
                                             @endif
                                        </div><i class="icon fas fa-envelope"></i>
                                   </div>
                              </div>
                              <div class="col-md-12{{ $errors->has('phone') ? ' has-error' : '' }}">
                                   <label class="control-label bold small text-uppercase color-2">Phone</label>
                                   <div class="form-group has-icon">
                                        <div class="input tel">
                                             <input type="tel" name="phone" class="form-control form-control-rounded" value="{{ old('phone') }}">
                                             @if ($errors->has('phone'))
                                                  <span class="help-block">
                                                       <strong>{{ $errors->first('phone') }}</strong>
                                                  </span>
                                             @endif
                                        </div><i class="icon fas fa-phone"></i>
                                   </div>
                              </div>
                              <div class="col-md-12{{ $errors->has('password') ? ' has-error' : '' }}">
                                   <label class="control-label bold small text-uppercase color-2">Password</label>
                                   <div class="form-group has-icon">
                                        <div class="input password">
                                             <input type="password" name="password" class="form-control form-control-rounded" placeholder="Password">
                                             @if ($errors->has('password'))
                                                  <span class="help-block">
                                                       <strong>{{ $errors->first('password') }}</strong>
                                                  </span>
                                             @endif
                                        </div><i class="icon fas fa-lock"></i>
                                   </div>
                              </div>
                              <div class="col-md-12{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                   <label class="control-label bold small text-uppercase color-2">Confirm password</label>
                                   <div class="form-group has-icon">
                                        <div class="input password">
                                             <input type="password" name="password_confirmation" class="form-control form-control-rounded" placeholder="Confirm password">
                                             @if ($errors->has('password_confirmation'))
                                                  <span class="help-block">
                                                       <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                  </span>
                                             @endif
                                        </div><i class="icon fas fa-lock"></i>
                                   </div>
                              </div>
                              <div class="form-group d-flex align-items-center justify-content-between">
                                   <div class="col-md-12">
                                        <button type="submit" class="btn btn-accent btn-rounded ">Register <i class="fas fa-long-arrow-alt-right ml-2"></i></button>
                                   </div>
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
             position: unset;
             z-index: 1;
             opacity: 1;
         }
     .mb-md-6 {
         margin-bottom: 4rem !important;
     }
     ::-webkit-scrollbar {
          display: none;
     }
     @media only screen and (min-device-width : 320px) and (max-device-width : 480px){
          .ml-auto, .mx-auto{
              height: auto;
              overflow-y: hidden;
          }
     }
     @media (min-width: 1281px) {
          .ml-auto, .mx-auto {
              margin-left: auto !important;
              height: 600px;
              overflow-y: scroll;
          }
     }
     .btn-accent {
          color: #fff !important;
          background-color: #9f55ff !important;
          border-color: #9f55ff !important;
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
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
@endsection
