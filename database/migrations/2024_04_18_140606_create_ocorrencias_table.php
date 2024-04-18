<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOcorrenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samu.ocorrencias', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('atendimento_id')->nullable();
            $table->foreign('atendimento_id')->references('id')->on('samu.atendimentos')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('numero')->nullable();
            $table->date('data')->nullable();
            $table->time('hora')->nullable();
            $table->string('natureza')->nullable();
            $table->string('motivo')->nullable();
            $table->string('equipe_atendimento')->nullable();
            $table->string('endereco_ocorrencia')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->text('ocorrencia')->nullable();

            $table->boolean('autenticado')->default(true);
            $table->unsignedBigInteger('user_autenticado_id')->nullable()->index();

            $table->unsignedBigInteger('user_id')->nullable()->index();
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
        Schema::dropIfExists('samu.ocorrencias');
    }
}
