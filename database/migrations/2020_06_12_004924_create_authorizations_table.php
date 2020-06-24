<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authorizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('empresa')->default('Confidencial');
            $table->string('hash');
            $table->string('titulo');
            $table->string('tipo');
            $table->double('qtd');
            $table->string('local')->default('Brasilia-DF');
            $table->string('salario')->default('Informado na entrevista');
            $table->string('beneficios');
            $table->string('requisitos');
            $table->string('periodo');
            $table->text('descricao');
            $table->string('contato');
            $table->string('whatsapp')->default('none');
            $table->string('email')->default('none');
            $table->string('role')->default('insert');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('authorizations');
    }
}
