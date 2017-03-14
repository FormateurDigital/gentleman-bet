<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Add roles for users
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'gambler']);
        });

        $users = \App\User::all();
        if ($users) {
            foreach ($users as $user) {
                $user->role = 'gambler';
                $user->save();
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Delete roles for users
        Schema::table('users', function (Blueprint $table){
           $table->dropColumn('role');
        });
    }
}
