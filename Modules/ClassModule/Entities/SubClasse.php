<?php

namespace Modules\ClassModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\ClassModule\Entities\Classe;


class SubClasse extends Model
{
    protected $fillable = ['number','day','date','from','to','classe_id'];


    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
