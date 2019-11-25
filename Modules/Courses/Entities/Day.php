<?php

namespace Modules\Courses\Entities;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Day extends Model
{

    protected $guarded = [];

    public function groups(){

//        return $this->belongsToMany
//        (Group::class, 'group_day', 'day_id','group_id');
    }

}
