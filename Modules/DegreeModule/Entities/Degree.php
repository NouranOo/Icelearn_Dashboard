<?php

namespace Modules\DegreeModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\ClassModule\Entities\SubClasse;


class Degree extends Model
{
    protected $fillable = ['subclasse_id','class_id'];

    
    public function subclasse(){

        return $this->hasOne(SubClasse::class);

    }
}
