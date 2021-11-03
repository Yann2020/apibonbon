<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Account;
use Faker\Generator as Faker;

$factory->define(Account::class, function (Faker $faker) {
    return [
        "name" => $faker->userName(),
        "email" => $faker->email(),
        "password" => $faker->password(),
        "type" => function (Account $account)
        {
            $haystack = [];
            foreach($account->get() as $user){
                $haystack += $user->type;
            }
            if(array_search("admin",$haystack) && !empty($haystack))
                return "farmer";
            return "admin";
        }
    ];
});
