<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cita;
use Faker\Generator as Faker;

$factory->define(Cita::class, function (Faker $faker) {

    return [
        'paciente_id' => $faker->randomDigitNotNull,
        'doctor_id' => $faker->randomDigitNotNull,
        'date_cita' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
