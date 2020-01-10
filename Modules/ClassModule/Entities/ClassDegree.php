<?php

namespace Modules\ClassModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Student\Entities\Student;
use Modules\ClassModule\Entities\Classe;



class ClassDegree extends Model
{
    protected $fillable = [];
    protected $table = "class_deg_";

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
    public function classe(){
        return $this->belongsTo(Classe::class,'class_id');
    }
}
