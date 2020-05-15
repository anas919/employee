<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => [\Fruitcake\Cors\HandleCors::class,'auth:api']], function () {
	Route::get('projects', 'ProjectController@projects');
	Route::get('project/tasks/{projectId}', 'ProjectController@tasks');
	Route::get('tasks', 'UserController@tasks');
});


Route::group(['middleware' => \Fruitcake\Cors\HandleCors::class,'prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::group(['middleware' => 'auth:api'], function() {

        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});
