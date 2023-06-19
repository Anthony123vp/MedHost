<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(RecepcionistasSeeder::class);
        $this->call(PacienteSeeder::class);
        $this->call(MedicosSeeder::class);
        $this->call(InsurancesSeeder::class);
        $this->call(EspecialidadesSeeder::class);
        $this->call(AdministradoresSeeder::class);
    }
}
