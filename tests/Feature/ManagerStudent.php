<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use RefreshDatabase;
use App\Mail\AuthenticateLogin;
use Illuminate\Support\Facades\Mail;

class ManagerStudent extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $this->assertTrue(true);
    // }
    // public function setup(){
    // 	parent::setUp();
    // }
    public function testIndex(){
    	$response = $this->get(route('manager_student.index'));
    	$response ->assertStatus(200);
    }
    public function testCreate(){
    	$data = [
    		'email'=>'info123@example.com',
    		
    		'name'=>'nguyen van a',
    		'student_code'=>'20131671',
    		'phone'=>'0123456789',
    		'birthday'=>'19/05/1995',
    		'class'=>'CNTT-TT 2.03',
    		'address'=>'thanh hoa',
    	];
    	$response = $this->post(route('manager_student.store',$data));
    	$this->assertDatabaseHas('student',[
    		'email'=>'info123@example.com',
    		'password'=>'1';
    		'name'=>'nguyen van a',
    		'student_code'=>'20131671',
    		'phone'=>'0123456789',
    		'birthday'=>'19/05/1995',
    		'class'=>'CNTT-TT 2.03',
    		'address'=>'thanh hoa',
    	])
    	$response = $this->get(route('manager_student.index'));
    	$response->assertStatus(200);
    }
    public function testCreateFail(){
    	$data = [
    		'email'=>'info123@example.com',
    		'name'=>'nguyen van a',
    		'student_code'=>'20131671',
    		'phone'=>'0123456789',
    		'birthday'=>'19/05/1995',
    		'class'=>'CNTT-TT 2.03',
    		'address'=>'thanh hoa',
    	];
    	$response = $this->post(route('manager_student.store',$data));
    	$response->assertstatus(302);
    }
    public function testAuthenticateStudent(){
        MAil::fake();
        // Mail::assertSent(AuthenticateLogin::class,function($email) use ($student){
        //     return $email->student->id === $student->id;
        // });
        Mail::assertSent(AuthenticateLogin::class, function ($mail) use ($student) {
            return $mail->hasTo($student->email) &&
                   $mail->hasCc('...') &&
                   $mail->hasBcc('...');
        });
        Mail::assertSent(AuthenticateLogin::class, 2);
        Mail::assertNotSent(AnotherMailable::class);
    }
    public function testEdit(){
    	$response = $this->get(route('manager_student.edit'),['id'=>$this->student->id]);
    	$response->assertStatus(200);
    }
    public function testUpdate(){
    	$data = [
    		'email'=>'info123@example.com',
    		'name'=>'nguyen van a',
    		'student_code'=>'20131671',
    		'phone'=>'0123456789',
    		'birthday'=>'19/05/1995',
    		'class'=>'CNTT-TT 2.03',
    		'address'=>'thanh hoa',
    	];
    	$response = $this->post(route('manager_student.update',$data));
    	$this->assertDatabaseHas('student',[
    		'email'=>'info123@example.com',
    		'name'=>'nguyen van a',
    		'student_code'=>'20131671',
    		'phone'=>'0123456789',
    		'birthday'=>'19/05/1995',
    		'class'=>'CNTT-TT 2.03',
    		'address'=>'thanh hoa',
    	])
    	$response->$this->get(route('manager_student.index'));
    	$response->assertStatus(302);
    }
    public function testSearch(){
    	$response = $this->get(route('manager_student.index'));
    	$response->assertStatus(200);
    	$response->assertSeeText($this->student->student_code);
    }
}
