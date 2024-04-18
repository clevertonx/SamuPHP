<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dant.planos', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable();
            $table->integer('ano_inicial')->nullable();
            $table->integer('ano_final')->nullable();
            $table->boolean('status')->default(true);
            $table->boolean('consolidar')->default(true);
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
        Schema::dropIfExists('dant.planos');
    }
}
