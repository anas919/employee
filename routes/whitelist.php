<?php

Route::group(['middleware' => 'web'], function () {
	Route::domain('{account}.localhost')->group(function () {
	    Route::group(['middleware' => 'auth','prefix' => '/whitelist'], function () {

	        Route::get('', 'WhitelistController@index')
	            ->name('whitelist');

			Route::get('/{permission_id}', 'WhitelistController@details')
	            ->name('view-whitelist');

	        Route::post('/add', 'WhitelistController@add')
	            ->name('add-whitelist');

	        Route::get('/edit/{permission_id}', 'WhitelistController@editWhitelist')
	            ->name('edit-whitelist');

	        Route::post('/update', 'WhitelistController@update')
	        	->name('update-whitelist');
	    });
	});
});
