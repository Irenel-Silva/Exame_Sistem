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
            $table->string('tipo',10);
            $table->integer('duracao');
            $table->integer('pontuacao');
            $table->integer('pontuacao_min');
            $table->integer('qtidade_questoes');
            $table->date('data');
            $table->foreignId('uc_id')
            ->constrained('ucs');
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
        Schema::dropIfExists('avaliacaos', function (Blueprint $table) {
            $table->foreignId('uc_id')
            ->constrained('ucs')
            ->onDelete('cascade');


        });
    }
};
