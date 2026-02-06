<?php
namespace App\Models\Extras;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeLogin extends Model
{
    protected $table = 'fsc_personal_link';
    public $timestamps = false;
    protected $connection = 'RHumanos';

    protected $fillable = [
        'employee_id',
        'ad_id',
        'edition_level_id',
        'login',
        'password',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'legajo');
    }
    
    public function editionLevel(): BelongsTo
    {
        return $this->belongsTo(EditionLevel::class, 'edition_level_id');
    }
}