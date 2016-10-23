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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'username' => '123456',
        'email' => '123456@email.com',
        'permissionLevel' => '1',
        'password' => bcrypt('123456'),
    ];
});

$factory->define(App\Student::class, function (Faker\Generator $faker) {
    return [
        'studentID' => '123456',
        'courseCode' => 'I047',
        'surname' => $faker->name,
        'givenName' => $faker->name,
        'year' => '2016',
        'term' => 'Semester 1',
    ];
});
