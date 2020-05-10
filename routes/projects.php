<?php

Route::group(['middleware' => 'web'], function () {
	Route::domain('{account}.localhost')->group(function () {
	    Route::group(['middleware' => 'auth','prefix' => '/projects'], function () {

	        Route::get('', 'ProjectController@index')
	            ->name('projects');

			Route::post('/add', 'ProjectController@add')
	            ->name('add-project');

	        Route::get('/search', 'ProjectController@search')
	            ->name('search-project');

	        Route::get('/edit/{project_id}', 'ProjectController@editProject')
	            ->name('edit-project');

	        Route::post('/update', 'ProjectController@update')
	        	->name('update-project');
	    });
	});
});
