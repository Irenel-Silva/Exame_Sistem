<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{ // Corresponde a todas as provas criadas
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('avaliacaos_id')
            ->constrained('avaliacaos');
            $table->string('respostam')->nullable();
            $table->float('pontuacaom');

            $table->foreignId('user_id')
            ->constrained('users');
            $table->foreignId('questao_id')
            ->constrained('questoes');

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
        Schema::dropIfExists('modelos', function (Blueprint $table) {
            $table->foreignId('avaliacaos_id')
            ->constrained('avaliacaos')
            ->onDelete('cascade');
            $table->foreignId('user_id')
            ->constrained('users')
            ->onDelete('cascade');
            $table->foreignId('questao_id')
            ->constrained('questoes')
            ->onDelete('cascade');


        });
    }
};
