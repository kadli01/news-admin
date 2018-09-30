<?php

use Faker\Generator as Faker;

$factory->define(App\News::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'excerpt' => $faker->sentence(12),
        'description' => $faker->paragraph, 
    ];
});
