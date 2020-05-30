<?php

Route::group(['middleware' => 'web'], function () {
	Route::domain('{account}.localhost')->group(function () {
	    Route::group(['middleware' => 'auth','prefix' => '/activities'], function () {

	        Route::get('', 'ActivityController@index')
	            ->name('activities');

			Route::get('member/{member_id}', 'ActivityController@details')
	            ->name('view-activities');

	    });
	});
});
