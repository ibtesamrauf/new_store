<?php

use Faker\Generator as Faker;

$factory->define(App\Categorie::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'image' => $faker->name,
        'desc' => $faker->paragraph,
        'status' => rand(0,1),
        'order_by' => rand(1,20),
    ];
});
