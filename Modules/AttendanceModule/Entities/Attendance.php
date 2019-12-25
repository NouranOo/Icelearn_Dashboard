<?php

namespace Modules\AttendanceModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Student\Entities\Student;
use Modules\ClassModule\Entities\SubClasse;
use Modules\ClassModule\Entities\Classe;


class Attendance extends Model
{
    protected $fillable = ['classe_id','student_id','sub_classe_id','attendance'];

    public function students(){

        return $this->belongsTo
        (Student::class, 'student_id');
    }

    public function classes(){

        return $this->belongsTo
        (Classe::class);
    }

    public function subclasses(){

        return $this->belongsTo
        (SubClasse::class);
    }
}
