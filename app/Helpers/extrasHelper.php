<?php
use App\Models\User;
use App\Models\Extras\Employee;
use Illuminate\Support\Facades\Auth;

function obtenerAreaUsuarioActual()
{
    //Obtenemos el Area asociada al usuario Logueado
    //------------------------------------------------------------------
    $usuario = User::where('nickName', Auth::user()->name)->first();
    $legajo = $usuario->legajo;
    $empleado = Employee::find($legajo);
    
    return $empleado->Area;
}