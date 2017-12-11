<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

    public function tearDown()
    {
        Artisan::call('migrate:rollback');
        parent::tearDown();
    }
    public function prepare()
    {
        $student = Student::create([
            'email'=>'abc123@example.com',
            'password'=>'a',
        ]);
        auth()->login($student);
        $this->student = $student;
    }
    // public function createStudent()
    // {
    //    	$student = Student::create([
    //         'name' => 'Nguyễn Đình Hòa',
    //     ]);
    //     return $student;
    // }
    // public function createTeacher(){
    // 	$teacher = Teacher::create([
    // 		'name'=>'Nguyễn Văn A',
    // 	]);
    // 	return $teacher;
    // }
    // public function createCourse(){
    // 	$course = Course::create([
    // 		'course_code'=>'12345',
    // 		'subject_id'=>'1',
    // 		'teacher_id'=>'2',
    // 	]);
    // 	return $course;
    // }
}
