<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthsTable extends Migration
{
    
    public function up()
    {
        Schema::create('months', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('student_id')->nullable()->unsigned();
            $table->integer('classe_id')->nullable()->unsigned();

            $table->string('number')->nullable();
            $table->string('name')->nullable();
            $table->string('date')->nullable();

            $table->double('month_degree')->nullable();


            $table->foreign('classe_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');


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
        Schema::dropIfExists('months');
    }
}
