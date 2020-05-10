<?php

Route::group(['middleware' => 'web'], function () {
	Route::domain('{account}.localhost')->group(function () {
	    Route::group(['middleware' => 'auth','prefix' => '/departments'], function () {

	        Route::get('', 'DepartmentController@index')
	            ->name('departments');

			Route::get('/{department_id}', 'DepartmentController@details')
	            ->name('view-department');

	        Route::post('/add', 'DepartmentController@add')
	            ->name('add-department');

	        Route::get('/edit/{department_id}', 'DepartmentController@editdepartment')
	            ->name('edit-department');

	        Route::post('/update', 'DepartmentController@update')
	        	->name('update-department');
	    });
	});
});
