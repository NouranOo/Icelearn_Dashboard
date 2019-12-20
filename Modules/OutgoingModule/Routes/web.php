<?php


Route::prefix('outgoingmodule')->group(function() {
    Route::get('/', 'OutgoingModuleController@index');
});


Route::group(['prefix' => 'admin-panel', 'middleware' => ['auth:admin']], function() {

    Route::resource('/outgoing', 'OutgoingModuleController')->only(['create', 'store', 'index', 'show','edit','update']);
    Route::delete('/outgoing/delete/{id}', 'OutgoingModuleController@destroy');
    Route::get('/storestatistical', 'OutgoingModuleController@storestatistical')->name('storestatistical');
    Route::post('/dostorestatistical', 'OutgoingModuleController@dostorestatistical')->name('dostorestatistical');


});