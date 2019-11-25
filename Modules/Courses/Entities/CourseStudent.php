<?php

namespace Modules\Courses\Entities;

use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    protected $fillable = ['course_id' , 'student_id'];
}
