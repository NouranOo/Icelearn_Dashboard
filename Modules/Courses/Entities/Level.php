<?php

namespace Modules\Courses\Entities;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;
use Modules\Courses\Entities\Course;
use Modules\Student\Entities\Student;
use Modules\PaymentModule\Entities\Payment;


class Level extends Model
{

    protected $guarded = [];

   
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public function students(){
        return $this->belongsToMany(Student::class,'student_levels','finallyLevel','student_id');
    }
}
