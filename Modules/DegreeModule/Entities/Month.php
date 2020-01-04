<?php

namespace Modules\DegreeModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\ClassModule\Entities\Classe;
use Modules\ClassModule\Entities\SubClasse;
use Modules\DegreeModule\Entities\DegreeDetail;




class Month extends Model
{
    protected $fillable = ['number','name','classe_id','student_id','month_degree','date'];

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function subclasses()
    {
        return $this->hasMany(SubClasse::class);
    }

    public function degreedetails()
    {
        return $this->hasMany(DegreeDetail::class);
    }
}
