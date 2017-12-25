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
		'manager_course'=>'ManagerCourseController',
        'manager_subject'=>'ManagerSubjectController'
	]);
	Route::get('liststudent','StatisticController@listStudent')->name('liststudent');
	Route::get('logout','AuthController@logoutAdmin')->name('admin.logout');
	Route::get('statistic-point/{id}','StatisticController@pointStudent')->name('statistic_point');
	Route::get('search-student','ManagerStudentController@searchStudent');
	Route::get('list-course','StatisticController@listCourse');
});

// Route::group()
Route::get('login','AuthController@getLoginAdmin')->name('get_login');
Route::post('login','AuthController@postLoginAdmin')->name('post_login');
Route::get('teacher/login','TeacherController@getLoginTeacher')->name('teacher.get_login');
Route::post('teacher/login','TeacherController@postLoginTeacher')->name('teacher.post_login');
Route::get('student/login','StudentController@getLoginStudent')->name('student.get_login');
Route::post('student/login','StudentController@postLoginStudent')->name('student.post_login');


Route::middleware('check_teacher')->group(function (){
	Route::prefix('teacher')->group(function (){
		Route::get('/','TeacherController@showCourse')->name('teacher');
		Route::post('/deleteregister/{id}','TeacherController@deleteRegisterCourse')->name('teacher.delete_register');
		Route::get('list-course','TeacherController@listCourse')->name('teacher.course');
		Route::get('logout','TeacherController@logoutTeacher')->name('teacher.logout');
        Route::get('my-information','TeacherController@teacherInformation')->name('teacher.information');
		Route::post('register-course/{id}','TeacherController@registerCourse')->name('teacher.register_course');
		Route::get('list-student/{id}','TeacherController@listStudentCourse')->name('teacher.list_student_course');
		Route::post('point-student/{courseId}','TeacherController@pointStudent')->name('teacher.point_student');
		Route::get('rs-password-teacher','TeacherController@getResetPassword')->name('teacher.get_rs_password');
        Route::post('rs-password-teacher','TeacherController@postResetPassword')->name('teacher.post_rs_password');

    });
	Route::post('verify/{token}','TeacherController@verifyTeacher')->name('teacher.verify');
});
// Route::group(['middleware'=>'check_teacher','prefix'=>'teacher'], function({
// }))
Route::prefix('student')->group(function(){
	Route::middleware('check_student')->group(function(){
		Route::get('logout','StudentController@logoutStudent')->name('student.logout');
		Route::get('/','StudentController@listMyCourse')->name('student');
		Route::get('list-course','StudentController@listCourse')->name('student.list_course');
		Route::post('register/{id}','StudentController@registerCourseStudent')->name('student.register');
		Route::post('delete/{id}','StudentController@deleteCourse')->name('student.delete');
		Route::get('my-information','StudentController@studentInformation')->name('student.information');
		Route::get('rs-password','StudentController@getResetPassword')->name('student.get_rs_password');
		Route::post('rs-password','StudentController@postResetPassword')->name('student.post_rs_password');
		Route::post('change-avatar','StudentController@changeAvatar')->name('student.change-avatar');
	});
	Route::post('verify/{token}','StudentController@verify')->name('student.verify');
	Route::get('forgot-password-student','StudentController@getForgotPasswordStudent')->name('student.forgot_password_student');
	Route::post('send-forgot-password-student','StudentController@postForgotpasswordStudent')->name('student.send_forgot_password_student');
	Route::post('new-password/{token}','StudentController@check')->name('student.new_password');
	Route::post('change-password/{id}','StudentController@changePassword')->name('student.change_password');
});
