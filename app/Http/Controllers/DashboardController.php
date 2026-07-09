<?php

namespace App\Http\Controllers;

use App\Employee;
use App\DailyAttendance;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today()->toDateString();

        $totalEmployees = Employee::where('status', 1)->count();

        $presentToday = DailyAttendance::whereDate(
            'attendance_date',
            $today
        )
        ->whereNotNull('time_in')
        ->count();

        $lateToday = DailyAttendance::whereDate(
            'attendance_date',
            $today
        )
        ->where('late_minutes', '>', 0)
        ->count();

        $timeOutToday = DailyAttendance::whereDate(
            'attendance_date',
            $today
        )
        ->whereNotNull('time_out')
        ->count();

        $recentAttendances = DailyAttendance::with([
            'employee.department'
        ])
        ->latest('updated_at')
        ->take(8)
        ->get();

        return view('dashboard.index', compact(
            'totalEmployees',
            'presentToday',
            'lateToday',
            'timeOutToday',
            'recentAttendances'
        ));
    }
}