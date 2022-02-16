<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
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
            $table->string('slug')->unique()->nullable();
            $table->text('title')->nullable();
            $table->text('sub_title')->nullable();
            $table->longText('body')->nullable();
            $table->smallInteger('status');
            $table->unsignedBigInteger('author');
            $table->string('like_count');
            $table->string('dislike_count');
            $table->timestamps();

            // Foreign Key Relations
            $table->foreign('author')->references('id')->on('users');
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
}
