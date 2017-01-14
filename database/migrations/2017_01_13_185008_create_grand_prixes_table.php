<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrandPrixesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grand_prixes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('season_id')->index();
            $table->string('name');
            $table->string('info1');
            $table->string('info2');
            $table->string('info3');
            $table->string('info4');
            $table->timestamp('date');
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
        Schema::dropIfExists('grand_prixes');
    }
}
