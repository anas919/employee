@extends('layouts.auth')

@section('content')
<?php
     $Option3=array('Pacific/Midway'=>'(UTC-11:00) Midway Island',
          'Pacific/Samoa'=>'(UTC-11:00) Samoa',
          'Pacific/Honolulu'=>'(UTC-10:00) Hawaii',
          'US/Alaska'=>'(UTC-09:00) Alaska',
          'America/Los_Angeles'=>'(UTC-08:00) Pacific Time (US & Canada)',
          'America/Tijuana'=>'(UTC-08:00) Tijuana',
          'US/Arizona'=>'(UTC-07:00) Arizona',
          'America/Chihuahua'=>'(UTC-07:00) Chihuahua',
          'America/Chihuahua'=>'(UTC-07:00) La Paz',
          'America/Mazatlan'=>'(UTC-07:00) Mazatlan',
          'US/Mountain'=>'(UTC-07:00) Mountain Time (US & Canada)',
          'America/Managua'=>'(UTC-06:00) Central America',
          'US/Central'=>'(UTC-06:00) Central Time (US & Canada)',
          'America/Mexico_City'=>'(UTC-06:00) Guadalajara',
          'America/Mexico_City'=>'(UTC-06:00) Mexico City',
          'America/Monterrey'=>'(UTC-06:00) Monterrey',
          'Canada/Saskatchewan'=>'(UTC-06:00) Saskatchewan',
          'America/Bogota'=>'(UTC-05:00) Bogota',
          'US/Eastern'=>'(UTC-05:00) Eastern Time (US & Canada)',
          'US/East-Indiana'=>'(UTC-05:00) Indiana (East)',
          'America/Lima'=>'(UTC-05:00) Lima',
          'America/Bogota'=>'(UTC-05:00) Quito',
          'Canada/Atlantic'=>'(UTC-04:00) Atlantic Time (Canada)',
          'America/Caracas'=>'(UTC-04:30) Caracas',
          'America/La_Paz'=>'(UTC-04:00) La Paz',
          'America/Santiago'=>'(UTC-04:00) Santiago',
          'Canada/Newfoundland'=>'(UTC-03:30) Newfoundland',
          'America/Sao_Paulo'=>'(UTC-03:00) Brasilia',
          'America/Argentina/Buenos_Aires'=>'(UTC-03:00) Buenos Aires',
          'America/Argentina/Buenos_Aires'=>'(UTC-03:00) Georgetown',
          'America/Godthab'=>'(UTC-03:00) Greenland',
          'America/Noronha'=>'(UTC-02:00) Mid-Atlantic',
          'Atlantic/Azores'=>'(UTC-01:00) Azores',
          'Atlantic/Cape_Verde'=>'(UTC-01:00) Cape Verde Is.',
          'Africa/Casablanca'=>'(UTC+00:00) Casablanca',
          'Europe/London'=>'(UTC+00:00) Edinburgh',
          'Etc/Greenwich'=>'(UTC+00:00) Greenwich Mean Time : Dublin',
          'Europe/Lisbon'=>'(UTC+00:00) Lisbon',
          'Europe/London'=>'(UTC+00:00) London',
          'Africa/Monrovia'=>'(UTC+00:00) Monrovia',
          'UTC'=>'(UTC+00:00) UTC',
          'Europe/Amsterdam'=>'(UTC+01:00) Amsterdam',
          'Europe/Belgrade'=>'(UTC+01:00) Belgrade',
          'Europe/Berlin'=>'(UTC+01:00) Berlin',
          'Europe/Berlin'=>'(UTC+01:00) Bern',
          'Europe/Bratislava'=>'(UTC+01:00) Bratislava',
          'Europe/Brussels'=>'(UTC+01:00) Brussels',
          'Europe/Budapest'=>'(UTC+01:00) Budapest',
          'Europe/Copenhagen'=>'(UTC+01:00) Copenhagen',
          'Europe/Ljubljana'=>'(UTC+01:00) Ljubljana',
          'Europe/Madrid'=>'(UTC+01:00) Madrid',
          'Europe/Paris'=>'(UTC+01:00) Paris',
          'Europe/Prague'=>'(UTC+01:00) Prague',
          'Europe/Rome'=>'(UTC+01:00) Rome',
          'Europe/Sarajevo'=>'(UTC+01:00) Sarajevo',
          'Europe/Skopje'=>'(UTC+01:00) Skopje',
          'Europe/Stockholm'=>'(UTC+01:00) Stockholm',
          'Europe/Vienna'=>'(UTC+01:00) Vienna',
          'Europe/Warsaw'=>'(UTC+01:00) Warsaw',
          'Africa/Lagos'=>'(UTC+01:00) West Central Africa',
          'Europe/Zagreb'=>'(UTC+01:00) Zagreb',
          'Europe/Athens'=>'(UTC+02:00) Athens',
          'Europe/Bucharest'=>'(UTC+02:00) Bucharest',
          'Africa/Cairo'=>'(UTC+02:00) Cairo',
          'Africa/Harare'=>'(UTC+02:00) Harare',
          'Europe/Helsinki'=>'(UTC+02:00) Helsinki',
          'Europe/Istanbul'=>'(UTC+02:00) Istanbul',
          'Asia/Jerusalem'=>'(UTC+02:00) Jerusalem',
          'Europe/Helsinki'=>'(UTC+02:00) Kyiv',
          'Africa/Johannesburg'=>'(UTC+02:00) Pretoria',
          'Europe/Riga'=>'(UTC+02:00) Riga',
          'Europe/Sofia'=>'(UTC+02:00) Sofia',
          'Europe/Tallinn'=>'(UTC+02:00) Tallinn',
          'Europe/Vilnius'=>'(UTC+02:00) Vilnius',
          'Asia/Baghdad'=>'(UTC+03:00) Baghdad',
          'Asia/Kuwait'=>'(UTC+03:00) Kuwait',
          'Europe/Minsk'=>'(UTC+03:00) Minsk',
          'Africa/Nairobi'=>'(UTC+03:00) Nairobi',
          'Asia/Riyadh'=>'(UTC+03:00) Riyadh',
          'Europe/Volgograd'=>'(UTC+03:00) Volgograd',
          'Asia/Tehran'=>'(UTC+03:30) Tehran',
          'Asia/Muscat'=>'(UTC+04:00) Abu Dhabi',
          'Asia/Baku'=>'(UTC+04:00) Baku',
          'Europe/Moscow'=>'(UTC+04:00) Moscow',
          'Asia/Muscat'=>'(UTC+04:00) Muscat',
          'Europe/Moscow'=>'(UTC+04:00) St. Petersburg',
          'Asia/Tbilisi'=>'(UTC+04:00) Tbilisi',
          'Asia/Yerevan'=>'(UTC+04:00) Yerevan',
          'Asia/Kabul'=>'(UTC+04:30) Kabul',
          'Asia/Karachi'=>'(UTC+05:00) Islamabad',
          'Asia/Karachi'=>'(UTC+05:00) Karachi',
          'Asia/Tashkent'=>'(UTC+05:00) Tashkent',
          'Asia/Calcutta'=>'(UTC+05:30) Chennai',
          'Asia/Kolkata'=>'(UTC+05:30) Kolkata',
          'Asia/Calcutta'=>'(UTC+05:30) Mumbai',
          'Asia/Calcutta'=>'(UTC+05:30) New Delhi',
          'Asia/Calcutta'=>'(UTC+05:30) Sri Jayawardenepura',
          'Asia/Katmandu'=>'(UTC+05:45) Kathmandu',
          'Asia/Almaty'=>'(UTC+06:00) Almaty',
          'Asia/Dhaka'=>'(UTC+06:00) Astana',
          'Asia/Dhaka'=>'(UTC+06:00) Dhaka',
          'Asia/Yekaterinburg'=>'(UTC+06:00) Ekaterinburg',
          'Asia/Rangoon'=>'(UTC+06:30) Rangoon',
          'Asia/Bangkok'=>'(UTC+07:00) Bangkok',
          'Asia/Bangkok'=>'(UTC+07:00) Hanoi',
          'Asia/Jakarta'=>'(UTC+07:00) Jakarta',
          'Asia/Novosibirsk'=>'(UTC+07:00) Novosibirsk',
          'Asia/Hong_Kong'=>'(UTC+08:00) Beijing',
          'Asia/Chongqing'=>'(UTC+08:00) Chongqing',
          'Asia/Hong_Kong'=>'(UTC+08:00) Hong Kong',
          'Asia/Krasnoyarsk'=>'(UTC+08:00) Krasnoyarsk',
          'Asia/Kuala_Lumpur'=>'(UTC+08:00) Kuala Lumpur',
          'Australia/Perth'=>'(UTC+08:00) Perth',
          'Asia/Singapore'=>'(UTC+08:00) Singapore',
          'Asia/Taipei'=>'(UTC+08:00) Taipei',
          'Asia/Ulan_Bator'=>'(UTC+08:00) Ulaan Bataar',
          'Asia/Urumqi'=>'(UTC+08:00) Urumqi',
          'Asia/Irkutsk'=>'(UTC+09:00) Irkutsk',
          'Asia/Tokyo'=>'(UTC+09:00) Osaka',
          'Asia/Tokyo'=>'(UTC+09:00) Sapporo',
          'Asia/Seoul'=>'(UTC+09:00) Seoul',
          'Asia/Tokyo'=>'(UTC+09:00) Tokyo',
          'Australia/Adelaide'=>'(UTC+09:30) Adelaide',
          'Australia/Darwin'=>'(UTC+09:30) Darwin',
          'Australia/Brisbane'=>'(UTC+10:00) Brisbane',
          'Australia/Canberra'=>'(UTC+10:00) Canberra',
          'Pacific/Guam'=>'(UTC+10:00) Guam',
          'Australia/Hobart'=>'(UTC+10:00) Hobart',
          'Australia/Melbourne'=>'(UTC+10:00) Melbourne',
          'Pacific/Port_Moresby'=>'(UTC+10:00) Port Moresby',
          'Australia/Sydney'=>'(UTC+10:00) Sydney',
          'Asia/Yakutsk'=>'(UTC+10:00) Yakutsk',
          'Asia/Vladivostok'=>'(UTC+11:00) Vladivostok',
          'Pacific/Auckland'=>'(UTC+12:00) Auckland',
          'Pacific/Fiji'=>'(UTC+12:00) Fiji',
          'Pacific/Kwajalein'=>'(UTC+12:00) International Date Line West',
          'Asia/Kamchatka'=>'(UTC+12:00) Kamchatka',
          'Asia/Magadan'=>'(UTC+12:00) Magadan',
          'Pacific/Fiji'=>'(UTC+12:00) Marshall Is.',
          'Asia/Magadan'=>'(UTC+12:00) New Caledonia',
          'Asia/Magadan'=>'(UTC+12:00) Solomon Is.',
          'Pacific/Auckland'=>'(UTC+12:00) Wellington',
          'Pacific/Tongatapu'=>'(UTC+13:00) Nukualofa'
     );

