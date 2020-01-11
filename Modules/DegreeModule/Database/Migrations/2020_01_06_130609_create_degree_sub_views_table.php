<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;


class CreateDegreeSubViewsTable extends Migration
{
 
    public function up()
    {
        DB::statement('create view total_deg_sub as SELECT sum(total) as total_degree,student_id,month_id from degree_details group by student_id , month_id');
      
    }

  
    public function down()
    {
        Schema::dropIfExists('degree_sub_views');
        DB::statement('DROP VIEW IF EXISTS total_deg_sub');
    }
}
