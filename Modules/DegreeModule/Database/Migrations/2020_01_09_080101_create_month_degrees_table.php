<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthDegreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('month_degrees', function (Blueprint $table) {
            $table->increments('id');
            $table->double('lasttoteldeg')->nullable();
            $table->double('projectdegree')->nullable();
            $table->double('total')->nullable();
            $table->string('status')->nullable();

            $table->integer('student_id')->nullable()->unsigned();
            $table->integer('month_id')->nullable()->unsigned();
            $table->integer('class_id')->nullable()->unsigned();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('month_id')->references('id')->on('months')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('month_degrees');
    }
}
