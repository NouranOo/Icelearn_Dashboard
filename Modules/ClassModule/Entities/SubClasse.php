<?php

namespace Modules\ClassModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\ClassModule\Entities\Classe;
use Modules\DegreeModule\Entities\Degree;
use Modules\AttendanceModule\Entities\Attendance;




class SubClasse extends Model
{
    protected $fillable = ['number','day','date','from','to','classe_id'];


    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function degree(){

        return $this->belongsTo(Degree::class);

    }
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
