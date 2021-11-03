<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Farmer;
use App\Models\Admin;
use App\Models\Specie;
use App\Models\Account;
use Faker\Generator as Faker;

$factory->define(Farmer::class, function (Faker $faker) {
    return [
        "id" => function()
        {
            return Account::where("type","farmer")->get()->rand();
        },
        "admin_id" => Admin::firstOrFail(),
        "specie_id" => function()
        {
            return Specie::get()->rand();
        }
    ];
});
