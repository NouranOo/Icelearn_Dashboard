<?php


Route::group(['prefix' => 'admin-panel', 'middleware' => ['auth:admin']], function() {

    Route::prefix('degrees')->group(function() {

         Route::get('/{id}', 'DegreeModuleController@index')->name('degreeindex');
         Route::get('degreeshow/{id}', 'DegreeModuleController@show')->name('degreeshow');
         Route::post('/storedegree', 'DegreeModuleController@store')->name('storedegree');

    

        
            //////monthes////
            Route::get('/month/{id}', 'DegreeModuleController@month')->name('month');
            Route::post('/storemonth', 'DegreeModuleController@storemonth')->name('storemonth');
            Route::get('createmonth/{id}', 'DegreeModuleController@createmonth')->name('createmonth');

            Route::get('/monthdegree/{id}/{monthid}', 'DegreeModuleController@addMonthDegree')->name('addmonthdegree');



        


    });


    


});