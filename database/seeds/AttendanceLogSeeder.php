<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Employee;
use Carbon\Carbon;

class AttendanceLogSeeder extends Seeder
{
    public function run()
    {
        $employee = Employee::find(1);

        if (!$employee) {
            $this->command->error('Employee ID 18 not found.');
            return;
        }

        if (!$employee->biometric_userid) {
            $this->command->error(
                'Employee ID 18 has no biometric_userid.'
            );
            return;
        }

        $now = Carbon::now();

        $date = '2026-08-31';

        $userid = $employee->biometric_userid;

        $uid = $employee->biometric_uid;

        $logs = [

            // =========================
            // TIME IN
            // =========================

            [
                'biometric_uid'    => $uid,
                'biometric_userid' => $userid,
                'state'            => 0,
                'verify_type'      => 1,
                'attendance_time'  => "$date 07:00:00",
                'processed'        => false,
                'synced_at'        => $now,
                'created_at'       => $now,
                'updated_at'       => $now,
            ],

            // Duplicate IN
            [
                'biometric_uid'    => $uid,
                'biometric_userid' => $userid,
                'state'            => 0,
                'verify_type'      => 1,
                'attendance_time'  => "$date 07:06:00",
                'processed'        => false,
                'synced_at'        => $now,
                'created_at'       => $now,
                'updated_at'       => $now,
            ],


            // =========================
            // BREAK OUT
            // =========================

            [
                'biometric_uid'    => $uid,
                'biometric_userid' => $userid,
                'state'            => 1,
                'verify_type'      => 1,
                'attendance_time'  => "$date 12:00:00",
                'processed'        => false,
                'synced_at'        => $now,
                'created_at'       => $now,
                'updated_at'       => $now,
            ],

            // Duplicate BREAK OUT
            [
                'biometric_uid'    => $uid,
                'biometric_userid' => $userid,
                'state'            => 1,
                'verify_type'      => 1,
                'attendance_time'  => "$date 12:05:00",
                'processed'        => false,
                'synced_at'        => $now,
                'created_at'       => $now,
                'updated_at'       => $now,
            ],


            // =========================
            // BREAK IN
            // =========================

            [
                'biometric_uid'    => $uid,
                'biometric_userid' => $userid,
                'state'            => 0,
                'verify_type'      => 1,
                'attendance_time'  => "$date 12:30:00",
                'processed'        => false,
                'synced_at'        => $now,
                'created_at'       => $now,
                'updated_at'       => $now,
            ],


            // =========================
            // TIME OUT
            // =========================

            [
                'biometric_uid'    => $uid,
                'biometric_userid' => $userid,
                'state'            => 1,
                'verify_type'      => 1,
                'attendance_time'  => "$date 17:00:00",
                'processed'        => false,
                'synced_at'        => $now,
                'created_at'       => $now,
                'updated_at'       => $now,
            ],

            // Duplicate OUT
            [
                'biometric_uid'    => $uid,
                'biometric_userid' => $userid,
                'state'            => 1,
                'verify_type'      => 1,
                'attendance_time'  => "$date 17:06:00",
                'processed'        => false,
                'synced_at'        => $now,
                'created_at'       => $now,
                'updated_at'       => $now,
            ],

        ];

        DB::table('attendance_logs')->insert($logs);

        $this->command->info(
            'Test attendance logs inserted for: ' .
            $employee->name
        );

        $this->command->info(
            'Biometric User ID: ' .
            $employee->biometric_userid
        );
    }
}