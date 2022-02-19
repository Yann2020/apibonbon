<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Food;
use App\Models\Admin;
use Faker\Generator as Faker;

$factory->define(Food::class, function (Faker $faker) {
    return [
        "food_name" => $faker->unique()->name(),
        "admin_id" => Admin::firstOrFail()
    ];
});
