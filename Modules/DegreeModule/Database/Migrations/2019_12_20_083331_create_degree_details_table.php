<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDegreeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degree_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('degree_id')->nullable()->unsigned();
            $table->integer('student_id')->nullable()->unsigned();

            $table->double('attendance');
            $table->double('homework');
            $table->double('action');
            $table->double('total');


            
            $table->foreign('degree_id')->references('id')->on('degrees')->onDelete('cascade');
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
        Schema::dropIfExists('degree_details');
    }
}
