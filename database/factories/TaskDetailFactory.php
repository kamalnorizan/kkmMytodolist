<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task_detail;
use Faker\Generator as Faker;

$factory->define(Task_detail::class, function (Faker $faker) {
    return [
        //
        'title'=> $faker->sentence(5),
        'task_id'=>$faker->numberBetween(1,100),
        'status'=>'new task',
    ];
});
