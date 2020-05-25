<?php

Route::group(['middleware' => 'web'], function () {
	Route::domain('{account}.localhost')->group(function () {
	    Route::group(['middleware' => 'auth','prefix' => '/timeoffs'], function () {

	        Route::get('', 'TimeoffController@index')
	            ->name('timeoffs');

			Route::post('/add', 'TimeoffController@add')
	            ->name('add-timeoff');

	        Route::post('/addploicy', 'TimeoffController@addPolicy')
	            ->name('add-policy');

	        Route::get('/search', 'TimeoffController@search')
	            ->name('search-timeoff');

	        Route::get('/edit/{timeoff_id}', 'TimeoffController@editTimeoff')
	            ->name('edit-timeoff');

	        Route::post('/update', 'TimeoffController@update')
	        	->name('update-timeoff');

	        Route::get('/delete/{timeoff_id}', 'TimeoffController@deleteTimeoff')
	            ->name('delete-timeoff');
		});
	});
});
