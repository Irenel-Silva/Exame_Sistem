<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacaos', function (Blueprint $table) {
            $table->id();
            $table->string('tipoa',10);
            $table->float('pontuacao');
            $table->float('pontuacao_min');
            $table->integer('qtidade_questoes');
            $table->date('data');
            $table->time('hora');
            $table->integer('duracao');
            $table->string('prova_id',255);
            $table->foreignId('uc_id')
            ->constrained('ucs');
            $table->timestamps();
            $table->foreignId('users_id')
            ->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avaliacaos', function (Blueprint $table) {
            $table->foreignId('uc_id')
            ->constrained('ucs')
            ->onDelete('cascade');
            $table->foreignId('users_id')
            ->constrained('users')
            ->onDelete('cascade');


        });
    }
};
