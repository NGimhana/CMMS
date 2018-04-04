<?php

use Faker\Generator as Faker;

$factory->define(App\building::class, function (Faker $faker) {
    return [
        'description'=>$faker->address,
    ];
});
