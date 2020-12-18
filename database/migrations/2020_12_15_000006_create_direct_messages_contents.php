<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectMessagesContents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direct_messages_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('board_id');
            $table->bigInteger('user_id');
            $table->string('content', 3000);
            $table->boolean('delete_flg')->default(false);
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
        Schema::dropIfExists('direct_messages_contents');
    }
}
