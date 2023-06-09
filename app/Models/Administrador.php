<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;

    protected $table = 'administradores';

    protected $primaryKey = 'id_administrador';

    protected $fillable = [
        'id_user',
        'nombres',
        'ape_paterno',
        'ape_materno',
        'sexo',
        'celular',
        'dni',
        'f_nacimiento',
        'estado',
    ];
}

