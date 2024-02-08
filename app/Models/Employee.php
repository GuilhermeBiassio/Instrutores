<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $connection = 'second_db';
    protected $table = 'funcionario';

    public static function selectList()
    {
        return self::select('ID_FUNCIONARIO', 'NOME_FUNCIONARIO')
            ->orderBy('NOME_FUNCIONARIO', 'asc')
            ->get();
    }
}
