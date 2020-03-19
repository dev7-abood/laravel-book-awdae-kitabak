<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'ispn' => $faker->isbn10,
        'note' => $faker->text,
        'status' => 'good',
        'library_id' => function(){
            return App\Models\Library::all()->random();
        }
    ];
});
