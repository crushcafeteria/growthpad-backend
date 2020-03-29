<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Forum\Like::class, function (Faker $faker) {
    return [
        'target_id' => null,
        'type'      => null,
        'author_id' => null
    ];
});
