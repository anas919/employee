<?php

Route::group(['middleware' => 'web'], function () {
	Route::domain('{account}.localhost')->group(function () {
	    Route::group(['middleware' => 'auth','prefix' => '/tasks'], function () {

	        Route::get('', 'TaskController@index')
	            ->name('tasks');

			Route::post('/add', 'TaskController@add')
	            ->name('add-task');

	        Route::post('/delete', 'TaskController@delete')
	            ->name('delete-task');

	        Route::get('/edit/{task_id}', 'TaskController@editTask')
	            ->name('edit-task');

	        Route::post('/update', 'TaskController@update')
	        	->name('update-task');

			Route::post('/assign-lists', 'TaskController@assignLists')
		        ->name('assign-lists');
	    });
	});
});
