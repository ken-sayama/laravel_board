<?php

use Faker\Generator as Faker;

$factory->define(\App\Board::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'content' => str_random(15),
    ];
});
