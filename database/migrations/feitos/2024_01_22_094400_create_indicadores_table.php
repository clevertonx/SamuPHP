<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dant.indicadores', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('estrategia_id');
            $table->foreign('estrategia_id')->references('id')->on('dant.estrategias')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('tipo_indicador_id')->nullable();
            $table->foreign('tipo_indicador_id')->references('id')->on('dant.tipo_indicadores')->onUpdate('cascade')->onDelete('set null');

            $table->integer('indicador')->nullable();
            $table->string('descricao')->nullable();
            $table->integer('meta')->nullable();
            $table->string('metodologia')->nullable();
            $table->string('fonte')->nullable();
            $table->string('periodicidade')->nullable();

            $table->unsignedBigInteger('user_id')->nullable()->index();

            $table->unsignedBigInteger('setor_id')->nullable();
            $table->foreign('setor_id')->references('id')->on('dant.setores')->onUpdate('cascade')->onDelete('set null');

            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('dant.indicadores');
    }
}
