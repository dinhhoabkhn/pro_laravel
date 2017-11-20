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

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin','Manager_studentController@index');
// Route::get('addstudent','AdminController@create');
// Route::post('addstudent','AdminController@store');
Route::resources([
	'manager_student'=>'Manager_studentController',
	'manager_teacher'=>'Manager_teacherController'
]);