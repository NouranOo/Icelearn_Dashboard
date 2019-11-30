<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_levels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->string('suggestedLevel')->nullable();
            $table->string('suggestedCoach')->nullable();
            $table->string('suggestedDay')->nullable();
            $table->string('suggestedFromHour')->nullable();
            $table->string('suggestedToHour')->nullable();
            $table->string('suggestedDate')->nullable();
            $table->integer('finallyLevel')->unsigned();
            $table->string('finallyCoach')->nullable();
            $table->string('finallyDay')->nullable();
            $table->string('finallyFromHour')->nullable();
            $table->string('finallyToHour')->nullable();
            $table->string('finallyDate')->nullable();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('finallyLevel')->references('id')->on('levels')->onDelete('cascade');
            
            // $table->integer('level_id')->unsigned();
            // $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            // $table->foreign('suggestedLevel')->references('id')->on('levels')->onDelete('cascade');



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
        Schema::dropIfExists('student_levels');
    }
}
