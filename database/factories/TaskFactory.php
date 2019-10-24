<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {

    return [
        //
        'title'=>$faker->sentence(6),
        'user_id'=>$faker->numberBetween(1, 15),
        'description'=>$faker->paragraph(5),
        'duedate'=>$faker->dateTimeBetween($startDate = 'now', $endDate = '+1 year'),

    ];
});
