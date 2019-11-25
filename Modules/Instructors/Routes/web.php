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

Route::group(['prefix' => 'instructors', 'middleware' => ['auth:admin']], function() {
//    Route::get('/', 'InstructorsController@index');

    Route::group(['middleware' => ['role:admin|superadmin|writer']], function () {
        Route::resource('/instructors', 'InstructorController')->only(['create', 'store', 'index', 'show']);
    });

    Route::group(['middleware' => ['role:admin|superadmin']], function () {
        Route::resource('/instructors', 'InstructorController')->only(['edit', 'update']);
    });

    Route::group(['middleware' => ['role:superadmin']], function () {
        Route::delete('/delete/{id}', 'InstructorController@destroy');
    });

});
