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
        Schema::create('api_football', function (Blueprint $table) {
            $table->id();
            $table->string('equipe1_name');
            $table->string('equipe2_name');
            $table->string('logo_equipe_1', 2048);
            $table->string('logo_equipe_2', 2048);
            $table->string('heure_match');
            $table->string('resultat_match');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('football_api');
    }
};
