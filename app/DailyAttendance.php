<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyAttendance extends Model
{
    protected $fillable = [
        'employee_id',
        'attendance_date',
        'time_in',
        'time_out',
        'late_minutes',
        'undertime_minutes',
        'remarks',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}