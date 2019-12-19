<?php

namespace Modules\ClassModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Courses\Entities\Course;
use Modules\Courses\Entities\Level;
use Modules\Instructors\Entities\Instructor;
use Modules\Student\Entities\Student;
use Modules\ClassModule\Entities\SubClasse;





class Classe extends Model
{
    protected $fillable = ['name','date','from','to','day','level_id','course_id','instructor_id'];


    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function students(){
        return $this->belongsToMany(Student::class,'classe_students','classe_id','student_id')->withPivot('id');
    }

    public function subclasses()
    {
        return $this->hasMany(SubClasse::class);
    }
    
}
