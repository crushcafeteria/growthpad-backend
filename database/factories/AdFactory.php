<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Ad::class, function (Faker $faker){
    return [
        'publisher_id' => 1,
        'category'     => collect(config('settings.categories'))->keys()->random(),
        'name'         => 'Product ' . $faker->numberBetween(1, 5000),
        'description'  => $faker->sentence(rand(15, 60)),
        'price'        => $faker->numberBetween(1000, 70000),
        'telephone'    => $faker->e164PhoneNumber,
        'email'        => $faker->freeEmail,
        'location'     => 'Nairobi',
        'pictures'     => [
            'http://placehold.it/500x400?text=Product',
            'http://placehold.it/500x400?text=Product',
            'http://placehold.it/500x400?text=Product',
        ],
        'status'       => 'ACTIVE',
        'expiry'       => \Carbon\Carbon::now()->addMonths(12)
    ];
});
