<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //CREATE DEFAULT ROLES
        $roles = ['standard', 'admin'];
        foreach($roles as $role){
            Role::create(['name' => $role]);
        }

        //ASSIGN ADMIN ROLE TO TEST ACCOUNT
        $user = User::find(1);
        $user->assignRole('admin');

        //ASSIGN USER ROLE TO TEST ACCOUNT
        $user = User::find(2);
        $user->assignRole('standard');
    }
}
