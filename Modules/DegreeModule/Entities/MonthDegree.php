<?php

namespace Modules\DegreeModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\ClassModule\Entities\Classe;
use Modules\DegreeModule\Entities\Month;
use Modules\Student\Entities\Student;


class MonthDegree extends Model
{
    protected $fillable = ['lasttoteldeg','projectdegree','total','status','student_id','month_id','class_id'];

    public function classe()
    {
        return $this->belongsTo(Classe::class,'class_id');
    }

    public function month(){
        return $this->belongsTo(Month::class,'month_id');
    }

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }

  
}
