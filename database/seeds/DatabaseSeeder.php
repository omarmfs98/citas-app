<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SpecialtySeeder::class);
        $this->call(SecureSeeder::class);
        $this->call(DoctorSeeder::class);
        $this->call(PacienteSeeder::class);
    }
}
