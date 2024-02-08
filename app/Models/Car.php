<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $connection = 'second_db';
    protected $table = 'carros';

    public static function selectList()
    {
        return self::select('idcarro')
        ->orderBy('idcarro', 'asc')
        ->get();
    }
}

