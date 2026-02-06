<?php
namespace App\Models\Extras;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Extras\Employee;
use App\Models\Extras\ExtraReason;

class Extra extends Model
{
    protected $table = 'fsc_extras';
    protected $primaryKey = 'RowId';
    public $timestamps = false;
    protected $connection = 'RHumanos';

    use HasFactory;

    // protected $fillable = [
    //     'employee_id',
    //     'sector_id',
    //     'date',
    //     'hours',
    //     'approved_level_1',
    //     'approved_level_2',
    //     'reason_id',
    //     'is_closed',
    //     'area',
    //     'sector',
    //     'created_at',
    //     'responsible',
    //     'approved_at',
    //     'approver',
    //     'notes',
    //     'from',
    //     'to',
    //     'closed_at',
    // ];

    // protected $casts = [
    //     'date' => 'datetime',
    //     'created_at' => 'datetime',
    //     'approved_at' => 'datetime',
    //     'from' => 'datetime',
    //     'to' => 'datetime',
    //     'closed_at' => 'datetime',
    //     'approved_level_1' => 'boolean',
    //     'approved_level_2' => 'boolean',
    //     'is_closed' => 'boolean',
    // ];

    public function Empleado()
    {
        return $this->hasOne(Employee::class, 'Legajo', 'LegLegajo');
    }
    
    public function Motivo()
    {
        return $this->BelongsTo(ExtraReason::class, 'ID_Motivo', 'Id');
    }
}