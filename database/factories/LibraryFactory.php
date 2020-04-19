<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Library;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Library::class, function (Faker $faker) {
    return [
        'name' => $faker->lastName . Str::random(3),
    ];
});
