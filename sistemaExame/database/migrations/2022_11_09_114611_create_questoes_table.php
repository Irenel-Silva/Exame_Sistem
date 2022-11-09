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
        Schema::create('questoes', function (Blueprint $table) {
            $table->id();
            $table->string('tipo', 20);
            $table->string('questão', 150);
            $table->string('opcaoA')->nullable();
            $table->string('opcaoB')->nullable();
            $table->string('opcaoC')->nullable();
            $table->string('opcaoD')->nullable();
            $table->string('opcaoE')->nullable();
            $table->string('opcaoF')->nullable();
            $table->string('resposta');
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
        Schema::dropIfExists('questoes');
    }
};
