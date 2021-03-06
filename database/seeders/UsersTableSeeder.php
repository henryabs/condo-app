<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            0 => array(
                'name' => 'Webmaster',
                'email' => 'webmaster@testmail.com',
                'password' => Hash::make('12345678'),
            ),
            1 => array(
                'name' => 'Henry Abayan',
                'email' => 'henry.abayan@gmail.com',
                'password' => Hash::make('12345678'),
            ),
        ));
    }
}
