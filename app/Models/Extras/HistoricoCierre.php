<?php
namespace App\Models\Extras;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistoricoCierre extends Model
{
    protected $table = 'historico_cierres';
    public $timestamps = false;
    protected $connection = 'RHumanos';

    use HasFactory;

}