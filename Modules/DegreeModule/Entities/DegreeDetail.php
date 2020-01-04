<?php

namespace Modules\DegreeModule\Entities;
use Modules\DegreeModule\Entities\Month;
use Modules\Student\Entities\Student;



use Illuminate\Database\Eloquent\Model;

class DegreeDetail extends Model
{
    protected $fillable = ['month_id','subclasse_id','class_id','degree_id','student_id','attendance','homework','action','total'];


    public function month(){
        return $this->belongsTo(Month::class);
    }

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }


}
