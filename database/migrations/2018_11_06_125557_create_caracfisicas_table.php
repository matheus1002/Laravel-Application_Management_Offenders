<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaracfisicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracfisicas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('infrator_id')->unsigned();
            $table->string('etnia', 45)->nullable();
            $table->string('olho', 45)->nullable();
            $table->string('barba', 45)->nullable();
            $table->string('dente', 45)->nullable();
            $table->string('orelha', 45)->nullable();
            $table->string('boca', 45)->nullable();
            $table->string('nariz', 45)->nullable();
            $table->string('sobrancelha', 45)->nullable();
            $table->string('altura');
            $table->string('corDoCabelo', 60)->nullable();
            $table->string('tipoDeCabelo', 60)->nullable();
            $table->string('cicMarcTatu', 200)->nullable();
            $table->string('fotoFrente')->nullable();
            $table->string('fotoLadoDireito')->nullable();
            $table->string('fotoLadoEsquerdo')->nullable();
            $table->timestamps();
            $table->foreign('infrator_id')->references('id')->on('infratores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caracfisicas');
    }
}
