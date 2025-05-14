<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpdatebowlersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('updatebowlers', function (Blueprint $table) {
            $table->id();
            $table->double('overs');
            $table->integer('maidens');
            $table->integer('runs');
            $table->integer('wickets');
            $table->integer('no_balls');
            $table->integer('wides');
            $table->integer('panalty_runs');
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
        Schema::dropIfExists('updatebowlers');
    }
}
