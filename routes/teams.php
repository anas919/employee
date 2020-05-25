<?php

Route::group(['middleware' => 'web'], function () {
	Route::domain('{account}.localhost')->group(function () {
	    Route::group(['middleware' => 'auth','prefix' => '/teams'], function () {

	        Route::get('', 'TeamController@index')
	            ->name('teams');

			Route::post('/add', 'TeamController@add')
	            ->name('add-team');

	        Route::get('/search', 'TeamController@search')
	            ->name('search-team');

	        Route::get('/edit/{team_id}', 'TeamController@editTeam')
	            ->name('edit-team');

	        Route::post('/update', 'TeamController@update')
	        	->name('update-team');
	    });
	});
});
