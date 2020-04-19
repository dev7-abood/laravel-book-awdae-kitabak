<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        factory(App\Models\Book::class , 100)->create();
//        factory(App\Models\Library::class , 100)->create();

        $cate = App\Models\Library::all();

        App\Models\Categorie::all()->each(function ($lib) use ($cate) {
            $lib->librarys()->sync(
                $cate->random(rand(1, 12))->pluck('id')->toArray()
            );
        });
    }
}
