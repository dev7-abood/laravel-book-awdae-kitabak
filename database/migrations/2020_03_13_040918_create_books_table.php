<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ispn')->unique()->nullable();
            $table->string('img_url');
            $table->enum('status' , ['b' ,'g' , 'e']);


            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('owner_user_id')->nullable()->index();
            $table->foreign('owner_user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('reservation_user_id')->nullable()->index();
            $table->foreign('reservation_user_id')->references('id')->on('users')->onDelete('cascade');


            $table->unsignedBigInteger('library_id')->nullable();
            $table->foreign('library_id')->references('id')->on('librarys');

            $table->timestamp('temporary_reservation_at', 0)->nullable();
            $table->timestamp('reservation_at', 0)->nullable();

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
        Schema::dropIfExists('books');
    }
}
