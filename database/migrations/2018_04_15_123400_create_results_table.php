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
            $table->integer('exam_id')->unsigned();
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
            $table->integer('tn1');
            $table->integer('tn2');
            $table->integer('tn3');
            $table->integer('tn4');
            $table->integer('tn5');
            $table->integer('tn6');
            $table->integer('tn7');
            $table->integer('tn8');
            $table->integer('tn9');
            $table->integer('tn10');
            $table->integer('tl1');
            $table->integer('tl2');
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
