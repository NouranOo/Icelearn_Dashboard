<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('nationality')->nullable();
            $table->string('phone')->nullable();
            $table->string('birthDate')->nullable();
            $table->string('age')->nullable();
            $table->string('mail')->nullable();
            $table->string('gender')->nullable();
            $table->string('type')->nullable();
            $table->string('currentJob')->nullable();
            $table->string('address')->nullable();
            $table->integer('telephoneFix')->nullable();
            $table->string('barCode')->nullable();
            // $table->string('suggestedLevel')->nullable();
            // $table->string('suggestedCoach')->nullable();
            // $table->string('suggestedDay')->nullable();
            // $table->string('suggestedFromHour')->nullable();
            // $table->string('suggestedToHour')->nullable();
            // $table->string('suggestedDate')->nullable();
            // $table->string('finallyLevel')->nullable();
            // $table->string('finallyCoach')->nullable();
            // $table->string('finallyDay')->nullable();
            // $table->string('finallyFromHour')->nullable();
            // $table->string('finallyToHour')->nullable();
            // $table->string('finallyDate')->nullable();
            $table->string('photo')->nullable();

            ######
            $table->string('NID')->nullable();
            $table->string('schoolName')->nullable();
            $table->string('schoolAdd')->nullable();
            $table->string('schoolType')->nullable();
            $table->integer('grade')->nullable();
            $table->integer('downPayment')->default(0)->nullable();
            ######


            $table->integer('guardian_id')->unsigned()->nullable();
            $table->foreign('guardian_id')->references('id')->on('guardians')
                ->onDelete('set null');


            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('admins')->onDelete('set null');
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
        Schema::dropIfExists('students');
    }
}
