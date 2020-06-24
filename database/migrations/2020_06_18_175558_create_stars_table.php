<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('star1')->default('https://zapjob.s3.amazonaws.com/star-default/star-1.jpg');
            $table->string('star2')->default('https://zapjob.s3.amazonaws.com/star-default/star-2.jpg');
            $table->string('star3')->default('https://zapjob.s3.amazonaws.com/star-default/star-3.jpg');
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
        Schema::dropIfExists('stars');
    }
}
