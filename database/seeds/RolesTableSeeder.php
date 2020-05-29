<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('roles')->delete();

      \DB::table('roles')->insert(array (
          0 =>
          array (
              'id' => 1,
              'name' => 'Admin',
              'guard_name' => 'web',
              'created_at' => '2019-03-18 10:56:37',
              'updated_at' => '2019-03-18 10:56:37',
          ),
          1 =>
          array (
              'id' => 2,
              'name' => 'Doctor',
              'guard_name' => 'web',
              'created_at' => '2019-03-18 10:56:37',
              'updated_at' => '2019-03-18 10:56:37',
          ),
          2 =>
          array (
              'id' => 3,
              'name' => 'User',
              'guard_name' => 'web',
              'created_at' => '2019-03-18 10:56:37',
              'updated_at' => '2019-03-18 10:56:37',
          )
      ));
    }
}
