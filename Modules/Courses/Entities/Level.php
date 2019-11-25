<?php

namespace Modules\Courses\Entities;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Level extends Model
{

    protected $guarded = [];

    public function track()
    {
        return $this->belongsTo(Track::class,'track_id', 'id');
    }
}
