<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ModelHasRole;

class ModelHasRolesSeeder extends Seeder
{

    public function run()
    {
        //Administrador ####################
        $role = new ModelHasRole();
        $role->role_id = 1;
        $role->model_type = 'App\Models\User';
        $role->model_id = 1;
        $role->save();
        //Resto de los usuarios
        $role = new ModelHasRole(); $role->role_id = 3; $role->model_type = 'App\Models\User'; $role->model_id = 2; $role->save();
        $role = new ModelHasRole(); $role->role_id = 1; $role->model_type = 'App\Models\User'; $role->model_id = 3; $role->save();
        $role = new ModelHasRole(); $role->role_id = 3; $role->model_type = 'App\Models\User'; $role->model_id = 4; $role->save();
        $role = new ModelHasRole(); $role->role_id = 3; $role->model_type = 'App\Models\User'; $role->model_id = 5; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 6; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 7; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 8; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 9; $role->save();
        $role = new ModelHasRole(); $role->role_id = 3; $role->model_type = 'App\Models\User'; $role->model_id = 10; $role->save();
        $role = new ModelHasRole(); $role->role_id = 3; $role->model_type = 'App\Models\User'; $role->model_id = 11; $role->save();
        $role = new ModelHasRole(); $role->role_id = 3; $role->model_type = 'App\Models\User'; $role->model_id = 12; $role->save();
        $role = new ModelHasRole(); $role->role_id = 3; $role->model_type = 'App\Models\User'; $role->model_id = 13; $role->save();
        $role = new ModelHasRole(); $role->role_id = 3; $role->model_type = 'App\Models\User'; $role->model_id = 14; $role->save();
        $role = new ModelHasRole(); $role->role_id = 3; $role->model_type = 'App\Models\User'; $role->model_id = 15; $role->save();
        $role = new ModelHasRole(); $role->role_id = 3; $role->model_type = 'App\Models\User'; $role->model_id = 16; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 17; $role->save();
        $role = new ModelHasRole(); $role->role_id = 3; $role->model_type = 'App\Models\User'; $role->model_id = 18; $role->save();
        $role = new ModelHasRole(); $role->role_id = 3; $role->model_type = 'App\Models\User'; $role->model_id = 19; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 20; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 21; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 22; $role->save();
        $role = new ModelHasRole(); $role->role_id = 3; $role->model_type = 'App\Models\User'; $role->model_id = 23; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 24; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 25; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 26; $role->save();
        $role = new ModelHasRole(); $role->role_id = 4; $role->model_type = 'App\Models\User'; $role->model_id = 27; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 28; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 29; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 30; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 31; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 32; $role->save();
        $role = new ModelHasRole(); $role->role_id = 4; $role->model_type = 'App\Models\User'; $role->model_id = 33; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 34; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 35; $role->save();
        $role = new ModelHasRole(); $role->role_id = 3; $role->model_type = 'App\Models\User'; $role->model_id = 36; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 37; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 38; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 39; $role->save();
        $role = new ModelHasRole(); $role->role_id = 3; $role->model_type = 'App\Models\User'; $role->model_id = 40; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 41; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 42; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 43; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 44; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 45; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 46; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 47; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 48; $role->save();
        $role = new ModelHasRole(); $role->role_id = 3; $role->model_type = 'App\Models\User'; $role->model_id = 49; $role->save();
        $role = new ModelHasRole(); $role->role_id = 3; $role->model_type = 'App\Models\User'; $role->model_id = 50; $role->save();
        $role = new ModelHasRole(); $role->role_id = 2; $role->model_type = 'App\Models\User'; $role->model_id = 51; $role->save();
    }
}