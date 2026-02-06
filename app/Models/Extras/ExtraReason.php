<?php
namespace App\Models\Extras;
use Illuminate\Database\Eloquent\Model;

class ExtraReason extends Model
{
    protected $table = 'fsc_extras_motivos';
    protected $primaryKey = 'id';
    protected $connection = 'RHumanos';
    public $timestamps = false;
    
    protected $fillable = [
    'description',
    'rhpro_code',
    ];
}