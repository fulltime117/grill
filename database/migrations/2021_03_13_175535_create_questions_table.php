<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lesson_id')->constrained()->onDelete('cascade');
            $table->string('q')->nullable();
            $table->string('opt1')->nullable();
            $table->string('opt2')->nullable();
            $table->string('opt3')->nullable();
            $table->string('opt4')->nullable();
            $table->string('answer')->nullable();
            $table->string('answer_number')->nullable();
            $table->integer('question_number')->nullable(); // order
            $table->boolean('active')->default(1);
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
        Schema::dropIfExists('questions');
    }
}
