<?php

namespace App\Exports;

use App\Models\Extras\Extra;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExtrasExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{

    public function __construct(private $extrasFiltradas)
    {
        $this->extrasFiltradas = $extrasFiltradas;
        $this->extrasFiltradas = $this->prepareData();
        // dd($this->extrasFiltradas);
    }

    public function styles(Worksheet $sheet)
    {
        return 
        [
            // Aplica negrita a la fila de encabezados
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function collection()
    {
        return $this->extrasFiltradas;
    }

    public function headings(): array
    {
        return [
            'Area',
            'Sector',
            'Legajo',
            'Nombres',
            'Motivo',
            'Fecha',
            'Desde',
            'Hasta',
            'Horas',
            'Fec.Alta',
            'Responsable',
            'Observaciones'
        ];
    }

    private function prepareData()
    {
        return $this->extrasFiltradas->map(function ($extra) 
        {
            return [
                'Area' => $extra->area ?? '',
                'Sector' => $extra->sector ?? '',
                'Legajo' => $extra->LegLegajo,
                'Nombres' => $extra->Empleado->Apellido.', '.$extra->Empleado->Nombre ?? '',
                'Motivo' => $extra->Motivo->Description ?? '',
                'Fecha' => $extra->Fecha,
                'Desde' => $extra->Desde,
                'Hasta' => $extra->Hasta,
                'Horas' => $extra->Extras,
                'Fec.Alta' => $extra->FechaAlta,
                'Responsable' => $extra->Responsable,
                'Observaciones' => $extra->Observaciones
            ];
        });
    }
}
