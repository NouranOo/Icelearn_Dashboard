<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number')->nullable();
            $table->string('day')->nullable();
            $table->string('date')->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->integer('classe_id')->nullable()->unsigned();
            $table->integer('month_id')->nullable()->unsigned();


            $table->foreign('classe_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('month_id')->references('id')->on('months')->onDelete('cascade');






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
        Schema::dropIfExists('sub_classes');
    }
}
