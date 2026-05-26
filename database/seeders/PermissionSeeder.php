<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
// use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permission::truncate();
        
        //Accesos a reportes de control
        $permission = new Permission();
        $permission->name = 'canSeeReportsMenu';
        $permission->guard_name = 'web';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'canSeePendingReport';
        $permission->guard_name = 'web';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'canSeePeriodReport';
        $permission->guard_name = 'web';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'canSeeControlReport';
        $permission->guard_name = 'web';
        $permission->save();
        //----------------------------------------

        //Accesos a menues de carga de Horas
        $permission = new Permission();
        $permission->name = 'canSeeHoursEntryMenu';
        $permission->guard_name = 'web';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'canExtraHoursEntry';
        $permission->guard_name = 'web';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'canCaloriaHoursEntry';
        $permission->guard_name = 'web';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'canMetalicaHoursEntry';
        $permission->guard_name = 'web';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'canAlturaHoursEntry';
        $permission->guard_name = 'web';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'canProfundidadHoursEntry';
        $permission->guard_name = 'web';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'canDesmoldeoHoursEntry';
        $permission->guard_name = 'web';
        $permission->save();
        //----------------------------------------

        //Accesos a menues de Aprobacion de Horas
        $permission = new Permission();
        $permission->name = 'canSeeAprovalMenu';
        $permission->guard_name = 'web';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'canCheckExtras';
        $permission->guard_name = 'web';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'canCheckOthers';
        $permission->guard_name = 'web';
        $permission->save();
        //----------------------------------------
        
        //Accesos a menues de cierre de Horas
        $permission = new Permission();
        $permission->name = 'canSeeHoursClosingMenu';
        $permission->guard_name = 'web';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'canExtraHoursClosing';
        $permission->guard_name = 'web';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'canCaloriaHoursClosing';
        $permission->guard_name = 'web';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'canMetalicaHoursClosing';
        $permission->guard_name = 'web';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'canAlturaHoursClosing';
        $permission->guard_name = 'web';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'canProfundidadHoursClosing';
        $permission->guard_name = 'web';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'canDesmoldeoHoursClosing';
        $permission->guard_name = 'web';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'canSeeHistoricoCierre';
        $permission->guard_name = 'web';
        $permission->save();
    }
}