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
Route::get('teacher/login','TeacherController@getLoginTeacher');
Route::post('teacher/login','TeacherController@postLoginTeacher');


Route::middleware('check_teacher')->group(function (){
	Route::prefix('teacher')->group(function (){
		Route::get('logout','TeacherController@logoutTeacher');
		Route::get('/','TeacherController@showCourse');
		Route::post('/deleteregister/{id}','TeacherController@deleteRegisterCourse')->name('teacher.deleteregister');
		Route::get('listcourse','TeacherController@listCourse')->name('teacher.course');
		Route::post('registercourse/{id}','TeacherController@registerCourse')->name('teacher.registercourse');
	});
});
// Route::group(['middleware'=>'check_teacher','prefix'=>'teacher'], function({

// }))