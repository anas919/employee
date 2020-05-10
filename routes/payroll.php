<?php

Route::group(['middleware' => 'web'], function () {
	Route::domain('{account}.localhost')->group(function () {
	    Route::group(['middleware' => 'auth','prefix' => '/payroll'], function () {

	        Route::get('', 'PayrollController@index')
	            ->name('payroll');

			Route::get('/{payroll_id}', 'PayrollController@details')
	            ->name('view-payroll');

	        Route::post('/add', 'PayrollController@add')
	            ->name('add-payroll');

	        Route::get('/edit/{payroll_id}', 'PayrollController@editPayroll')
	            ->name('edit-payroll');

	        Route::post('/update', 'PayrollController@update')
	        	->name('update-payroll');
	    });
	});
});
