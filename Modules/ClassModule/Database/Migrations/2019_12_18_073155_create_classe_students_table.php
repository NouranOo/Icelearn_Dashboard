<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClasseStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classe_students', function (Blueprint $table) {
            $table->increments('id');


            $table->integer('classe_id')->unsigned();
            $table->foreign('classe_id')->references('id')->on('classes')
                ->onDelete('cascade');

            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')
                ->onDelete('cascade');

                $table->unique(['classe_id','student_id']);

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
        Schema::dropIfExists('classe_students');
    }
}
