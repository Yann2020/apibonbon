<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Expenses;
use Faker\Generator as Faker;

$factory->define(Expenses::class, function (Faker $faker) {
    return [
        "reason" => $faker->realText(17),
        "amount" => $faker->randomNumber(),
        "admin_id" => Admin::firstOrFail()
    ];
});
