<?php

Route::group(['middleware' => 'web'], function () {
	Route::domain('{account}.localhost')->group(function () {
	    Route::group(['middleware' => 'auth','prefix' => '/invoices'], function () {

	        Route::get('', 'InvoiceController@index')
	            ->name('invoices');

			Route::get('/create', 'InvoiceController@create')
	            ->name('create-invoice');

	        Route::post('/add', 'InvoiceController@add')
	            ->name('add-invoice');

	        Route::get('/search', 'InvoiceController@search')
	            ->name('search-invoice');

	        Route::get('/edit/{invoice_id}', 'InvoiceController@editInvoice')
	            ->name('edit-invoice');

	        Route::post('/update', 'InvoiceController@update')
	        	->name('update-invoice');
	    });
	});
});
