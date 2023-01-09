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
        Schema::create('avaliacaos_questoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('avaliacaos_id')
            ->constrained('avaliacaos');
            $table->foreignId('questoes_id')
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
        Schema::dropIfExists('avaliacaos_questoes', function (Blueprint $table) {
            $table->foreignId('avaliacaos_id')
            ->constrained('avaliacaos')
            ->onDelete('cascade');
            $table->foreignId('questoes_id')
            ->constrained('questoes')
            ->onDelete('cascade');
        });
    }
};
