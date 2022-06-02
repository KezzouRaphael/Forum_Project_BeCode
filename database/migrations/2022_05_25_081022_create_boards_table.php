<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->id("board_id");
            $table->text("description");
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
        Schema::dropIfExists('boards');
    }
}
