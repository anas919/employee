<?php

Route::group(['middleware' => 'web'], function () {
	Route::domain('{account}.localhost')->group(function () {
    	Route::group(['middleware' => ['auth','verified','roles'], 'roles' => ['Admin'], 'prefix' => '/members'], function () {

			Route::get('', 'UserController@index')
            ->name('members');

			Route::post('/add', 'UserController@add')
	            ->name('add');

	        Route::post('/invite', 'UserController@invite')
	            ->name('invite');

	        Route::get('/search', 'UserController@search')
	            ->name('search');

	        Route::get('/edit/{member_id}', 'UserController@editMember')
	            ->name('edit');

	        Route::post('/update', 'UserController@update')
	        	->name('update');

	        Route::get('/theme', 'UserController@setTheme')
	            ->name('pref-theme');
    	});
	});
});
