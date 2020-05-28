<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'first_name' => 'Johan',
                'last_name' => 'Vergara',
                'email' => 'johan@gmail.com',
                'password' => '$2y$10$aB7oFVrwR42vnB7Q6e4qaO1HLD44Uuxqgc4afw5tiavHdzHKb8NOu',
                'doc_type' => 'CC',
                'dni' => '12345678',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id' => 2,
                'first_name' => 'Will',
                'last_name' => 'Hernandez',
                'email' => 'will@gmail.com',
                'password' => '$2y$10$aB7oFVrwR42vnB7Q6e4qaO1HLD44Uuxqgc4afw5tiavHdzHKb8NOu',
                'doc_type' => 'CC',
                'dni' => '1234567',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id' => 3,
                'first_name' => 'Sara',
                'last_name' => 'Ines',
                'email' => 'sara@gmail.com',
                'password' => '$2y$10$aB7oFVrwR42vnB7Q6e4qaO1HLD44Uuxqgc4afw5tiavHdzHKb8NOu',
                'doc_type' => 'CC',
                'dni' => '123445678',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
