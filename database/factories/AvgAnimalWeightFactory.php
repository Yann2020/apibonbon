<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AvgAnimalWeight;
use Faker\Generator as Faker;

$factory->define(AvgAnimalWeight::class, function (Faker $faker) {
    return [
        "max_animal_weight" => $faker->randomNumber(),
        "min_animal_weight" => $faker->randomNumber(),
        "species_name" => $faker->title(),
        "overall_average" => $faker->randomNumber(),
        "batche_id" => function()
        {
            #
        },
        "farmer_id" => function()
        {
            #
        }
    ];
});
