<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dant.anos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('plano_id')->nullable()->index();
            //$table->foreign('plano_id')->references('id')->on('dant.planos')->onUpdate('cascade')->onDelete('cascade');
            
            $table->integer('ano')->nullable();
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
        Schema::dropIfExists('dant.anos');
    }
}
