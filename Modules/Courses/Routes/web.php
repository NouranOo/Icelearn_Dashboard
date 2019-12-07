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

    /**
     *   Reservations
     */
    Route::group(['middleware' => ['role:superadmin|admin|writer']], function () {
        Route::resource('/reservation', 'ReservationController')->only(['create', 'store', 'index', 'show']);
    });

    Route::group(['middleware' => ['role:superadmin|admin']], function () {
        Route::resource('/reservation', 'ReservationController')->only(['edit', 'update']);
    });

    Route::group(['middleware' => ['role:superadmin']], function () {
        Route::delete('/reservation/delete/{id}', 'ReservationController@destroy');
        Route::post('/reservation/{id}', 'ReservationController@store');
    });


    /**
     *   Sessions
     */
    Route::group(['middleware' => ['role:superadmin|admin|writer']], function () {
        Route::resource('/sessions', 'SessionController')->only(['create', 'store', 'index', 'show']);
    });

    Route::group(['middleware' => ['role:superadmin|admin']], function () {
        Route::resource('/sessions', 'SessionController')->only(['edit', 'update']);
    });

    Route::group(['middleware' => ['role:superadmin']], function () {
        Route::delete('/sessions/delete/{id}', 'SessionController@destroy');
        Route::post('/sessions/{id}', 'SessionController@store');
    });


    /**
     *   Groups
     */
    Route::group(['middleware' => ['role:superadmin|admin|writer']], function () {
        Route::resource('/groups', 'GroupController')->only(['create', 'store', 'index', 'show']);
    });

    Route::group(['middleware' => ['role:superadmin|admin']], function () {
        Route::resource('/groups', 'GroupController')->only(['edit', 'update']);
    });

    Route::group(['middleware' => ['role:superadmin']], function () {
        Route::delete('/groups/delete/{id}', 'GroupController@destroy');
    });



    /**
     *   Courses
     */
    Route::group(['middleware' => ['role:superadmin|admin|writer']], function () {
        Route::resource('/courses', 'CoursesController')->only(['create', 'store', 'index', 'show']);
    });

    Route::group(['middleware' => ['role:superadmin|admin']], function () {
        Route::resource('/courses', 'CoursesController')->only(['edit', 'update']);
    });

    Route::group(['middleware' => ['role:superadmin']], function () {
        Route::delete('/courses/delete/{id}', 'CoursesController@destroy');
    });
    Route::group(['middleware' => ['role:superadmin']], function () {
        Route::get('/courses/viewlevels/{id}', 'CoursesController@viewlevels')->name('viewlevels');
    });

    /**
     *  Tracks
     */
    Route::group(['middleware' => ['role:superadmin|admin|writer']], function () {
        Route::resource('/tracks', 'TrackController')->only(['create', 'store', 'index', 'show']);
    });

    Route::group(['middleware' => ['role:superadmin|admin']], function () {
        Route::resource('/tracks', 'TrackController')->only(['edit', 'update']);
    });

    Route::group(['middleware' => ['role:superadmin']], function () {
        Route::delete('/tracks/delete/{id}', 'TrackController@destroy');
    });

    /**
     * Levels
     */
    Route::group(['middleware' => ['role:superadmin|admin|writer']], function () {
        Route::resource('/levels', 'LevelController')->only(['create', 'store', 'index', 'show']);
    });

    Route::group(['middleware' => ['role:superadmin|admin']], function () {
        Route::resource('/levels', 'LevelController')->only(['edit', 'update']);
    });

    Route::group(['middleware' => ['role:superadmin']], function () {
        Route::delete('/levels/delete/{id}', 'LevelController@destroy');
    });

    /**
     *  Course Categories
     */
    Route::group(['middleware' => ['role:superadmin|admin|writer']], function () {
        Route::resource('/categories', 'CategoriesController')->only(['create', 'store', 'index', 'show']);
    });

    Route::group(['middleware' => ['role:superadmin|admin']], function () {
        Route::resource('/categories', 'CategoriesController')->only(['edit', 'update']);
    });

    Route::group(['middleware' => ['role:superadmin']], function () {
        Route::delete('/categories/delete/{id}', 'CategoriesController@destroy');
    });

    Route::get('/ajax', 'CategoriesController@ajaxDataSrc');

    ///////anas/////
    Route::get('/coursepayments/{id}','CoursesController@coursepayments')->name('coursepayments');
    Route::get('/levelpayments/{id}','LevelController@levelpayments')->name('levelpayments');
    Route::get('/viewstudents/{id}','CoursesController@viewstudents')->name('viewstudents');
    Route::get('/viewstudentslevels/{id}','LevelController@viewstudentslevels')->name('viewstudentslevels');




});
