<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('date')->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->string('day')->nullable();
            $table->integer('level_id')->nullable()->unsigned();
            $table->integer('course_id')->nullable()->unsigned();
            $table->integer('instructor_id')->nullable()->unsigned();


            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('cascade');


            


            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
