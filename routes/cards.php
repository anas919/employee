<?php

Route::group(['middleware' => 'web'], function () {
	Route::domain('{account}.localhost')->group(function () {
	    Route::group(['middleware' => 'auth','prefix' => '/cards'], function () {

	        Route::post('/add', 'CardController@add')
	            ->name('add-card');

	        Route::get('/edit/{card_id}', 'CardController@editCard')
	            ->name('edit-card');

	        Route::get('/duplicate/{card_id}', 'CardController@duplicateCard')
	            ->name('duplicate-card');

	        Route::post('/update', 'CardController@update')
	        	->name('update-card');

	        Route::get('/delete/{card_id}', 'CardController@deleteCard')
	            ->name('delete-card');

	        Route::get('/fetch-members/{card_id}', 'CardController@fetchMembers')
	            ->name('fetch-members-card');

	        Route::post('/assign-members', 'CardController@assignMembers')
	        	->name('assign-members');

	        Route::get('/drag-drop', 'CardController@dragDropUpdate')
	            ->name('drag-drop-card');

	        Route::post('/attach-file/{card_id}', 'CardController@attachFile')
	            ->name('attach-file-card');

	        Route::post('/delete-file/', 'CardController@deleteFile')
	            ->name('delete-file-card');
	    });
	});
});
