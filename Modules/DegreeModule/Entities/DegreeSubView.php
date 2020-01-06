<?php

namespace Modules\DegreeModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Student\Entities\Student;


class DegreeSubView extends Model
{
    protected $fillable = [];
    protected $table = "total_deg_sub";

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
}
