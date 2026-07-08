<?php

namespace App\Services;

use App\AttendanceLog;
use App\DailyAttendance;
use App\Employee;
use Carbon\Carbon;

class AttendanceService
{
    public function process()
    {
        $logs = AttendanceLog::where('processed', false)
            ->orderBy('attendance_time', 'asc')
            ->get();

        foreach ($logs as $log) {

            $employee = Employee::where(
                'biometric_userid',
                $log->biometric_userid
            )->first();

            if (!$employee) {
                continue;
            }

            $date = Carbon::parse($log->attendance_time)->toDateString();

            $daily = DailyAttendance::firstOrCreate(
                [
                    'employee_id' => $employee->id,
                    'attendance_date' => $date,
                ],
                [
                    'time_in' => null,
                    'time_out' => null,
                    'late_minutes' => 0,
                    'undertime_minutes' => 0,
                    'remarks' => null,
                ]
            );

            if (is_null($daily->time_in)) {

                $daily->time_in = $log->attendance_time;

            } else {

                if (
                    Carbon::parse($log->attendance_time)
                        ->gt(Carbon::parse($daily->time_in))
                ) {

                    $daily->time_out = $log->attendance_time;

                }

            }

            $daily->save();

            $log->processed = true;
            $log->save();
        }
    }
}