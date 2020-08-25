<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNormalPetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('normal_pets', function (Blueprint $table) {
            $table->Increments('normal_pet_id');
            $table->unsignedInteger('pet_id');
            $table->unsignedInteger('user_id');
            $table->string('reason');
            $table->string('approval_status');
            $table->string('status');
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
        Schema::dropIfExists('normal_pets');
    }
}
