<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Forum\Thread::class, function (Faker $faker) {
    return [
        'topic_id'  => null,
        'author_id' => null,
        'text'      => $faker->sentence(rand(10, 50))
    ];
});
