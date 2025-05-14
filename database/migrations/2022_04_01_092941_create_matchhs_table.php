<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matchhs', function (Blueprint $table) {
            $table->id();
            $table->string('match_name')->nullable();
            $table->string('match_slug')->nullable();
            $table->string('match_datetime')->nullable();
            $table->string('is_game_over')->default(0);
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
        Schema::dropIfExists('matchhs');
    }
}
