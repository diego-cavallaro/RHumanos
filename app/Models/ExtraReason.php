<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ExtraReason extends Model
{
    protected $table = 'fsc_extras_motivos';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    protected $fillable = [
    'description',
    'rhpro_code',
    ];
}