<?php

namespace Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;

class studentLevels extends Model
{
    protected $fillable = ['student_id' , 'suggestedLevel','suggestedCoach','suggestedDay',
        'suggestedFromHour','suggestedToHour','suggestedDate','finallyLevel','finallyCoach',
        'finallyDay','finallyFromHour','finallyToHour','finallyDate'
    ];
}
