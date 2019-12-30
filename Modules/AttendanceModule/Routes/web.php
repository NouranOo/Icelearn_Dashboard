<?php




Route::group(['prefix' => 'admin-panel', 'middleware' => ['auth:admin']], function() {

    Route::prefix('attendance')->group(function() {
        Route::get('/{id}', 'AttendanceModuleController@index')->name('attendance.index');
        

        
        // Route::post('/storedegree', 'DegreeModuleController@store')->name('storedegree');
    });
  
});
Route::prefix('admin-panel')->name('attendance.')->group(function(){

    Route::post('/attendancesearch', 'AttendanceModuleController@search')->name('search');
    Route::post('/attendancestore', 'AttendanceModuleController@store')->name('store');


   Route::POST('updateAttendance', 'AttendanceModuleController@updateAttendance')->name('updateAttendance');

    
        });
