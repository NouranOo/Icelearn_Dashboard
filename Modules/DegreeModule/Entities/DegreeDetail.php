<?php

namespace Modules\DegreeModule\Entities;

use Illuminate\Database\Eloquent\Model;

class DegreeDetail extends Model
{
    protected $fillable = ['degree_id','student_id','attendance','homework','action','total'];
}
