<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Here i have data that won't be translated,
         * like: [id, code, ...].
         */
        Schema::create('instructors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->longText('education')->nullable();
            $table->longText('experience')->nullable();
            $table->longText('others')->nullable();
            $table->string('photo')->nullable();
            $table->string('phone')->nullable();;
            $table->string('email')->nullable();
            $table->string('cv')->nullable();


            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('admins')->onDelete('set null');
            $table->timestamps();
        });
        /**
         * but here, i Have the data that i want to Translate.
         *
         * Here is the Game.
         */
        /**Schema::create('instructors_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('instructor_id')->unsigned();


            $table->string('meta_title')->nullable();
            $table->string('meta_desc')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('locale')->index();
            $table->unique(['instructor_id', 'locale']);
            $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('cascade');
        });**/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instructors');

    }
}
