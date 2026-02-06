<?php

namespace App\Http\Requests\Extras;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
use Illuminate\Validation\Rule;

class UpdateExtra extends FormRequest
{
    public function Authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
       return[
          'Empleado' => ['required', 
                          'max:10',
                        ],
          'Fecha' => ['required'],
          'Motivo' => ['required'],
          'Desde' => ['required', 'date_format:H:i'],
          'Hasta' => ['required', 'date_format:H:i', 'after:Desde'],
          'Observaciones' => ['max:200'],
       ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
            //   dd($validator->safe());

              $empleado = $validator->safe()->Empleado;
              $motivo = $validator->safe()->Motivo;
              $desde = $validator->safe()->Desde;
              $hasta = $validator->safe()->Hasta;
  
              if($empleado === "0")
              {
                $validator->errors()->add(
                    'Empleado',
                    "Se debe seleccionar un Empleado."
                );
              }
              if($motivo === "0")
              {
                $validator->errors()->add(
                    'Motivo',
                    "Se debe seleccionar un Tipo."
                );
              }
              if($desde === "" || $desde === null || $desde === "0")
              {
                $validator->errors()->add(
                    'Desde',
                    "Se debe especificar desde que Hora."
                );
              }
              if($hasta === "")
              {
                $validator->errors()->add(
                    'Hasta',
                    "Se debe especificar hasta que Hora."
                );
              }
            }
        ];
    }
}