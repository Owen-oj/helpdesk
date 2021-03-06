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
        'name' => 'Owen Jubilant',
        'email' => 'admin@test.com',
        'phone_number' => '0545169030',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Repositories\Models\Ticket::class, function (Faker\Generator $faker) {

    return [
        'subject' => $faker->sentence(3),
        'content' => $faker->text(),
        'user_id' => 1,
        'priority_id' =>1,
        'agent_id' =>2,
        'status_id' =>1,
        'category_id' =>1,
    ];
});

$factory->define(App\Repositories\Models\Role::class, function (Faker\Generator $faker) {

    return [
        'name' =>  $faker->unique()->randomElement(['manager','admin','user','agent']),
    ];
});


$factory->define(App\Repositories\Models\Status::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->unique()->randomElement(['Pending','On-Hold','Complete']),
        'color' => $faker->unique()->randomElement(['red','blue','Green']),
    ];
});

$factory->define(App\Repositories\Models\Priority::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->unique()->randomElement(['High','Medium','Low']),
        'color' => $faker->randomElement(['red','blue','Green']),
    ];
});

$factory->define(App\Repositories\Models\Category::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->unique()->randomElement(['IT Infrastructure','Billing','Marketing']),
        'color' => $faker->randomElement(['red','blue','Green']),
    ];
});
