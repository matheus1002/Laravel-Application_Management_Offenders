<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfprocessualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infprocessuais', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('infrator_id')->unsigned();
            $table->string('situacao', 15);
            $table->string('classeDeliquente', 15);
            $table->string('unidadeDeOrigem', 60)->nullable();
            $table->date('dataDeRecolhimento')->nullable();
            $table->longText('observacao', 400)->nullable();
            $table->longText('historico', 1200);
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
        Schema::dropIfExists('infprocessuais');
    }
}
