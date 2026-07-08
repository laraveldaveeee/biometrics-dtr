<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


 
// Route::get('/zk-test', 'ZKController@test');




// Route::get('/live/sync', 'ZKTecoController@syncAttendance');
Route::get('/live','LiveAttendanceController@index');

Route::get('/live/latest', 'LiveAttendanceController@latest');




Route::get('/sync-users', 'ZKTecoController@syncUsers');

Route::get('/sync-attendance', 'ZKTecoController@syncAttendance');

 

Auth::routes([
    'register' => true,
]);


Route::get('/home', 'HomeController@index')->name('home');
