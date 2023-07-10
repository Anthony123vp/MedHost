<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        $user1 = new Usuario();
        $user1->id_rol = 1;
        $user1->email = 'paciente@example.com';
        $user1->password = bcrypt('paciente');
        $user1->password_2 = bcrypt('paciente');
        $user1->estado = '1';
        $user1->save();
        
        $user2 = new Usuario();
        $user2->id_rol = 2;
        $user2->email = 'administrador@example.com';
        $user2->password = bcrypt('administrador');
        $user2->password_2 = bcrypt('administrador');
        $user2->estado = '1';
        $user2->save();

        $user3 = new Usuario();
        $user3->id_rol = 3;
        $user3->email = 'recepcionista@example.com';
        $user3->password = bcrypt('recepcionista');
        $user3->password_2 = bcrypt('recepcionista');
        $user3->estado = '1';
        $user3->save();

        $user4 = new Usuario();
        $user4->id_rol = 4;
        $user4->email = 'medico@example.com';
        $user4->password = bcrypt('medico');
        $user4->password_2 = bcrypt('medico');
        $user4->estado = '1';
        $user4->save();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
