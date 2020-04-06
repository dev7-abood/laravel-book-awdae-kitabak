<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Categorie;
use Faker\Generator as Faker;

$factory->define(Categorie::class, function (Faker $faker) {
    return [
        'name' => 'h'.rand(0,99),
        'btn_color' => 'dark',
        'name_shorthand' => 'h'.rand(0,99)
    ];
});
