<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkSchedule extends Model
{
    protected $fillable = [
        'schedule_name',
        'time_in',
        'time_out',
        'grace_period',
        'break_start',
        'break_end',
        'working_days',
        'status'

    ];
}