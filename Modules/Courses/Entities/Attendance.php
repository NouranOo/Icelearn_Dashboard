<?php

namespace Modules\Courses\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Student\Entities\Student;

class Attendance extends Model
{
    protected $guarded = [];

    public function students(){

        return $this->belongsTo
        (Student::class, 'student_id');
    }
}
