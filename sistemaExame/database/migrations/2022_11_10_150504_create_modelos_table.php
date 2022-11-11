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
            //$table->string('qa');// qa-> Questão A
            $table->string('respota1_user');
            $table->string('respota2_user');
            $table->string('respota3_user');
            $table->string('respota4_user');
            $table->string('respota5_user');
            $table->string('respota6_user')->nullable();
            $table->string('respota7_user')->nullable();
            $table->string('respota8_user')->nullable();
            $table->string('respota9_user')->nullable();
            $table->string('respota10_user')->nullable();
            $table->string('respota11_user')->nullable();
            $table->string('respota12_user')->nullable();
            $table->string('respota13_user')->nullable();
            $table->string('respota14_user')->nullable();
            $table->string('respota15_user')->nullable();

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


        });
    }
};
