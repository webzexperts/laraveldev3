<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property', function (Blueprint $table) {
            $table->id();
            $table->string('name',128);
            $table->enum('real_state_type',['house','department','land','commercial_ground']);
            $table->string('street',128);
            $table->string('external_number',12);
            $table->string('Internal_number',12);
            $table->string('neighborhood',128);
            $table->string('city',64);
            $table->string('country',12);
            $table->integer('rooms');
            $table->integer('bathrooms');
            $table->string('comments',128);
            $table->tinyInteger('is_deleted')->default('0');
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
        Schema::dropIfExists('property');
    }
}
