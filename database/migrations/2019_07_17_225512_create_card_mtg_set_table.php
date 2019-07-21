<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardMtgSetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_mtg_set', function (Blueprint $table) {
            $table->integer('mtg_set_id')->unsigned()->nullable();
            $table->foreign('mtg_set_id')->references('id')
                ->on('mtg_sets')->onDelete('cascade');

            $table->integer('card_id')->unsigned()->nullable();
            $table->foreign('card_id')->reference('id')
                ->on('cards')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_mtg_sets');
    }
}
