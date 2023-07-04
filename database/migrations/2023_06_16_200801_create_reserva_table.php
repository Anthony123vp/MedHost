<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cita_medica', function (Blueprint $table) {
            $table->id('id_reserva', true);
            $table->unsignedBigInteger('id_paciente')->index('fk_Citas_Paciente1_idx');
            $table->unsignedBigInteger('id_servicio_medhost')->index('fk_cita_medica_ServiciosMedHost1_idx');
            $table->unsignedBigInteger('id_medico_horario')->index('fk_Reserva_Medico_Horarios1_idx');
            $table->string('modalidad', 20);
            $table->char('estado', 1)->default('1');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserva');
    }
};
