<?php

use Faker\Generator as Faker;

$factory->define(App\Tweet::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 30),
        'content' => str_random(50),
    ];
});
