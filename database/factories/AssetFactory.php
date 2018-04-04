<?php

use Faker\Generator as Faker;
use App\sector;

$factory->define(App\Asset::class, function (Faker $faker) {

    $sector_ids = sector::all()->pluck('id')->toArray();
    $assetList=array("Bulb","A/C","Tap");

    return [
        'description'=>$faker->randomElement($assetList),
        'sector_id'=>$faker->randomElement($sector_ids),
    ];
});
