<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post['email'] = 'mplussoftesting@gmail.com';
        $post['password'] = Hash::make('12345678');
        $post['otp'] = '123456';
        DB::table('admins')->insert($post);
    }
}
