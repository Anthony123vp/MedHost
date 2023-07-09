<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Medico;

class MedicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $medico = new Medico();
        $medico->id_user = 4; 
        $medico->id_especialidad = 1;
        $medico->id_consultorio=1;
        $medico->nombres = 'Raul';
        $medico->ape_paterno = 'Paredez';
        $medico->ape_materno = 'Garcia';
        $medico->sexo = 'M'; 
        $medico->celular = '987325698';
        $medico->dni = '75359524';
        $medico->f_nacimiento = '2000-01-01';
        $medico->imagen='20230707230813.png';
        $medico->estado = '1';
        $medico->created_at = now();
        $medico->updated_at = now();
        $medico->save();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        DB::select("UPDATE Consultorios set estado=0 where id_consultorio=1");
    }
}