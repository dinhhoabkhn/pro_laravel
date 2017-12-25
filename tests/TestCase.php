<?php

namespace Tests;

use function GuzzleHttp\default_user_agent;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;
use App\Student;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }
//    public function prepare()
//    {
//        $admin = Admin::create([
//            'name'=>'admin',
//            'password'=>'admin',
//        ]);
//        auth()->login($admin);
//        $this->admin = $admin;
//    }
    public function createStudent(){
        $student = Student::create([
            'email' => 'dinhhoabkhn95@gmail.com',
            'password'=> bcrypt('1'),
            'email_token'=>str_random(10),
            'name' => 'nguyen van b',
            'student_code' => '13131311',
            'phone' => '0123456780',
            'birthday' => '1995-05-10',
            'class' => 'CNTT-TT 2.04',
            'address' => 'Thanh hoa',
        ]);
        return $student;
    }
    public function tearDown()
    {
        Artisan::call('migrate:rollback');
        parent::tearDown();
    }
}
