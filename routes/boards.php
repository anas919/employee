<?php

Route::group(['middleware' => 'web'], function () {
	Route::domain('{account}.localhost')->group(function () {
	    Route::group(['middleware' => 'auth','prefix' => '/boards'], function () {

	        Route::get('', 'BoardController@index')
	            ->name('boards');

			Route::get('/{board_id}', 'BoardController@details')
	            ->name('view-board');

	        Route::post('/add', 'BoardController@add')
	            ->name('add-board');

	        Route::get('/search', 'BoardController@search')
	            ->name('search-board');

	        Route::get('/edit/{board_id}', 'BoardController@editBoard')
	            ->name('edit-board');

	        Route::post('/update', 'BoardController@update')
	        	->name('update-board');
	    });
	});
});
