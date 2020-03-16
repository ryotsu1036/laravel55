<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('zodiac_sign_id')->unsigned();
            $table->integer('horoscope_id')->unsigned();
            $table->integer('score')->unsigned();
            $table->text('description');
            $table->timestamps();

            $table->foreign('zodiac_sign_id')->references('id')->on('zodiac_signs');
            $table->foreign('horoscope_id')->references('id')->on('horoscopes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
