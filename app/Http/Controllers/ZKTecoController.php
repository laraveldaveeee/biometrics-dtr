<?php

namespace App\Http\Controllers;

use App\Employee;
use Rats\Zkteco\Lib\ZKTeco;
use App\AttendanceLog;
use Carbon\Carbon;
use App\Services\AttendanceService;

class ZKTecoController extends Controller
{
    public function syncUsers()
    {
        $zk = new ZKTeco('10.3.40.177', 4370);

        if (!$zk->connect()) {
            return "Cannot connect to device.";
        }

        $users = $zk->getUser();

        foreach ($users as $user) {

            Employee::updateOrCreate(
                [
                    'biometric_userid' => $user['userid']
                ],
                [
                    'biometric_uid' => $user['uid'],
                    'name' => $user['name'],
                    'status' => true
                ]
            );

        }

        return "Users synchronized successfully!";
    }

   public function syncAttendance()
    {
        $zk = new ZKTeco('10.3.40.177', 4370);

        if (!$zk->connect()) {
            return "Cannot connect to device.";
        }

        $logs = $zk->getAttendance();

        foreach ($logs as $log) {

            AttendanceLog::firstOrCreate(
                [
                    'biometric_uid'   => $log['uid'],
                    'attendance_time' => $log['timestamp']
                ],
                [
                    'biometric_userid' => $log['id'],
                    'state'            => $log['state'],
                    'verify_type'      => $log['type'],
                    'processed'        => false,
                    'synced_at'        => Carbon::now()
                ]
            );
        }

        // Process papunta sa Daily Attendance
        (new AttendanceService())->process();

        return "Attendance synchronized successfully!";
    }
}