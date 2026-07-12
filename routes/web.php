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

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

//Employee
Route::get('/employees', 'EmployeeController@index')->name('employees.index');
Route::get('/employees/create', 'EmployeeController@create')->name('employees.create');
Route::post('/employees', 'EmployeeController@store')->name('employees.store');
Route::get('/employees/{id}/edit', 'EmployeeController@edit')->name('employees.edit');
Route::put('/employees/{id}', 'EmployeeController@update')->name('employees.update');


//Department
Route::get('/departments', 'DepartmentController@index')->name('departments.index');
Route::get('/departments/create','DepartmentController@create')->name('departments.create');
Route::post('/departments', 'DepartmentController@store')->name('departments.store');
Route::get('/departments/{id}/edit', 'DepartmentController@edit')->name('departments.edit');
Route::put('/departments/{id}','DepartmentController@update')->name('departments.update');
Route::delete('/departments/{id}','DepartmentController@destroy')->name('departments.destroy');

//Position

Route::get('/positions', 'PositionController@index')->name('positions.index');
Route::get('/positions/create', 'PositionController@create')->name('positions.create');
Route::post('/positions', 'PositionController@store')->name('positions.store');
Route::get('/positions/{id}/edit', 'PositionController@edit')->name('positions.edit');
Route::put('/positions/{id}', 'PositionController@update')->name('positions.update');
Route::delete('/positions/{id}', 'PositionController@destroy')->name('positions.destroy');

//Attendance
Route::get('/attendance', 'AttendanceController@index')->name('attendance.index');

//WorkSchedule


Route::get('/work-schedules', 'WorkScheduleController@index')->name('work-schedules.index');
Route::get('/work-schedules/create','WorkScheduleController@create')->name('work-schedules.create');
Route::post('/work-schedules','WorkScheduleController@store')->name('work-schedules.store');
Route::get('/work-schedules/{id}/edit','WorkScheduleController@edit')->name('work-schedules.edit');
Route::put('/work-schedules/{id}','WorkScheduleController@update')->name('work-schedules.update');

Route::delete('/work-schedules/{id}', 'WorkScheduleController@destroy' )->name('work-schedules.destroy');

Route::get('/reports/daily', 'DailyAttendanceReportController@index')->name('reports.daily');

Route::get('/reports/monthly', 'MonthlyDTRController@index')->name('reports.monthly');
Route::get('/reports/monthly/print', 'MonthlyDTRController@print')->name('reports.monthly.print');

Route::get('/reports/monthly/pdf', 'MonthlyDTRController@pdf')->name('reports.monthly.pdf');
Route::get('/settings','SystemSettingController@index')->name('settings.index');
Route::post('/settings','SystemSettingController@update')->name('settings.update');