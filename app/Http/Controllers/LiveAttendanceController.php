<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DailyAttendance;
class LiveAttendanceController extends Controller
{
   public function index()
    {
        $attendance = DailyAttendance::with('employee.department')
            ->latest('updated_at')
            ->first();

        $recent = DailyAttendance::with('employee.department')
            ->latest('updated_at')
            ->take(10)
            ->get();

        return view('live.index', compact('attendance', 'recent'));
    }

    public function latest()
    {
        $attendance = DailyAttendance::with('employee.department')
            ->latest('updated_at')
            ->first();

        $recent = DailyAttendance::with('employee.department')
            ->latest('updated_at')
            ->take(10)
            ->get();

        return response()->json([
            'attendance' => $attendance,
            'recent' => $recent
        ]);
    }
}
