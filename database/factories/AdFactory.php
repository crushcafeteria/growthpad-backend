<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Ad::class, function (Faker $faker){
    return [
        'publisher_id' => null,
        'category'     => collect(config('settings.categories'))->keys()->random(),
        'name'         => $faker->sentence(2),
        'description'  => $faker->sentence(rand(15, 60)),
        'price'        => $faker->numberBetween(1000, 70000),
        'telephone'    => $faker->e164PhoneNumber,
        'email'        => $faker->freeEmail,
        'location'     => 'Nairobi',
        'pictures'     => null,
        'status'       => 'ACTIVE',
        'expiry'       => \Carbon\Carbon::now()->addMonths(12)
    ];
});
