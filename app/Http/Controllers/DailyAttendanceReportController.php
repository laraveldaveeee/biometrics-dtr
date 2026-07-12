<?php

namespace App\Http\Controllers;

use App\DailyAttendance;
use App\Department;
use App\Employee;
use Illuminate\Http\Request;

class DailyAttendanceReportController extends Controller
{
    public function index(Request $request)
    {
        $query = DailyAttendance::with([
            'employee.department',
            'employee.position'
        ]);

        if ($request->filled('attendance_date')) {
            $query->whereDate(
                'attendance_date',
                $request->attendance_date
            );
        }

        if ($request->filled('department_id')) {

            $query->whereHas(
                'employee.department',
                function ($q) use ($request) {

                    $q->where(
                        'id',
                        $request->department_id
                    );

                }
            );

        }

        if ($request->filled('employee_id')) {

            $query->where(
                'employee_id',
                $request->employee_id
            );

        }

        if ($request->filled('search')) {

            $search = $request->search;

            $query->whereHas(
                'employee',
                function ($q) use ($search) {

                    $q->where(
                        'name',
                        'like',
                        "%{$search}%"
                    );

                }
            );

        }

        $attendances =

            $query

            ->latest('attendance_date')

            ->paginate(15);

        return view(

            'reports.daily.index',

            [

                'attendances' => $attendances,

                'departments' => Department::all(),

                'employees' => Employee::orderBy('name')->get(),

                'totalEmployees' => Employee::count(),

                'presentToday' => DailyAttendance::whereDate(
                    'attendance_date',
                    now()
                )->count(),

                'absentToday' =>
                    Employee::count()
                    -
                    DailyAttendance::whereDate(
                        'attendance_date',
                        now()
                    )->count()

            ]

        );
    }
}