<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    protected $fillable = [

        'office_name',
        'office_address',
        'office_logo',

        'prepared_by',
        'prepared_position',

        'checked_by',
        'checked_position',

        'approved_by',
        'approved_position'

    ];
}