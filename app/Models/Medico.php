<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $table = 'medicos';

    protected $primaryKey = 'id_medico';
    
    protected $fillable = [
        'id_user',
        'id_especialidad',
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
