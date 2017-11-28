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
Route::middleware('check')->group(function (){
	Route::get('admin','Manager_studentController@index');
	Route::resources([
		'manager_student'=>'Manager_studentController',
		'manager_teacher'=>'Manager_teacherController',
		'manager_course'=>'Manager_courseController'
	]);
	Route::get('logout','AuthController@logout_admin');
});

// Route::group()
Route::get('login','AuthController@getLoginAdmin');
Route::post('login','AuthController@postLoginAdmin');

Route::middleware('check_teacher')->group(function (){
	Route::prefix('teacher')->group(function (){
		Route::get('/login','TeacherController@getLoginTeacher');
		Route::post('login','TeacherController@postLoginTeacher');
		Route::get('/','TeacherController@showCourse');
		Route::get('listcourse','TeacherController@listCourse');
	});
});