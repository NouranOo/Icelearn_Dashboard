<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('classe_id')->unsigned()->nullable();
            $table->foreign('classe_id')->references('id')->on('classes')
                ->onDelete('cascade')
                ->onUpdate('cascade');


            $table->integer('student_id')->unsigned()->nullable();
            $table->foreign('student_id')->references('id')->on('students')
                ->onDelete('cascade')
                ->onUpdate('cascade');


            $table->integer('sub_classe_id')->unsigned()->nullable();
            $table->foreign('sub_classe_id')->references('id')->on('sub_classes')
                ->onDelete('cascade')
                ->onUpdate('cascade');



            $table->string('attendance')->nullable();
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
        Schema::dropIfExists('attendances');
    }
}
