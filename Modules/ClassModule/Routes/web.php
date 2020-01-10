<?php

Route::group(['prefix' => 'admin-panel', 'middleware' => ['auth:admin']], function() {

        Route::prefix('classes')->group(function() {
            Route::get('/', 'ClassModuleController@index')->name('classindex');
            Route::get('/createclass', 'ClassModuleController@create')->name('createclass');
            Route::post('/storeclass', 'ClassModuleController@store')->name('storeclass');

            Route::delete('/deleteclass/{id}', 'ClassModuleController@destroy')->name('deleteclass');

            Route::get('/studentclass/{id}', 'ClassModuleController@studentclass')->name('studentclass');
            Route::delete('/deletestudentclass/{id}', 'ClassModuleController@deletestudentclass')->name('deletestudentclass');

            //classdeg
            Route::get('/classdeg/{id}', 'ClassModuleController@DegreeClass')->name('class.deg');

            ////subclass//

            Route::get('/subclass/{id}/{monthid}', 'ClassModuleController@subclass')->name('subclass');
            Route::get('/createsubclass/{id}/{monthid}', 'ClassModuleController@createsubclass')->name('createsubclass');
            Route::post('/storesubclass', 'ClassModuleController@storesubclass')->name('storesubclass');

            Route::delete('/deletesubclass/{id}', 'ClassModuleController@deletesubclass')->name('deletesubclass');



            



        });
});