<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Extra extends Model
{
    protected $table = 'fsc_extras';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'employee_id',
        'sector_id',
        'date',
        'hours',
        'approved_level_1',
        'approved_level_2',
        'reason_id',
        'is_closed',
        'area',
        'sector',
        'created_at',
        'responsible',
        'approved_at',
        'approver',
        'notes',
        'from',
        'to',
        'closed_at',
    ];

    protected $casts = [
        'date' => 'datetime',
        'created_at' => 'datetime',
        'approved_at' => 'datetime',
        'from' => 'datetime',
        'to' => 'datetime',
        'closed_at' => 'datetime',
        'approved_level_1' => 'boolean',
        'approved_level_2' => 'boolean',
        'is_closed' => 'boolean',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'legajo');
    }
    
    public function reason(): BelongsTo
    {
        return $this->belongsTo(ExtraReason::class, 'reason_id');
    }
}