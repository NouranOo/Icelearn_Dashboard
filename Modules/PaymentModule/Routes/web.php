<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('paymentmodule')->group(function() {
    Route::get('/', 'PaymentModuleController@index')->name('allpayment');
    Route::get('/create', 'PaymentModuleController@create')->name('createpayment');
    Route::get('viewpayment/{id}', 'PaymentModuleController@viewpayment')->name('viewpayment');
    Route::delete('deletepayment/{id}', 'PaymentModuleController@deletepayment')->name('deletepayment');


    Route::post('/store', 'PaymentModuleController@store')->name('storepayment');
    Route::get('/searchpayment', 'PaymentModuleController@searchpayment')->name('searchpayment');
    Route::get('/searchpayments', 'PaymentModuleController@dosearchpayment')->name('dosearchpayment');





});
