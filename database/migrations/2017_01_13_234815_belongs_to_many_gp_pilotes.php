<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BelongsToManyGpPilotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('grand_prix_pilote', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('grand_prix_id')->index();
            $table->integer('pilote_id')->index();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('grand_prix_pilote');
    }
}
