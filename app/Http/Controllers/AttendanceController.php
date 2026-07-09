<?php

namespace App\Http\Controllers;

use App\DailyAttendance;
use App\Department;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $query = DailyAttendance::with(['employee.department','employee.position']);

        // SEARCH EMPLOYEE
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('employee', function ($employeeQuery) use ($search) {
                    $employeeQuery
                        ->where(
                            'name',
                            'like',
                            '%' . $search . '%'
                        )
                        ->orWhere(
                            'employee_no',
                            'like',
                            '%' . $search . '%'
                        );
                }
            );
        }

        // FILTER BY DATE
        if ($request->filled('date')) {

            $query->where(
                'attendance_date',
                $request->date
            );
        }


        // FILTER BY DEPARTMENT
        if ($request->filled('department_id')) {

            $departmentId =
                $request->department_id;

            $query->whereHas(
                'employee',
                function ($employeeQuery)
                use ($departmentId) {

                    $employeeQuery->where(
                        'department_id',
                        $departmentId
                    );
                }
            );
        }


        // FILTER BY ATTENDANCE STATUS
        if ($request->status === 'time_in') {

            $query
                ->whereNotNull('time_in')
                ->whereNull('time_out');
        }

        if ($request->status === 'time_out') {

            $query
                ->whereNotNull('time_out');
        }


        $attendances = $query
            ->orderBy(
                'attendance_date',
                'desc'
            )
            ->orderBy(
                'time_in',
                'desc'
            )
            ->paginate(15)
            ->appends(
                $request->all()
            );


        $departments = Department::orderBy(
            'department_name'
        )->get();


        return view(
            'attendance.index',
            compact(
                'attendances',
                'departments'
            )
        );
    }
}