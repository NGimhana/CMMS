<?php

use Faker\Generator as Faker;
use App\building;

$factory->define(App\sector::class, function (Faker $faker) {

    $building_ids = building::all()->pluck('id')->toArray();

    return [
        'description'=>$faker->domainName,
        'building_id'=>$faker->randomElement($building_ids),
    ];
});
