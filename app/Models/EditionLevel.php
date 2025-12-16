<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class EditionLevel extends Model
{
    protected $table = 'fsc_edition_levels';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    protected $fillable = ['description'];
}