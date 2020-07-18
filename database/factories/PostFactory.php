<?php

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'image' => $faker->imageUrl(400,300),
        'email_verified_at' => now(),
        'content' => $faker->paragraph(3),
    ];
});
