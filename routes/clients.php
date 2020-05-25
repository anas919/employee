<?php

Route::group(['middleware' => 'web'], function () {
	Route::domain('{account}.localhost')->group(function () {
	    Route::group(['middleware' => 'auth','prefix' => '/clients'], function () {

	        Route::get('', 'ClientController@index')
	            ->name('clients');

			Route::post('/add', 'ClientController@add')
	            ->name('add-client');

	        Route::get('/search', 'ClientController@search')
	            ->name('search-client');

	        Route::get('/edit/{client_id}', 'ClientController@editClient')
	            ->name('edit-client');

	        Route::post('/update', 'ClientController@update')
	        	->name('update-client');
	    });
	});
});
