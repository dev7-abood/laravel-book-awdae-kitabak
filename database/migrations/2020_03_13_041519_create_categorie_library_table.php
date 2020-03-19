<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorieLibraryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorie_library', function (Blueprint $table) {
            $table->id();

//            $table->unsignedBigInteger('user_id')->nullable()->index();
//            $table->foreign('user_id')->references('id')
//                ->on('users')->onDelete('cascade')->onUpdate('cascade');


            $table->unsignedBigInteger('categorie_id')->nullable()->index();
            $table->foreign('categorie_id')->references('id')->on('categories')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('library_id')->nullable()->index();
            $table->foreign('library_id')->references('id')->on('librarys')
                ->onDelete('cascade')->onUpdate('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('library_categorie');
    }
}
