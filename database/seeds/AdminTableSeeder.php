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
        	'name'=>'admin',
        	'password'=> bcrypt('admin'),
        ]);
        DB::table('subjects')->insert([
        [
            'name' =>'giai tich',
            'academy'=>'toan-tin',
        ],
        [
            'name'=>'Đại số',
            'academy'=>'toan-tin',
        ],
        [
            'name'=>'Triết 1',
            'academy'=>'Triết',
        ],
        [
            'name'=>'Thể dục',
            'academy'=>'Giáo dục thể chất',
        ]
    ]);
    }
}
