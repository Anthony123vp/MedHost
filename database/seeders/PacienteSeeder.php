<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Paciente;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Paciente::create([
            'id_user' => 1,
            'id_insurance' => 1,
            'nombres' => 'Anthony',
            'ape_paterno' => 'Vilcatoma',
            'ape_materno' => 'Palacios',
            'sexo' => 'F',
            'celular' => '987352145',
            'dni' => '72861324',
            'f_nacimiento' => '2004-10-19',
            'estado' => '1',
        ]);

        Paciente::create([
            'id_user' => 1,
            'id_insurance' => 2,
            'nombres' => 'Dave',
            'ape_paterno' => 'Santivañez',
            'ape_materno' => 'Munguia',
            'sexo' => 'M',
            'celular' => '903010882',
            'dni' => '72565013',
            'f_nacimiento' => '2003-03-02',
            'estado' => '1',
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
