<?php

Route::group(['middleware' => 'web'], function () {
	Route::domain('{account}.localhost')->group(function () {
	    Route::group(['middleware' => 'auth','prefix' => '/schedules'], function () {

	        Route::get('', 'ScheduleController@index')
	            ->name('schedules');

			Route::post('/add', 'ScheduleController@add')
	            ->name('add-schedule');

	        Route::get('/search', 'ScheduleController@search')
	            ->name('search-schedule');

	        Route::get('/edit/{schedule_id}', 'ScheduleController@editSchedule')
	            ->name('edit-schedule');

	        Route::post('/update', 'ScheduleController@update')
	        	->name('update-schedule');
	    });
	});
});
