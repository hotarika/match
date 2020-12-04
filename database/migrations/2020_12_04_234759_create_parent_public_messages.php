<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentPublicMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_public_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('work_id');
            $table->bigInteger('user_id');
            $table->string('title');
            $table->string('content');
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
        Schema::dropIfExists('parent_public_messages');
    }
}
