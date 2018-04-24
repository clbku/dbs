<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_registers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('dob');
            $table->string('address');
            $table->string('hometown')->nullable();
            $table->string('sex');
            $table->string('phone');
            $table->string('email');
            $table->string('school')->nullable();
            $table->unsignedInteger('specialize_id');
            $table->foreign('specialize_id')->references('id')->on('specializes')->onDelete('cascade');
            $table->string('achievements')->nullable();
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
        Schema::dropIfExists('tutor_registers');
    }
}
