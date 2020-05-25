<?php

Route::group(['middleware' => 'web'], function () {
	Route::domain('{account}.localhost')->group(function () {
	    Route::group(['middleware' => 'auth','prefix' => '/screenshots'], function () {

	        Route::get('', 'ScreenshotController@index')
	            ->name('screenshots');

			Route::get('/{screenshot_id}', 'ScreenshotController@details')
	            ->name('view-screenshot');

	        Route::post('/add', 'ScreenshotController@add')
	            ->name('add-screenshot');

	        Route::get('/edit/{screenshot_id}', 'ScreenshotController@editScreenshot')
	            ->name('edit-screenshot');

	        Route::post('/update', 'ScreenshotController@update')
	        	->name('update-screenshot');
	    });
	});
});
