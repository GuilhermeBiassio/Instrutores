<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrutores extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'motorista', 'carro', 'linha', 'inicio_percurso', 'final_percurso', 'observacoes'];
}
