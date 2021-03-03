<?php

Route::group(['middleware' => 'web'], function () {
	Route::domain('{account}.localhost')->group(function () {
	    Route::group(['middleware' => 'auth','prefix' => '/timesheets'], function () {

	        Route::get('', 'TimesheetController@index')
	            ->name('timesheets');

			Route::post('/add', 'TimesheetController@add')
	            ->name('add-timesheet');

	        Route::post('/search', 'TimesheetController@search')
	            ->name('search-timesheet');
			Route::get('/search', 'TimesheetController@search', function(){
	        	return route('timesheets', Auth::user()->subdomain);
	        });

	        Route::get('/edit/{timesheet_id}', 'TimesheetController@editTimesheet')
	            ->name('edit-timesheet');

	        Route::post('/update', 'TimesheetController@update')
	        	->name('update-timesheet');

	        Route::post('/delete', 'TimesheetController@delete')
	        	->name('delete-timesheet');
	    });
	});
});
