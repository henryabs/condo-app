<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //CREATE DEFAULT PERMISSION
        $permissions = [
            'manage users',
            'create buildings',
            'view buildings',
            'manage billings',
            'generate reports',
            'manage system settings',
        ];

        foreach($permissions as $permission){
            Permission::create(['name' => $permission]);
        }

        //ASSIGN PERMISSION TO STANDARD ROLE
        $role = Role::find(1);
        $permissions = [
            'view buildings',
            'manage billings',
            'generate reports',
        ];
        $role->syncPermissions($permissions);


        //ASSIGN PERMISSION TO ADMIN ROLE
        $role = Role::find(2);
        $permissions = [
            'manage users',
            'create buildings',
            'manage billings',
            'generate reports',
            'manage system settings',
        ];
        $role->syncPermissions($permissions);
    }
}
