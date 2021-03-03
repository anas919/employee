<?php

Route::group(['middleware' => 'web'], function () {
	Route::domain('{account}.localhost')->group(function () {
	    Route::group(['middleware' => 'auth','prefix' => '/attendance'], function () {

	        Route::get('', 'AttendanceController@index')
	            ->name('attendance');

			Route::post('/add', 'AttendanceController@add')
	            ->name('add-attendance');

	        Route::get('/search', 'AttendanceController@search')
	            ->name('search-attendance');

	        Route::get('/edit/{attendance_id}', 'AttendanceController@editAttendance')
	            ->name('edit-attendance');

	        Route::post('/update', 'AttendanceController@update')
	        	->name('update-attendance');

	        Route::post('/delete', 'AttendanceController@delete')
	        	->name('delete-attendance');
	    });
	});
});
