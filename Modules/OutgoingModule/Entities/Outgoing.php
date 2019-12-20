<?php

namespace Modules\OutgoingModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Outgoing extends Model
{
    protected $fillable = ['date','day','money','reason','created_by'];
}
