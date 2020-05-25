<?php

Route::group(['middleware' => 'web'], function () {
	Route::domain('{account}.localhost')->group(function () {
	    Route::group(['middleware' => 'auth','prefix' => '/tasklists'], function () {

	        Route::get('', 'TasklistController@index')
	            ->name('tasklists');

	        Route::post('/add', 'TasklistController@add')
	            ->name('add-tasklist');

	        Route::get('/search', 'TasklistController@search')
	            ->name('search-tasklist');

	        Route::get('/edit/{tasklist_id}', 'TasklistController@editTasklist')
	            ->name('edit-tasklist');

	        Route::post('/update', 'TasklistController@update')
	        	->name('update-tasklist');

	        Route::get('/drag-drop', 'TasklistController@dragDropUpdate')
	            ->name('drag-drop-tasklist');

	        Route::get('/duplicate/{tasklist_id}', 'TasklistController@duplicateTasklist')
	            ->name('duplicate-tasklist');
	    });
	});
});
