<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin;
use App\Models\Account;
use Faker\Generator as Faker;

$factory->define(Admin::class, function (Faker $faker) {
    return [
        "id" => Account::where("type","admin")->value("id")
    ];
    
});
