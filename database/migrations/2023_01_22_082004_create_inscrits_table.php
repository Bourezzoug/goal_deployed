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
        Schema::create('inscrits', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('nom_complet')->nullable();
            $table->string('telephone')->nullable();
            $table->string('fonction')->nullable();
            $table->string('conditions')->nullable();
            $table->string('newsgoal')->nullable();
            $table->string('newspartenaire')->nullable();
            $table->string('ville')->nullable();
            $table->string('age')->nullable();
            $table->string('civilite')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('inscrits');
    }
};
