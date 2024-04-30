<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoPrazosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samu.tipo_prazos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('protocolo_id')->nullable();
            $table->foreign('protocolo_id')->references('id')->on('samu.protocolos')->onUpdate('cascade')->onDelete('cascade');

            $table->string('nome')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('samu.tipo_prazos');
    }
}
