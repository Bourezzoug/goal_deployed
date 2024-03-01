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
        Schema::create('bannieres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campagne_id');
            $table->string('titre');
            $table->string('lien');
            $table->string('image', 2048);
            $table->string('position');
            $table->date('plannification');
            $table->foreign('campagne_id')->references('id')->on('campagnes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bannieres');
    }
};
