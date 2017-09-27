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
$factory->define(App\Models\Contact::class, function (Faker\Generator $faker) {
    return [
        'name'              => $faker->company,
        'location'          => $faker->city,
        'contact_name'      => $faker->name,
        'contact_telephone' => ['0700123456', '0701123456', '0703123456'],
        'email'             => [$faker->email, $faker->email],
        'county'            => collect(collect(config('settings.counties'))->keys())->random(),
        'goals'             => $faker->sentence(rand(5, 20)),
        'products'          => $faker->words(5),
        'positioning'       => 'Local',
        'market_type'       => collect(config('settings.market_types'))->keys()->random(),
        'total_employees'   => $faker->numberBetween(2, 30),
    ];
});
