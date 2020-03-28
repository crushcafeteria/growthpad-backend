<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Forum\Topic::class, function (Faker $faker) {
    return [
        'name'        => $faker->sentence(rand(3, 10)),
        'description' => $faker->sentence(rand(10, 40)),
        'author_id'   => null
    ];
});
