<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDegreeDetailsTable extends Migration
{
   
    public function up()
    {
        Schema::create('degree_details', function (Blueprint $table) {
            $table->increments('id');

            
            $table->integer('student_id')->nullable()->unsigned();
            $table->integer('subclasse_id')->nullable()->unsigned();
            $table->integer('class_id')->nullable()->unsigned();
            $table->integer('month_id')->nullable()->unsigned();

            $table->double('attendance');
            $table->double('homework');
            $table->double('action');
            $table->double('total');

          

            $table->foreign('subclasse_id')->references('id')->on('sub_classes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('degree_details');
    }
}
