<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceLog extends Model
{
    protected $fillable = [
        'biometric_uid',
        'biometric_userid',
        'state',
        'verify_type',
        'attendance_time',
        'processed',
        'synced_at'
    ];
}
