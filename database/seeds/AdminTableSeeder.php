<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
        	'name'=>'test',
        	'password'=> bcrypt('1234'),
        ]);
        DB::table('subjects')->insert([
            'name' =>'giai tich',
            'academy'=>'toan-tin',
        ]);
    }
}
