<?php

namespace Modules\Courses\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Courses\Entities\Course;
use Modules\Courses\Entities\CourseCategoryTranslation;

class CourseCategory extends Model
{

    protected $guarded = [];


    public function courses()
    {
        return $this->belongsToMany(Course::class,'course_category','category_id','course_id');
    }

    /**
     * Making Relation on the SELF-JOIN DB.
     *
     ** NOTE: 2 relations are made in the same model, due to SELF-JOIN.
     *
     * @return void
     */
    public function child()
    {
        return $this->hasMany(CourseCategory::class, 'parent_id', 'id');
    }

   public function parent()
    {
        return $this->belongsTo(CourseCategory::class, 'parent_id', 'id');
    }

}
