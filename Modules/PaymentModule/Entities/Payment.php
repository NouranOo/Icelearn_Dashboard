<?php

namespace Modules\PaymentModule\Entities;

use Illuminate\Database\Eloquent\Model;

use Modules\Student\Entities\Student;
use Modules\Courses\Entities\Level;
use Modules\Courses\Entities\Course;

class Payment extends Model
{
    protected $fillable = ['student_id','name','code','course','level','course_id','level_id','money','type_payment','date','discount','discount_owner','recipient','secretary'];
  
    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function level(){
        return $this->belongsTo(Level::class);
    }
}
