<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Mail\AuthenticateLogin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ManagerStudentTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public $student;

    /**
     * A basic test example.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $this->assertTrue(true);
    // }
    public function setUp()
    {
        parent::setUp();
        $this->withoutMiddleware();
        $this->student = $this->createStudent();
    }
//    public function testIndex()
//    {
//        $this->withoutMiddleware();
//        $response = $this->get(route('manager_student.index'));
//        $response->assertStatus(200);
//    }
    public function testCreate()
    {
        $this->withoutMiddleware();
        $data = [
            'email' => 'dinhhoabk95@gmail.com',
            'name' => 'nguyen van a',
            'student_code' => '20131111',
            'phone' => '0123456789',
            'birthday' => '1995-05-19',
            'class' => 'CNTT-TT 2.03',
            'address' => 'thanh hoa',
        ];
        $response = $this->post(route('manager_student.store'), $data);
        $this->assertDatabaseHas('students', [
            'email' => 'dinhhoabk95@gmail.com',
            'name' => 'nguyen van a',
            'student_code' => '20131111',
            'phone' => '0123456789',
            'birthday' => '1995-05-19',
            'class' => 'CNTT-TT 2.03',
            'address' => 'thanh hoa',
        ]);
        $response = $this->get(route('manager_student.index'));
        $response->assertStatus(200);

    }

//    public function testAuthenticateStudent()
//    {
//      $student = $this->student;
//        Mail::fake();
//        $this->withoutMiddleware();
////         Mail::assertSent(AuthenticateLogin::class,function($email) use ($student){
////             dd($student);
////             return ($email->student->id === $student->name);
////         });
//        Mail::assertSent(AuthenticateLogin::class, function ($mail) use ($student) {
//            dd(1);
//            return $mail->hasTo($student->email) &&
//                   $mail->hasCc('...') &&
//                   $mail->hasBcc('...');
//        });
//        Mail::assertSent(AuthenticateLogin::class, 2);
//        Mail::assertNotSent(AnotherMailable::class);
//    }
//    public function testEdit()
//    {
//        $this->withoutMiddleware();
//        $response = $this->get(route('manager_student.edit', ['id'=> $this->student->id]));
//        $response->assertStatus(500);
//    }
//
//    public function testUpdate()
//    {
//        $this->withoutMiddleware();
//        $data = [
//            'email' => 'info123@example.com',
//            'name' => 'nguyen van b',
//            'student_code' => '20131671',
//            'phone' => '0123456789',
//            'birthday' => '1995-05-19',
//            'class' => 'CNTT-TT 2.03',
//            'address' => 'thanh hoa',
//        ];
//        $response = $this->put(route('manager_student.update',['id'=>$this->student->id]), $data);
//        $response->assertStatus(302);
//        $this->assertDatabaseHas('students', [
//            'email' => 'info123@example.com',
//            'name' => 'nguyen van b',
//            'student_code' => '20131671',
//            'phone' => '0123456789',
//            'birthday' => '1995-05-19',
//            'class' => 'CNTT-TT 2.03',
//            'address' => 'thanh hoa',
//        ]);
//        $response = $this->get(route('manager_student.index'));
//        $response->assertStatus(200);
//    }
//
//
//    public function testAvatarUpload()
//    {
//        Storage::fake('avatars');
//
//        $response = $this->json('POST', '/change_avatar', [
//            'avatar' => UploadedFile::fake()->image('avatar.jpg')
//        ]);
//
//        // Assert the file was stored...
//        Storage::disk('avatars')->assertExists('avatar.jpg');
//
//        // Assert a file does not exist...
//        Storage::disk('avatars')->assertMissing('missing.jpg');
//    }
}

