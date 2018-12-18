<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\ActivityLog::class, function (Faker $faker){
    return [
        'publisher' => null,
        'order_id'  => null,
        'message'   => $faker->sentence(rand(10, 40))
    ];
});
