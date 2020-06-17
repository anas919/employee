<?php

use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Checkout without subscriptions
Route::get('paypal', 'PaypalController@index')->name('paypal');
Route::post('create-payment', 'PaypalController@create')->name('create-payment');
Route::get('execute-payment', 'PaypalController@execute')->name('execute-payment');
//Subscriptions
Route::get('payment', 'PaymentController@index')->name('payment');
Route::get('payment/plans', 'PaymentController@getPlans')->name('plans');
Route::get('payment/plan/{plan_id}', 'PaymentController@showPlan')->name('planDetails');
Route::get('payment/plan/{plan_id}/activate', 'PaymentController@activate')->name('activate-plan');
Route::get('payment/create-plan', 'PaymentController@createPlan')->name('create-plan');
Route::post('payment/plan/{plan_id}/create-agreement', 'PaymentController@createAgreement')->name('create-agreement');
Route::get('execute-agreement/{status}', 'PaymentController@executeAgreement')->name('execute-agreement');
//

Route::get('/users', function () {
    return [
        'tenant' => app('tenant'),
        'users' => \App\User::all()
    ];
});
Auth::routes(['verify' => true]);
//Home
Route::domain('{account}.localhost')->group(function () {
	Route::get('/', function (Request $req, $account='') {
		return redirect()->route('members', $account);
	});
});
Route::get('/', function () {
	return view('home');
});
Route::get('accept/{token}', 'InviteController@accept')->name('accept');
//Logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
//Preview for sending mail
Route::get('/sendmail', function() {
	Mail::to('farih.anas919@gmail.com')->send(new WelcomeMail(Auth::user()));
});
//Before login and redirect to subdomain
Route::get('/sign-in', 'UserController@beforeLogin')->name('beforeLogin');
Route::post('/redirecttoLogin', 'UserController@redirecttoLogin')->name('redirecttoLogin');
//Home just for no subdomain
Route::domain('{account}.localhost')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
});
Route::get('/home', 'HomeController@index')->name('home');//
//Dashboard
Route::domain('{account}.localhost')->group(function () {
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
});
include 'members.php';
include 'departments.php';
include 'clients.php';
include 'teams.php';
include 'projects.php';
include 'schedules.php';
include 'invoices.php';
include 'boards.php';
include 'tasks.php';
include 'tasklists.php';
include 'cards.php';
include 'offers.php';
include 'candidates.php';
include 'interviews.php';
include 'timeoffs.php';
include 'settings.php';
include 'payroll.php';
include 'screenshots.php';
include 'apps.php';
include 'urls.php';
include 'permissions.php';
include 'whitelist.php';
include 'activities.php';

Route::get('/products', function () {
    return view('products/product');
})->name('products');

Route::get('/pricing', function () {
    return view('site.pricing');
})->name('pricing');

Route::get('/about-us', function () {
    return view('site.about');
})->name('about-us');

Route::get('/contact', function () {
    return view('site.contact');
})->name('contact');

Route::get('testimonials', function () {
    return view('site.testimonials');
})->name('testimonials');

Route::get('/faqs', function () {
    return view('site.faqs');
})->name('faqs');

Route::get('/careers', function () {
    return view('careers');
})->name('careers');

Route::get('/terms', function () {
    return view('site.terms');
})->name('terms');
