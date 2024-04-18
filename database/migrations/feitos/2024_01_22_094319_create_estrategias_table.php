<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstrategiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dant.estrategias', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('eixo_id');
            $table->foreign('eixo_id')->references('id')->on('dant.eixos')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('dant.estrategias');
    }
}
