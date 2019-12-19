<?php

namespace Modules\Instructors\Entities;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;
use Modules\ClassModule\Entities\Classe;


class Instructor extends Model
{

    protected $guarded = [];

    public function classes()
    {
        return $this->hasMany(Classe::class);
    }

}
