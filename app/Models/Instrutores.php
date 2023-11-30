<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instrutores extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'motorista', 'carro', 'linha', 'inicio_percurso', 'final_percurso', 'observacoes', 'data_instrucao'];

    protected static function booted()
    {
        self::addGlobalScope('ordered', function (Builder $queryBuilder) {
            $queryBuilder->orderBy('created_at', 'desc');
        });
    }
}
