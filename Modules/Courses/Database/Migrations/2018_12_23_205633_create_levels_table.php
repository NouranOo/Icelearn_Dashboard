<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('description')->nullable();

             $table->integer('course_id')->unsigned()->nullable();
             $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
             
            // $table->integer('track_id')->unsigned()->nullable();
            // $table->integer('created_by')->unsigned()->nullable();

            // $table->foreign('created_by')->references('id')->on('admins')->onDelete('set null');
            // $table->foreign('track_id')->references('id')->on('tracks')
                // ->onUpdate('cascade')
                // ->onDelete('cascade');
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
        Schema::dropIfExists('levels');
    }
}
