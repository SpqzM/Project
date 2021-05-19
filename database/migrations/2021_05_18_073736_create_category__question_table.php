<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_question', function (Blueprint $table) {
            $table->primary(['question_id', 'category_id']);
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('question_id')->on('questions')->references('id');
            $table->foreign('category_id')->on('categories')->references('id');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_question');
    }
}
