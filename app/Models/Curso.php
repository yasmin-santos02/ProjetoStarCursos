<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 
        'descricao',
        'valor',
        'inicio',
        'termino',
        'qtdInscritos',
        'upload'
    ]; 
}
