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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('title');
            $table->string('seo_title')->nullable();
            $table->text('excerpt')->nullable();
            $table->text('body');
            $table->string('image')->nullable();
            $table->string('slug');
            $table->text('meta_description')->nullable();
            $table->text('tags')->nullable();
            $table->string('status');
            $table->tinyInteger('featured')->default(0);
            $table->integer('nb_vues')->default(0)->nullable();
            $table->string('source')->nullable();
            $table->string('source_link')->nullable();
            $table->dateTime('planned')->nullable();
            $table->integer('ordre')->nullable();
            $table->string('lien_video')->nullable();
            $table->boolean('video_youtube')->default(false)->nullable();
            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('posts');
    }
};
