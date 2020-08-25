<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLostPetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lost_pets', function (Blueprint $table) {
            $table->Increments('lost_pet_id');
            $table->unsignedInteger('pet_id');
            $table->unsignedInteger('user_id');
            $table->string('lost_time');
            $table->string('lost_place');
            $table->timestamps();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lost_pets', function (Blueprint $table)
        {
            // $table->dropForeign((['lost_pet_id']));
            // $table->dropForeign((['user_id']));
        });
        Schema::dropIfExists('lost_pets');
    }
}
