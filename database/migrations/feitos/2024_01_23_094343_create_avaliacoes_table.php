<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dant.avaliacoes', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('indicador_id');
            $table->foreign('indicador_id')->references('id')->on('dant.indicadores')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('ano')->nullable();
            $table->integer('realizado')->nullable();
            $table->integer('avaliacao')->nullable();
            $table->text('comentario')->nullable();

            $table->unsignedBigInteger('user_id')->nullable()->index();

            $table->string('key')->nullable()->unique();
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
        Schema::dropIfExists('dant.avaliacoes');
    }
}
