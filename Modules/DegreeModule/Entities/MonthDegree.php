<?php

namespace Modules\DegreeModule\Entities;

use Illuminate\Database\Eloquent\Model;

class MonthDegree extends Model
{
    protected $fillable = ['lasttotal','projectdegree','total','status','student_id','month_id','class_id'];
}
