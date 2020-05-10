<?php

Route::group(['middleware' => 'web'], function () {
	Route::domain('{account}.localhost')->group(function () {
	    Route::group(['middleware' => 'auth','prefix' => '/settings'], function () {

	        Route::get('', 'SettingController@index')
	            ->name('settings');

		});
	});
});
