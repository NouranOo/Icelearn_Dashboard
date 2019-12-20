<?php


Route::group(['prefix' => 'admin-panel', 'middleware' => ['auth:admin']], function() {

    Route::prefix('degrees')->group(function() {
        Route::get('/{id}', 'DegreeModuleController@index')->name('degreeindex');
        Route::get('degreeshow/{id}', 'DegreeModuleController@show')->name('degreeshow');

        
        Route::post('/storedegree', 'DegreeModuleController@store')->name('storedegree');
    });
});