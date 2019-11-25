<?php

namespace Modules\Courses\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Courses\Entities\Category;
use Modules\Instructors\Entities\Instructor;
use Modules\Track\Entities\Track;
use Modules\Track\Entities\Level;

class Course extends Model
{


    protected $guarded = [];


    public function track()
    {
        return $this->belongsTo(Track::class, 'track_id', 'id');
    }
    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id', 'id');
    }

    public function categories(){
        return $this->belongsToMany(CourseCategory::class,'course_category','course_id','category_id');
    }

    public function instructors(){
        return $this->belongsToMany(Instructor::class,'courses_instructors','course_id','instructor_id');
    }
    public function students(){
        return $this->belongsToMany(Student::class,'course__students','course_id','student_id');
    }

}
