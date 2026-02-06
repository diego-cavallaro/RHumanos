<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{

    public function run()
    {
        // Role::truncate();

        $role = new Role();
        $role->name = 'Administrador';
        $role->guard_name = 'web';
        $role->save();

        $role = new Role();
        $role->name = 'Supervisor';
        $role->guard_name = 'web';
        $role->save();

        $role = new Role();
        $role->name = 'Jefe';
        $role->guard_name = 'web';
        $role->save();

        $role = new Role();
        $role->name = 'RRHH';
        $role->guard_name = 'web';
        $role->save();
        
    }

}