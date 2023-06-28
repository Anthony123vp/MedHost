<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialClinico extends Model
{
    use HasFactory;
    protected $connection = 'medhosthistorial';
    protected $primaryKey = "id_reserva";
    protected $table = 'reserva';
}
