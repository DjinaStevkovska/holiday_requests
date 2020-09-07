<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Managers;
use App\HolidayRequests;
use Faker\Generator as Faker;

$factory->define(HolidayRequests::class, function (Faker $faker) {

    // $holidayStart = $faker->dateTimeBetween('now', '+1 year');
    // $holidayEnd = $faker->dateTimeBetween($holidayStart, '+1 week');
    
    return [
        'user_id'      => factory(User::class),
        'manager_id'   => factory(Managers::class),
        // 'firstName'    => $faker->default,
        // 'lastName'     => $faker->default,
        // 'email'        => $faker->default,
        'phoneNumber'  => $faker->phoneNumber,
        'holidayStart' => $faker->dateTimeBetween('now', '+1 year'),
        'holidayEnd'   => $faker->dateTimeBetween('+1 day', '+1 year'),
        'remark'       => $faker->title,
        'reportIsSent' => $faker->default=0
    ];
});
