<?php
use App\Models\Extras\Employee;
use Illuminate\Support\Facades\Auth;


function obtenerAreaUsuarioActual()
{
    //Obtenemos el Area asociada al usuario Logueado
    //------------------------------------------------------------------
    $usuario = Auth::user()->name; // conservo $usuario por si necesacita en otra función
    $legajo = Auth::user()->legajo;;
    $empleado = Employee::find($legajo);
    
    return $empleado->Area;
}