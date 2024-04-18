<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->string('nome')->nullable();;
            $table->text('descricao')->nullable();
            $table->date('data_post')->nullable();
            $table->enum('tipo', ['tipo1', 'tipo2', 'tipo3'])->nullable(); // Altere os tipos conforme necessário
            $table->boolean('status')->default(true);
            $table->string('radio')->nullable();
            $table->json('checkbox')->nullable();

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
        Schema::dropIfExists('posts');
    }
}
