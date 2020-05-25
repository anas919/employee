<?php

Route::group(['middleware' => 'web'], function () {
	Route::domain('{account}.localhost')->group(function () {
	    Route::group(['middleware' => 'auth','prefix' => '/candidates'], function () {

	        Route::get('', 'CandidateController@index')
	            ->name('candidates');

			Route::post('/add', 'CandidateController@add')
	            ->name('add-candidate');

	        Route::get('/search', 'CandidateController@search')
	            ->name('search-candidate');

	        Route::get('/edit/{candidate_id}', 'CandidateController@editCandidate')
	            ->name('edit-candidate');

	        Route::post('/update', 'CandidateController@update')
	        	->name('update-candidate');
	    });
	});
});
