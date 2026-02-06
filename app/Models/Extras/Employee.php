<?php
namespace App\Models\Extras;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    protected $table = 'fsc_t_personal';
    protected $primaryKey = 'legajo';
    protected $connection = 'RHumanos';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    use HasFactory;

    // protected $fillable = [
    //     'legajo',
    //     'last_name',
    //     'first_name',
    //     'area',
    //     'sector',
    //     'sub_sector',
    //     'contract_type',
    //     'machine',
    //     'cost_center',
    //     'is_active',
    //     'counts_hours',
    //     'visma_id',
    // ];

    // protected $casts = [
    //     'is_active' => 'boolean',
    //     'counts_hours' => 'boolean',
    // ];
    
    public function extras(): HasMany
    {
        return $this->hasMany(Extra::class, 'leg_legajo', 'legajo');
    }

    public function login(): HasOne
    {
        return $this->hasOne(EmployeeLogin::class, 'employee_id', 'legajo');
    }
}