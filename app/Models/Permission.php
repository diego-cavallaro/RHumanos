<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $connection = 'mysql';
    protected $table = 'permissions';

    use HasFactory;

    protected $fillable = [
        'name',
        'guard_name'
    ];

}