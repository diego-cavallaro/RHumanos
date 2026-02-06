<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $connection = 'mysql';
    protected $table = 'roles';

    use HasFactory;

    protected $fillable = [
        'name',
        'guard_name'
    ];

}