$countries =array(
1 =>'Afghanistan',
2 =>'Åland Islands',
3 =>'Albania',
4 =>'Algeria',
5 =>'American Samoa',
6 =>'Andorra',
7 =>'Angola',
8 =>'Anguilla',
9 =>'Antarctica',
10 =>'Antigua and Barbuda',
11 =>'Argentina',
12 =>'Armenia',
13 =>'Aruba',
14 =>'Australia',
15 =>'Austria',
16 =>'Azerbaijan',
17 =>'Bahamas',
18 =>'Bahrain',
19 =>'Bangladesh',
20 =>'Barbados',
21 =>'Belarus',
22 =>'Belgium',
23 =>'Belize',
24 =>'Benin',
25 =>'Bermuda',
26 =>'Bhutan',
27 =>'Bolivia ,Plurinational State of',
28 =>'Bonaire ,Sint Eustatius and Saba',
29 =>'Bosnia and Herzegovina',
30 =>'Botswana',
31 =>'Bouvet Island',
32 =>'Brazil',
33 =>'British Indian Ocean Territory',
34 =>'Brunei Darussalam',
35 =>'Bulgaria',
36 =>'Burkina Faso',
37 =>'Burundi',
38 =>'Cambodia',
39 =>'Cameroon',
40 =>'Canada',
41 =>'Cape Verde',
42 =>'Cayman Islands',
43 =>'Central African Republic',
44 =>'Chad',
45 =>'Chile',
46 =>'China',
47 =>'Christmas Island',
48 =>'Cocos (Keeling) Islands',
49 =>'Colombia',
50 =>'Comoros',
51 =>'Congo',
52 =>'Congo ,the Democratic Republic of the',
53 =>'Cook Islands',
54 =>'Costa Rica',
55 =>'Côte d\'Ivoire',
56 =>'Croatia',
57 =>'Cuba',
58 =>'Curaçao',
59 =>'Cyprus',
60 =>'Czech Republic',
61 =>'Denmark',
62 =>'Djibouti',
63 =>'Dominica',
64 =>'Dominican Republic',
65 =>'Ecuador',
66 =>'Egypt',
67 =>'El Salvador',
68 =>'Equatorial Guinea',
69 =>'Eritrea',
70 =>'Estonia',
71 =>'Ethiopia',
72 =>'Falkland Islands (Malvinas)',
73 =>'Faroe Islands',
74 =>'Fiji',
75 =>'Finland',
76 =>'France',
77 =>'French Guiana',
78 =>'French Polynesia',
79 =>'French Southern Territories',
80 =>'Gabon',
81 =>'Gambia',
82 =>'Georgia',
83 =>'Germany',
84 =>'Ghana',
85 =>'Gibraltar',
86 =>'Greece',
87 =>'Greenland',
88 =>'Grenada',
89 =>'Guadeloupe',
90 =>'Guam',
91 =>'Guatemala',
92 =>'Guernsey',
93 =>'Guinea',
94 =>'Guinea-Bissau',
95 =>'Guyana',
96 =>'Haiti',
97 =>'Heard Island and McDonald Mcdonald Islands',
98 =>'Holy See (Vatican City State)',
99 =>'Honduras',
100 =>'Hong Kong',
101 =>'Hungary',
102 =>'Iceland',
103 =>'India',
104 =>'Indonesia',
105 =>'Iran ,slamic Republic of',
106 =>'Iraq',
107 =>'Ireland',
108 =>'Isle of Man',
109 =>'Israel',
110 =>'Italy',
111 =>'Jamaica',
112 =>'Japan',
113 =>'Jersey',
114 =>'Jordan',
115 =>'Kazakhstan',
116 =>'Kenya',
117 =>'Kiribati',
118 =>'Korea ,Democratic People\'s Republic of',
119 =>'Korea ,Republic of',
120 =>'Kuwait',
121 =>'Kyrgyzstan',
122 =>'Lao People\'s Democratic Republic',
123 =>'Latvia',
124 =>'Lebanon',
125 =>'Lesotho',
126 =>'Liberia',
127 =>'Libya',
128 =>'Liechtenstein',
129 =>'Lithuania',
130 =>'Luxembourg',
131 =>'Macao',
132 =>'Macedonia ,the Former Yugoslav Republic of',
133 =>'Madagascar',
134 =>'Malawi',
135 =>'Malaysia',
136 =>'Maldives',
137 =>'Mali',
138 =>'Malta',
139 =>'Marshall Islands',
140 =>'Martinique',
141 =>'Mauritania',
142 =>'Mauritius',
143 =>'Mayotte',
144 =>'Mexico',
145 =>'Micronesia ,Federated States of',
146 =>'Moldova ,Republic of',
147 =>'Monaco',
148 =>'Mongolia',
149 =>'Montenegro',
150 =>'Montserrat',
151 =>'Morocco',
152 =>'Mozambique',
153 =>'Myanmar',
154 =>'Namibia',
155 =>'Nauru',
156 =>'Nepal',
157 =>'Netherlands',
158 =>'New Caledonia',
159 =>'New Zealand',
160 =>'Nicaragua',
161 =>'Niger',
162 =>'Nigeria',
163 =>'Niue',
164 =>'Norfolk Island',
165 =>'Northern Mariana Islands',
166 =>'Norway',
167 =>'Oman',
168 =>'Pakistan',
169 =>'Palau',
170 =>'Palestine ,State of',
171 =>'Panama',
172 =>'Papua New Guinea',
173 =>'Paraguay',
174 =>'Peru',
175 =>'Philippines',
176 =>'Pitcairn',
177 =>'Poland',
178 =>'Portugal',
179 =>'Puerto Rico',
180 =>'Qatar',
181 =>'Réunion',
182 =>'Romania',
183 =>'Russian Federation',
184 =>'Rwanda',
185 =>'Saint Barthélemy',
186 =>'Saint Helena ,Ascension and Tristan da Cunha',
187 =>'Saint Kitts and Nevis',
188 =>'Saint Lucia',
189 =>'Saint Martin (French part)',
190 =>'Saint Pierre and Miquelon',
191 =>'Saint Vincent and the Grenadines',
192 =>'Samoa',
193 =>'San Marino',
194 =>'Sao Tome and Principe',
195 =>'Saudi Arabia',
196 =>'Senegal',
197 =>'Serbia',
198 =>'Seychelles',
199 =>'Sierra Leone',
200 =>'Singapore',
201 =>'Sint Maarten (Dutch part)',
202 =>'Slovakia',
203 =>'Slovenia',
204 =>'Solomon Islands',
205 =>'Somalia',
206 =>'South Africa',
207 =>'South Georgia and the South Sandwich Islands',
208 =>'South Sudan',
209 =>'Spain',
210 =>'Sri Lanka',
211 =>'Sudan',
212 =>'Suri',
213 =>'Svalbard and Jan Mayen',
214 =>'Swaziland',
215 =>'Sweden',
216 =>'Switzerland',
217 =>'Syrian Arab Republic',
218 =>'Taiwan',
219 =>'Tajikistan',
220 =>'Tanzania ,United Republic of',
221 =>'Thailand',
222 =>'Timor-Leste',
223 =>'Togo',
224 =>'Tokelau',
225 =>'Tonga',
226 =>'Trinidad and Tobago',
227 =>'Tunisia',
228 =>'Turkey',
229 =>'Turkmenistan',
230 =>'Turks and Caicos Islands',
231 =>'Tuvalu',
232 =>'Uganda',
233 =>'Ukraine',
234 =>'United Arab Emirates',
235 =>'United Kingdom',
236 =>'United States',
237 =>'United States Minor Outlying Islands',
238 =>'Uruguay',
239 =>'Uzbekistan',
240 =>'Vanuatu',
241 =>'Venezuela ,Bolivarian Republic of',
242 =>'Viet Nam',
243 =>'Virgin Islands ,British',
244 =>'Virgin Islands ,U.S.',
245 =>'Wallis and Futuna',
246 =>'Western Sahara',
247 =>'Yemen',
248 =>'Zambia',
249 =>'Zimbabwe');
?>
<div class="container-fluid">
     <div class="row">
          <div class="col-md-6 col-lg-7 fullscreen-md d-flex justify-content-center align-items-center overlay gradient gradient-53 alpha-7 image-background cover" style="background-image:url(http://beta.textwik.com/assets/skin/img/login-img.png);">
               <div style="margin-top: 15%;" class="content">
                    <h2 class="display-4 display-md-3 color-1 mt-4 mt-md-0">Welcome to <span class="bold d-block">Name</span></h2>
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
          <div  class="col-md-5 col-lg-4 mx-auto">
               <div class="login-form mt-5 mt-md-0">
				   	<img src="{{ asset('site/assets/skin2/img/favicon.ico') }}" class="logo img-responsive mb-4 mb-md-6" alt="">
                    <h1 class="color-5 bold">Register</h1>
                    <p class="color-2 mb-4 mb-md-6">Already have an account? <a href="{{ route('login') }}" class="accent bold">Sign In</a></p>
                    <div id="validationMessages" class="alert alert-danger" style="display:none"></div>
                    <!--Form-->
                    <form  accept-charset="utf-8" name="frmRegister" id="frmRegister" class="cozy" method="POST" action="{{ route('register') }}">
                         {{ csrf_field() }}
						 <input type="hidden" name="src" value="false">
                         <div class="row row-bordered">
                              <div class="col-md-6{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                   <label class="control-label bold small text-uppercase color-2">First Name *</label>
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
                                   <label class="control-label bold small text-uppercase color-2">Last Name *</label>
                                   <div class="form-group has-icon">
                                        <div class="input text">
                                             <input type="text" name="last_name" class="form-control form-control-rounded" placeholder="Last Name" value="{{ old('last_name') }}">
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
                                   <label class="control-label bold small text-uppercase color-2">Email *</label>
                                   <div class="form-group has-icon">
                                        <div class="input text">
                                             <input type="email" name="email" class="form-control form-control-rounded" placeholder="Email" value="{{ old('email') }}">
                                             @if ($errors->has('email'))
                                                  <span class="help-block">
                                                       <strong>{{ $errors->first('email') }}</strong>
                                                  </span>
                                             @endif
                                        </div>
                                        <i class="icon fas fa-envelope"></i>
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
                              <div class="col-md-12{{ $errors->has('org') ? ' has-error' : '' }}">
                                   <label class="control-label bold small text-uppercase color-2">Company Name *</label>
                                   <div class="form-group has-icon">
                                        <div class="input text">
                                             <input type="text" name="org" class="form-control form-control-rounded" placeholder="Company Name" value="{{ old('org') }}">
                                             @if ($errors->has('org'))
                                                  <span class="help-block">
                                                       <strong>{{ $errors->first('org') }}</strong>
                                                  </span>
                                             @endif
                                        </div><i class="icon fas fa-building"></i>
                                   </div>
                              </div>
                              <div class="col-md-12{{ $errors->has('subdomain') ? ' has-error' : '' }}">
                                   <label class="control-label bold small text-uppercase color-2">Desired Url *</label>
                                   <div class="form-group has-icon">
                                        <div class="input text">
                                             <input type="text" name="subdomain" class="form-control form-control-rounded" value="{{ old('subdomain') }}">
                                             @if ($errors->has('subdomain'))
                                                  <span class="help-block">
                                                       <strong>{{ $errors->first('subdomain') }}</strong>
                                                  </span>
                                             @endif
                                        </div><i class="icon fas">.localhost.com</i>
                                   </div>
                              </div>
                              <div class="col-md-12{{ $errors->has('password') ? ' has-error' : '' }}">
                                   <label class="control-label bold small text-uppercase color-2">Password *</label>
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
                              <div class="col-md-12">
                                   <label class="control-label bold small text-uppercase color-2">Country *</label>
                                   <div class="form-group">
                                        <div class="input select">
                                             <select name="country" class="form-control placeholder-no-fix" id="user-country">
                                                  <option value="">--Organization Country--</option>
                                                  @foreach($countries as $code => $country)
                                                       <option value="{{$code}}">{{$country}}</option>
                                                  @endforeach
                                             </select>
                                        </div>
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
    $('#frmRegister').submit(function () {
          // Check if empty of not
          if($('#user-country').val() == ''){
               alert("Please select country");
               return false;
          }
     });
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
          width: -moz-available;
     }
</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
@endsection
