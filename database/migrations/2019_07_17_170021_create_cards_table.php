<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name')->nullable(false);
            $table->text('rules_text')->nullable();
            $table->text('rarity')->nullable(false);
            $table->text('type')->nullable(false);
            $table->text('sub_type')->nullable();
            $table->text('converted_cost')->nullable(false);
            $table->text('power')->nullable();
            $table->text('toughness')->nullable();
            $table->double('price')->nullable(false);

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
        Schema::dropIfExists('cards');
    }
}
