<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEixosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dant.eixos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('plano_id');
            $table->foreign('plano_id')->references('id')->on('dant.planos')->onUpdate('cascade')->onDelete('cascade');

            $table->string('nome')->nullable();
            $table->text('descricao')->nullable();
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
        Schema::dropIfExists('dant.eixos');
    }
}
