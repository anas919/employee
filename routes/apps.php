<?php

Route::group(['middleware' => 'web'], function () {
	Route::domain('{account}.localhost')->group(function () {
	    Route::group(['middleware' => 'auth','prefix' => '/apps'], function () {

	        Route::get('', 'AppController@index')
	            ->name('apps');

			Route::get('/{app_id}', 'AppController@details')
	            ->name('view-app');

	        Route::post('/add', 'AppController@add')
	            ->name('add-app');

	        Route::get('/edit/{app_id}', 'AppController@editApp')
	            ->name('edit-app');

	        Route::post('/update', 'AppController@update')
	        	->name('update-app');
	    });
	});
});
