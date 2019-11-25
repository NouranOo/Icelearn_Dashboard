<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->integer('allSessions');
                $table->integer('sessionsPerWeek');
                $table->date('groupStartDate');


                $table->integer('instructor_id')->unsigned()->nullable();
                $table->foreign('instructor_id')->references('id')->on('instructors')
                    ->onDelete('set null')
                    ->onUpdate('set null');

                $table->integer('course_id')->unsigned()->nullable();
                $table->foreign('course_id')->references('id')->on('courses')
                    ->onDelete('set null')
                    ->onUpdate('set null');

            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('admins')
                    ->onDelete('set null')
                    ->onUpdate('set null');

                $table->timestamps();
            });


            Schema::create('group_student', function (Blueprint $table) {
                $table->integer('group_id')->unsigned();
                $table->foreign('group_id')->references('id')->on('groups')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

                $table->integer('student_id')->unsigned();
                $table->foreign('student_id')->references('id')->on('students')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

                $table->unique(['group_id','student_id']);
                $table->timestamps();
            });




        Schema::create('days', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('day_id');
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
        Schema::dropIfExists('groups');
    }
}
