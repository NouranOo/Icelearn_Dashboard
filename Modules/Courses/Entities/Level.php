<?php

namespace Modules\Courses\Entities;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;
use Modules\Courses\Entities\Course;


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
}
