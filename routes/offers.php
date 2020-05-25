<?php

Route::group(['middleware' => 'web'], function () {
	Route::domain('{account}.localhost')->group(function () {
	    Route::group(['middleware' => 'auth','prefix' => '/offers'], function () {

	        Route::get('', 'OfferController@index')
	            ->name('offers');

			Route::post('/add', 'OfferController@add')
	            ->name('add-offer');

	        Route::get('/search', 'OfferController@search')
	            ->name('search-offer');

	        Route::get('/edit/{offer_id}', 'OfferController@editOffer')
	            ->name('edit-offer');

	        Route::post('/update', 'OfferController@update')
	        	->name('update-offer');

	        Route::get('/delete/{offer_id}', 'OfferController@deleteOffer')
	            ->name('delete-offer');

	        Route::get('/getlink/{offer_id}', 'OfferController@getShareableLink')
	            ->name('getlink-offer');

	        Route::get('/close/{offer_id}', 'OfferController@closeOffer')
	            ->name('close-offer');

	        Route::get('/open/{offer_id}', 'OfferController@openOffer')
	            ->name('open-offer');
	    });
	});
});
Route::domain('{account}.localhost')->group(function () {
	Route::group(['middleware' => 'web','prefix' => '/offers'], function () {
	        Route::get('view/{offer_id}', 'OfferController@viewOffer')
	            ->name('view-offer');

	        Route::post('/apply', 'OfferController@applyOffer')
	            ->name('apply-offer');
	});
});
