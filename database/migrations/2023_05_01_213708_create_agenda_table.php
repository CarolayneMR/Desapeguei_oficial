<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->id();
            $table->dateTimeTz('data');
            $table->unsignedBigInteger('usuarioDest_id');
            $table->unsignedBigInteger('usuarioDoar_id');
            $table->unsignedBigInteger('objeto_id');
            $table->string('status');
            $table->timestamps();
        });
        Schema::table('agenda', function (Blueprint $table) {
            $table->foreign('usuarioDest_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('usuarioDoar_id')->references('user_id')->on('objetos')->onDelete('cascade');
            $table->foreign('objeto_id')->references('user_id')->on('objetos')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agenda');
    }
};
