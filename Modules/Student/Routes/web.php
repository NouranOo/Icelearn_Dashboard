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

Route::group(['prefix' => 'admin-panel', 'middleware' => ['auth:admin']], function() {
//    Route::get('/', 'StudentController@index');
    Route::get('getstudentpayments/{id}','StudentController@getstudentpayments');
    Route::group(['middleware' => ['role:superadmin|admin|writer']], function () {
        Route::resource('/student', 'StudentController')->only(['create', 'store', 'index', 'show']);
        Route::post('getlevelsofcourse','StudentController@getlevelsofcoursess');
        Route::get('student/addcourse/{id}','StudentController@getaddcourse');
        Route::post('student/addcourse','StudentController@addcourse');
        Route::post('student/searchbarcode','StudentController@searchBarCode');
    });

    Route::group(['middleware' => ['role:superadmin|admin']], function () {
        Route::resource('/student', 'StudentController')->only(['edit', 'update']);
    });

    Route::group(['middleware' => ['role:superadmin']], function () {
        Route::delete('/deletess/{id}', 'StudentController@destroy');
    });
});

Route::group(['prefix' => 'admin-panel', 'middleware' => ['auth:admin']], function() {
    //    Route::get('/', 'StudentController@index');

    Route::group(['middleware' => ['role:superadmin|admin|writer']], function () {
        Route::resource('/parent', 'ParentController')->only(['create', 'store', 'index', 'show']);
    });

    Route::group(['middleware' => ['role:superadmin|admin']], function () {
        Route::resource('/parent', 'ParentController')->only(['edit', 'update']);
    });

    Route::group(['middleware' => ['role:superadmin']], function () {
        Route::delete('/delete/{id}', 'ParentController@destroy');
    });
});
