<?php

Route::group(['middleware' => 'web'], function () {
	Route::domain('{account}.localhost')->group(function () {
	    Route::group(['middleware' => 'auth','prefix' => '/interviews'], function () {

	        Route::get('', 'InterviewController@index')
	            ->name('interviews');

			Route::post('/add', 'InterviewController@add')
	            ->name('add-interview');

	        Route::get('/history/{candidate_id}', 'InterviewController@historyInterview')
	            ->name('history-interview');

	        Route::post('/update', 'InterviewController@update')
	        	->name('update-interview');
	    });
	});
});
