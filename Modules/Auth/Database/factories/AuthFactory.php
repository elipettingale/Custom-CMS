<?php

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Modules\Auth\Entities\User;

/**
 * @var Factory $factory
 */
$factory->define(User::class, function(Faker $faker) {
    $name = [
        $faker->firstName,
        $faker->lastName
    ];

    return [
        'first_name' => $name[0],
        'last_name' => $name[1],
        'email' => strtolower($name[0]) . '.' . strtolower($name[1]) . '@test.com',
        'password' => 'password'
    ];
});
