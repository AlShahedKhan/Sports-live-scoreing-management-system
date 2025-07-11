<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoreupdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scoreupdates', function (Blueprint $table) {
            $table->id();
            $table->string('out_type')->nullable();
            $table->string('out_by_type')->nullable();
            $table->integer('one')->nullable();
            $table->integer('two')->nullable();
            $table->integer('three')->nullable();
            $table->integer('four')->nullable();
            $table->integer('six')->nullable();
            $table->double('balls_played')->nullable();
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
        Schema::dropIfExists('scoreupdates');
    }
}
