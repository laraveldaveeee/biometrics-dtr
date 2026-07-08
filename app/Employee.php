<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'biometric_uid',
        'biometric_userid',
        'name',
        'employee_no',
        'department_id',
        'position_id',
        'photo',
        'contact_no',
        'address',
        'status',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}