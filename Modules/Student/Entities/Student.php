<?php

namespace Modules\Student\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Courses\Entities\Group;
use Modules\Courses\Entities\Course;

use Modules\PaymentModule\Entities\Payment;

class Student extends Model
{


    protected $guarded = [];

    public function guardian()
    {
        return $this->hasOne(Guardian::class, 'id','guardian_id');
    }

    public function groups(){

        return $this->belongsToMany
        (Group::class, 'group_student', 'student_id' ,'group_id');
    }
    public function courses(){
        return $this->belongsToMany(Course::class,'course_students','student_id','course_id');
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
