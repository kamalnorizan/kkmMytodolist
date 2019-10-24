<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        //
        'commentable_type'=>$faker->randomElement(['App\Task','App\Task_detail']),
        'commentable_id'=>$faker->numberBetween(1, 100),
        'comment_input'=>$faker->paragraph(5),
    ];
});
