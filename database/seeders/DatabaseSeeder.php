<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call (PermissionSeeder::class);
        $this->call (ModelHasRolesSeeder::class);
        $this->call (RoleHasPermissionSeeder::class);
        $this->call (RoleSeeder::class);
        $this->call (UserSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}