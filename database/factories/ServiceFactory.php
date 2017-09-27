<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Service::class, function (Faker\Generator $faker) {
    return [
        'name'              => $faker->company,
        'telephone' => $faker->phoneNumber,
        'email'             => $faker->email,
        'products'          => $faker->words(5),
        'price'   => $faker->numberBetween(2, 30).'000',
    ];
});
