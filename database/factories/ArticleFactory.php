<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'image' => 'http://placeimg.com/640/480/any',
        'title' => $faker->sentence,
        'content' => $faker->text,
        'likes' => random_int(1, 10),
        'views' => random_int(1, 20),
        'created_at' => $faker->dateTimeBetween('-3 month', 'now'),
    ];
});
