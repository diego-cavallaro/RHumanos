<?php
namespace App\Models\Extras;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Extras\Employee;
use App\Models\Extras\ExtraReason;

class ExtraEstado extends Model
{
    protected $table = 'fsc_extras_estados';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $connection = 'RHumanos';

    use HasFactory;

    public function Empleado()
    {
        return $this->hasOne(Employee::class, 'Legajo', 'LegLegajo');
    }
    
    public function Motivo()
    {
        return $this->BelongsTo(ExtraReason::class, 'ID_Motivo', 'Id');
    }
}