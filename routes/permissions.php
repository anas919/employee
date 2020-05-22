<?php

Route::group(['middleware' => 'web'], function () {
	Route::domain('{account}.localhost')->group(function () {
	    Route::group(['middleware' => 'auth','prefix' => '/permissions'], function () {

	        Route::get('', 'PermissionController@index')
	            ->name('permissions');

			Route::get('select-role/{role_id}', 'PermissionController@selectRole')
	            ->name('select-role');

	        Route::post('/add-role', 'PermissionController@addRole')
	            ->name('add-role');

	        Route::get('/edit/{permission_id}', 'PermissionController@editPermission')
	            ->name('edit-permission');

	        Route::post('/update', 'PermissionController@update')
	        	->name('update-permission');
	    });
	});
});
