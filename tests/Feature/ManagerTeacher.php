<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManagerTeacher extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    public  function testIndex()
    {
        $response = $this->get(route('manager_teacher.index'));
        $response ->assertStatus(200);
    }
    public function testCreate()
    {
        $data = [
          'name'=>'Nguyen van A',
          'email'=>'info@example.com',
          'address'=>'Thanh hoa',
          'birthday'=>'19/05/1990'
        ];
    }
}
