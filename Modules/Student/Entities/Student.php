<?php

namespace Modules\Student\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Courses\Entities\Group;

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
        return $this->belongsToMany(Course::class,'course__students','student_id','course_id');
    }
}
