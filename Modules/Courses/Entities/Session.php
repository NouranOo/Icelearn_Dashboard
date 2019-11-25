<?php

namespace Modules\Courses\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Student\Entities\Student;

class Session extends Model
{
    protected $guarded = [];

    public function group()
    {

        return $this->belongsTo
        (Group::class, 'group_id', 'id');
    }
    public function students()
    {

//        return $this->hasMany
//        (Student::class,  'sess_id');

    }

}
