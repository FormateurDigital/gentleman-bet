<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //'total', 'pole', 'podium', 'diumpo', 'duo', 'udo', 'vainq', 'position1', 'position2', 'position3', 'position4', 'position5', 'position6', 'position7', 'position8', 'position9', 'position10'
        Schema::create('points', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('result_id')->index();
            $table->integer('total');
            $table->integer('pole');
            $table->integer('podium');
            $table->integer('diumpo');
            $table->integer('duo');
            $table->integer('udo');
            $table->integer('vainq');
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
        Schema::dropIfExists('points');
    }
}
