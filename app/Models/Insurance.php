<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;

    protected $table = 'insurances';

    protected $primaryKey = 'id_insurance';

    protected $fillable = [
        'nombre',
        'estado',
    ];
}

