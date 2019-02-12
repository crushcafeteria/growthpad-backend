<?php

use Faker\Generator as Faker;
use App\Models\Payment;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        'transaction_reference' => 	$faker->randomLetter.
        							$faker->randomLetter.
        							$faker->numberBetween(100,999).
        							$faker->randomLetter.
        							$faker->numberBetween(100,999),
		'transaction_timestamp'	=>	$faker->dateTimeThisYear('now'),
		'sender_phone'			=>	$faker->phoneNumber,
		'first_name'			=>	$faker->firstName,
		'middle_name'			=>	$faker->lastName,
		'last_name'				=>	$faker->lastName,
		'amount'				=>	$faker->numberBetween(100,5000)             
    ];
});
