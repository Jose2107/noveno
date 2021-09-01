<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Salvador',
            'email' => 'Lenovo.Salvador79@gmail.com',
            'password' => Hash::make('salvador123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Ruben',
            'email' => 'rubencito046@gmail.com',
            'password' => Hash::make('Ruben123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Edgar',
            'email' => 'adminEdgar@gmail.com',
            'password' => Hash::make('Edgar123456'),
        ]);
    }
}
