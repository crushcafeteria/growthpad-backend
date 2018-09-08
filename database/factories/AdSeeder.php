<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Ad::class, function (Faker $faker){
    return [
        'publisher_id' => 1,
        'category'     => collect(config('settings.categories'))->keys()->random(),
        'name'         => $faker->firstName . ' ' . $faker->lastName,
        'description'  => $faker->sentence(10),
        'price'        => $faker->numberBetween(1000, 1000000),
        'telephone'    => $faker->e164PhoneNumber,
        'email'        => $faker->freeEmail,
        'location'     => null,
        'picture'      => null,
        'status'       => 'ACTIVE',
        'expiry'       => \Carbon\Carbon::now()->addMonths(12)
    ];
});
