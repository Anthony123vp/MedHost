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
        'id_consultorio',
        'nombres',
        'ape_paterno',
        'ape_materno',
        'sexo',
        'celular',
        'dni',
        'f_nacimiento',
        'imagen',
        'estado',
    ];

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class, 'id_especialidad');
    }

    public function consultorio()
    {
        return $this->belongsTo(Consultorio::class, 'id_consultorio');
    }
}

