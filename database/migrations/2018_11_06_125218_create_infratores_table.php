<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfratoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infratores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100);
            $table->string('vulgo', 45)->nullable();
            $table->date('dataDeNascimento');
            $table->string('nomeDaMae', 100);
            $table->string('nomeDoPai', 100)->nullable();
            $table->string('sexo', 15);
            $table->string('naturalidade', 45);
            $table->string('estadoCivil', 20);
            $table->string('cpf')->unique();
            $table->string('rg')->unique()->nullable();
            $table->string('cnh')->unique()->nullable();
            $table->string('fotoDePerfil')->nullable();
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
        Schema::dropIfExists('infratores');
    }
}
