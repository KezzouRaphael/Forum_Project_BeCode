<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forums', function (Blueprint $table) {
            $table->id("forum_id");
            $table->text("title");
            $table->text("description");
            $table->string("image", 50);
            $table->boolean('locked');
            $table->unsignedBigInteger('board_id');
            $table->foreign('board_id')->references('board_id')->on('boards')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('create_id');
            $table->foreign("create_id")->references("user_id")->on('users')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('forums');
    }
}
