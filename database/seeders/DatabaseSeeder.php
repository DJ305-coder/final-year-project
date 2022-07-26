<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $post['email'] = 'admin@admin.com';
        $post['password'] = Hash::make('12345678');
        $post['otp'] = '123456';
        DB::table('admins')->insert($post);
    }
}
