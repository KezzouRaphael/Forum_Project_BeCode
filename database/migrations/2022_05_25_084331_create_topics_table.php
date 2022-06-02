<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id('topic_id');
            $table->text('content');
            $table->unsignedBigInteger("forum");
            $table->foreign("forum")->references('forum_id')->on("forums")->cascadeOnDelete()->cascadeOnUpdate();
            $table->boolean('locked')->default(0);
            $table->unsignedBigInteger('create_id');
            $table->foreign("create_id")->references("id")->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('update_id');
            $table->foreign("update_id")->references("id")->on('users')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('topics');
    }
}
