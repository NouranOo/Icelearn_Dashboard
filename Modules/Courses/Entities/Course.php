<?php

namespace Modules\Courses\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Courses\Entities\Category;
use Modules\Instructors\Entities\Instructor;
use Modules\Track\Entities\Track;
use Modules\Courses\Entities\Level;
use Modules\Student\Entities\Student;
use Modules\ClassModule\Entities\Classe;



use Modules\PaymentModule\Entities\Payment;

class Course extends Model
{

    protected $fillable=['title','book_fees','month_fees','levels_number'];
    protected $guarded = [];


   
    public function levels()
    {
        return $this->hasMany(Level::class);
    }

    public function classes()
    {
        return $this->hasMany(Classe::class);
    }

    

    public function instructors(){
        return $this->belongsToMany(Instructor::class,'courses_instructors','course_id','instructor_id');
    }
    public function students(){
        return $this->belongsToMany(Student::class,'course_students','course_id','student_id');
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }

}
