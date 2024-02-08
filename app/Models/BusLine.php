<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusLine extends Model
{
    use HasFactory;

    protected $connection = 'second_db';
    protected $table = 'linha';

    public static function selectList()
    {
        return self::select('ID_LINHA', 'NOME_LINHA')
            ->distinct('ID_LINHA')
            ->orderBy('ID_LINHA', 'asc')
            ->get();
    }
}
