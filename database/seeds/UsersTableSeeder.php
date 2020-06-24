<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'level' => '1',
            'email' => 'admin@gmail.com',
            'master' => 'yes',
            'admin' => 'yes',
            'whatsapp' => '61999999999',
            'password' => bcrypt('admin123'),
        ]);
        DB::table('users')->insert([
            'name' => 'Lindomar',
            'email' => 'lsantosmanga21@gmail.com',
            'master' => 'none',
            'admin' => 'yes',
            'whatsapp' => '6199963743',
            'password' => bcrypt('admin123'),
        ]);
        DB::table('users')->insert([
            'name' => 'Luh',
            'email' => 'luh@gmail.com',
            'master' => 'none',
            'admin' => 'yes',
            'whatsapp' => '61999999999',
            'password' => bcrypt('admin123'),
        ]);
    }
}
