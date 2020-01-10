<?php


Route::group(['prefix' => 'admin-panel', 'middleware' => ['auth:admin']], function() {

    Route::prefix('degrees')->group(function() {

         Route::get('getdegree/{id}/{monthid}', 'DegreeModuleController@index')->name('degreeindex');
         Route::get('degreeshow/{id}', 'DegreeModuleController@show')->name('degreeshow');
         Route::post('/storedegree', 'DegreeModuleController@store')->name('storedegree');


            Route::post('/updatedegree', 'DegreeModuleController@updateSubDegrees')->name('update.subdegree');

    

        
            //////monthes////
            Route::get('/monthessss/{id}', 'DegreeModuleController@monthNew')->name('month.all');
            Route::post('/storemonth', 'DegreeModuleController@storemonth')->name('storemonth');
            Route::get('createmonth/{id}', 'DegreeModuleController@createmonth')->name('createmonth');
            Route::get('/monthdegree/{id}/{monthid}', 'DegreeModuleController@addMonthDegree')->name('addmonthdegree');
            Route::delete('/deletemonth/{id}', 'DegreeModuleController@deleteMonth')->name('deletemonth');
            Route::post('/storemonthdegree', 'DegreeModuleController@storeMonthDegree')->name('storemonthdegree');

            Route::post('/updatemonthdegree', 'DegreeModuleController@updateMonthDegrees')->name('update.monthdegree');


    });


    


});