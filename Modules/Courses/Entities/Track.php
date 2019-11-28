<?php

namespace Modules\Courses\Entities;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Track extends Model
{

    protected $guarded = [];
    public $translationModel = TrackTranslation::class;

  
}
