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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => 'admin@gimpa.com',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Repositories\Models\Ticket::class, function (Faker\Generator $faker) {

    return [
        'subject' => $faker->name,
        'content' => $faker->text(),
        'user_id' => 1,
        'priority_id' =>1,
        'agent_id' =>2,
        'status_id' =>1,
        'category_id' =>1,
    ];
});
