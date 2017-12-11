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
	Route::get('admin','ManagerStudentController@index');
	Route::resources([
		'manager_student'=>'ManagerStudentController',
		'manager_teacher'=>'ManagerTeacherController',
		'manager_course'=>'ManagerCourseController'
	]);
	Route::get('liststudent','StatisticController@listStudent')->name('liststudent');
	Route::get('logout','AuthController@logoutAdmin')->name('admin.logout');
	Route::get('statisticpoint/{id}','StatisticController@pointStudent')->name('statisticpoint');
	Route::post('searchstudent','ManagerStudentController@searchStudent')->name('manager_student.search');
	Route::post('searchteacher','ManagerTeacherController@searchTeacher')->name('manager_teacher.search');
	Route::post('searchcourse','ManagerCourseController@searchCourse')->name('manager_course.search');
});

// Route::group()
Route::get('login','AuthController@getLoginAdmin')->name('getlogin');
Route::post('login','AuthController@postLoginAdmin')->name('postlogin');
Route::get('teacher/login','TeacherController@getLoginTeacher')->name('teacher.getlogin');
Route::post('teacher/login','TeacherController@postLoginTeacher')->name('teacher.postlogin');
Route::get('student/login','StudentController@getLoginStudent')->name('student.getlogin');
Route::post('student/login','StudentController@postLoginStudent')->name('student.postlogin');


Route::middleware('check_teacher')->group(function (){
	Route::prefix('teacher')->group(function (){
		Route::get('/','TeacherController@showCourse')->name('teacher');
		Route::post('/deleteregister/{id}','TeacherController@deleteRegisterCourse')->name('teacher.deleteregister');
		Route::get('listcourse','TeacherController@listCourse')->name('teacher.course');
		Route::get('logout','TeacherController@logoutTeacher')->name('teacher.logout');
		Route::post('registercourse/{id}','TeacherController@registerCourse')->name('teacher.registercourse');
		Route::get('liststudent/{id}','TeacherController@listStudentCourse')->name('teacher.liststudent.course');
		Route::post('pointstudent/{courseId}','TeacherController@pointStudent')->name('teacher.pointstudent');
	});
	Route::post('verify/{token}','TeacherController@verifyTeacher')->name('teacher.verify');
});
// Route::group(['middleware'=>'check_teacher','prefix'=>'teacher'], function({
// }))
Route::prefix('student')->group(function(){
	Route::middleware('check_student')->group(function(){
		Route::get('logout','StudentController@logoutStudent')->name('student.logout');
		Route::get('/','StudentController@listMyCourse')->name('student');
		Route::get('listcourse','StudentController@listCourse')->name('student.listcourse');
		Route::post('register/{id}','StudentController@registerCourseStudent')->name('student.register');
		Route::post('delete/{id}','StudentController@deleteCourse')->name('student.delete');
		Route::get('myinformation','StudentController@studentInformation')->name('student.information');
		Route::get('rspassword','StudentController@getResetPassword')->name('student.getrspassword');
		Route::post('rspassword','StudentController@postResetPassword')->name('student.postrspassword');
	});
	Route::post('verify/{token}','StudentController@verify')->name('student.verify');
	Route::get('forgotpasswordstudent','StudentController@getForgotPasswordStudent')->name('student.forgotpasswordstudent');
	Route::post('sendforgotpasswordstudent','StudentController@postForgotpasswordStudent')->name('student.sendforgotpasswordstudent');
	Route::post('newpassword/{token}','StudentController@check')->name('student.newpassword');
	Route::post('changepassword/{id}','StudentController@changePassword')->name('student.changepassword');
});
