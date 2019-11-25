<?php

namespace Modules\Student\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{

    protected $guarded = [];


//    public function students()
//    {
//        return $this->hasMany(Student::class, 'parent_id', 'id');
//    }


}
