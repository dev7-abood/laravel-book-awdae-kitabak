<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Book;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Carbon\Carbon;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName . Str::random(3),
        'isbn' => $faker->isbn10,
        'status' => $faker->randomElement(['b' ,'g' , 'e']),
        'library_id' => function(){
            return App\Models\Library::all()->random();
        },
        'is_published' => rand(0,1),
        'temporary_reservation_user_id' => $faker->randomElement([1 , null]),
        'temporary_reservation_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'reservation_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'img_url' => 'img/books_img/books-6@2x.png',
    ];
});
