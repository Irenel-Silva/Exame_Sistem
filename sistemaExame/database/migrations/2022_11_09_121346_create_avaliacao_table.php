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
        Schema::create('avaliacao', function (Blueprint $table) {
            $table->id();
            $table->string('tipo',10);
            $table->integer('duracao');
            $table->integer('pontuacao');
            $table->integer('pontuacao_min');
            $table->integer('qtidade_questoes');
            $table->date('data');
            $table->foreignId('uc_id')
            ->constrained('uc');

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

        Schema::dropIfExists('avaliacao', function (Blueprint $table) {
            $table->foreignId('uc_id')
            ->constrained('uc')
            ->onDelete('cascade');
        });
    }
};
