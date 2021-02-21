<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCharacterTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->text('notes')->nullable();

            $table->foreignId('user_id')->nullable()
                ->constrained()
                ->onDelete('cascade');

            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
}
