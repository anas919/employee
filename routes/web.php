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

Route::get('/users', function () {
    return [
        'tenant' => app('tenant'),
        'users' => \App\User::all()
    ];
});
Auth::routes(['verify' => true]);

Route::get('/', function () {
	// return app('tenant')->id;
   return view('home');
});
Route::get('accept/{token}', 'InviteController@accept')->name('accept');
include 'members.php';
include 'departments.php';
include 'clients.php';
include 'teams.php';
include 'projects.php';
include 'schedules.php';
include 'invoices.php';
include 'boards.php';
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
//
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/sendmail', function() {

	Mail::to('farih.anas919@gmail.com')->send(new WelcomeMail(Auth::user()));
});
Route::get('/before', 'UserController@beforeLogin');
Route::post('/redirecttoLogin', 'UserController@redirecttoLogin')->name('redirecttoLogin');

Route::domain('{account}.localhost')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
});//
Route::get('/home', 'HomeController@index')->name('home');//
