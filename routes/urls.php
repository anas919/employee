<?php

Route::group(['middleware' => 'web'], function () {
	Route::domain('{account}.localhost')->group(function () {
	    Route::group(['middleware' => 'auth','prefix' => '/urls'], function () {

	        Route::get('', 'UrlController@index')
	            ->name('urls');

			Route::get('/{url_id}', 'UrlController@details')
	            ->name('view-url');

	        Route::post('/add', 'UrlController@add')
	            ->name('add-url');

	        Route::get('/edit/{url_id}', 'UrlController@editUrl')
	            ->name('edit-url');

	        Route::post('/update', 'UrlController@update')
	        	->name('update-url');
	    });
	});
});
