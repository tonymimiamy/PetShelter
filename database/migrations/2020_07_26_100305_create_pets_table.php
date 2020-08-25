<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('animal_breed');
            $table->string('animal_type');
            $table->string('animal_name');
            $table->string('animal_sex');
            $table->string('animal_size');
            $table->string('animal_colour');
            $table->string('animal_age');
            $table->string('animal_img');
            $table->string('animal_ligation');
            $table->string('animal_place');
            $table->text('animal_description');
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
        Schema::dropIfExists('pets');
    }
}
