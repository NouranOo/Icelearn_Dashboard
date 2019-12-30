<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('code')->nullable();
            $table->string('course')->nullable();
            $table->string('level')->nullable();
            $table->integer('course_id')->unsigned()->nullable();
            $table->integer('level_id')->unsigned()->nullable();
            $table->double('money')->nullable();
            $table->string('type_payment');
            $table->string('date');
            $table->string('discount')->nullable();
            $table->string('discount_owner')->nullable();
            $table->string('recipient')->nullable();
            $table->string('secretary')->nullable();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');



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
        Schema::dropIfExists('payments');
    }
}
