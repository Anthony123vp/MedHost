<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagoPendiente extends Model
{
    use HasFactory;

    protected $table = 'pagos_pendientes';

    protected $primaryKey = 'id_pago_pendiente';

    protected $fillable = [
        'id_cita_medica',
        'monto',
        'metodo_pago',
        'estado',
    ];
}

