<?php

namespace Modules\Courses\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Instructors\Entities\Instructor;
use Modules\Student\Entities\Student;

class Group extends Model
{
    protected $guarded = [];


    public function instructor(){

        return $this->belongsTo
        (Instructor::class, 'instructor_id','id');
    }


    public function course(){

        return $this->belongsTo(Course::class, 'course_id','id');
    }

    public function sessions(){

        return $this->hasMany(Session::class,'group_id');
    }


    public function students(){

        return $this->belongsToMany
        (Student::class, 'group_student', 'group_id','student_id');
    }

    public function days(){

        return $this->hasMany
        (Day::class, 'group_id');
    }
}
