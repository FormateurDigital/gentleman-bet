<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->integer('score');
            $table->integer('pole');
            $table->integer('position1');
            $table->integer('position2');
            $table->integer('position3');
            $table->integer('position4');
            $table->integer('position5');
            $table->integer('position6');
            $table->integer('position7');
            $table->integer('position8');
            $table->integer('position9');
            $table->integer('position10');
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
        Schema::dropIfExists('results');
    }
}
