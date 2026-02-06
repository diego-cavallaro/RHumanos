<?php
namespace App\Models\Extras;
use Illuminate\Database\Eloquent\Model;

class EditionLevel extends Model
{
    protected $table = 'fsc_edition_levels';
    protected $primaryKey = 'id';
    protected $connection = 'RHumanos';
    public $timestamps = false;
    
    protected $fillable = ['description'];
}