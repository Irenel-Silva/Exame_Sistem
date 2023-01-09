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
        Schema::create('ucs_users', function (Blueprint $table) {
            $table->id();

            $table->foreignId('uc_id')
            ->constrained('ucs');
            $table->foreignId('user_id')
            ->constrained('users');
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
        Schema::dropIfExists('ucs_users', function(Blueprint $table){
            $table->foreignId('uc_id')
            ->constrained('ucs')
            ->onDelete('cascade');
            $table->foreignId('user_id')
            ->constrained('users')
            ->onDelete('cascade');
        });
    }
};
