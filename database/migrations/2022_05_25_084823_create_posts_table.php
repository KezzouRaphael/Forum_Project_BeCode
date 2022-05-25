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
            $table->id("post_id");
            $table->unsignedBigInteger("topic");
            $table->foreign("topic")->references('topic_id')->on("topics")->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger("post");
            $table->foreign("post")->references('post_id')->on("posts")->cascadeOnDelete()->cascadeOnUpdate();
            $table->text("content");
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
}
