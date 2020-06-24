<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stars')->insert([
            'id' => 1
        ]);
    }
}
