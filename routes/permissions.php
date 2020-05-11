<?php

Route::group(['middleware' => 'web'], function () {
	Route::domain('{account}.localhost')->group(function () {
	    Route::group(['middleware' => 'auth','prefix' => '/permissions'], function () {

	        Route::get('', 'PermissionController@index')
	            ->name('permissions');

			Route::get('/{permission_id}', 'PermissionController@details')
	            ->name('view-permission');

	        Route::post('/add', 'PermissionController@add')
	            ->name('add-permission');

	        Route::get('/edit/{permission_id}', 'PermissionController@editPermission')
	            ->name('edit-permission');

	        Route::post('/update', 'PermissionController@update')
	        	->name('update-permission');
	    });
	});
});
