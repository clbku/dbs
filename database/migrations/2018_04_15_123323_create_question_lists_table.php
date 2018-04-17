<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tn1')->unsigned();
            $table->foreign('tn1')->references('id')->on('question_banks')->onDelete('cascade');
            $table->integer('tn2')->unsigned();
            $table->foreign('tn2')->references('id')->on('question_banks')->onDelete('cascade');
            $table->integer('tn3')->unsigned();
            $table->foreign('tn3')->references('id')->on('question_banks')->onDelete('cascade');
            $table->integer('tn4')->unsigned();
            $table->foreign('tn4')->references('id')->on('question_banks')->onDelete('cascade');
            $table->integer('tn5')->unsigned();
            $table->foreign('tn5')->references('id')->on('question_banks')->onDelete('cascade');
            $table->integer('tn6')->unsigned();
            $table->foreign('tn6')->references('id')->on('question_banks')->onDelete('cascade');
            $table->integer('tn7')->unsigned();
            $table->foreign('tn7')->references('id')->on('question_banks')->onDelete('cascade');
            $table->integer('tn8')->unsigned();
            $table->foreign('tn8')->references('id')->on('question_banks')->onDelete('cascade');
            $table->integer('tn9')->unsigned();
            $table->foreign('tn9')->references('id')->on('question_banks')->onDelete('cascade');
            $table->integer('tn10')->unsigned();
            $table->foreign('tn10')->references('id')->on('question_banks')->onDelete('cascade');
            $table->integer('tl1')->unsigned();
            $table->foreign('tl1')->references('id')->on('question_banks')->onDelete('cascade');
            $table->integer('tl2')->unsigned();
            $table->foreign('tl2')->references('id')->on('question_banks')->onDelete('cascade');
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
        Schema::dropIfExists('question_lists');
    }
}
