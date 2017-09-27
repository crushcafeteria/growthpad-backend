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
$factory->define(App\Models\Product::class, function (Faker\Generator $faker) {
    return [
        'vendor_id' => NULL,
        'name'      => 'Product ' . $faker->randomNumber(2),
        'price'     => $faker->numberBetween(100, 7000),
    ];
});
