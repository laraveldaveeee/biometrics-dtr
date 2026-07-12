<?php

namespace App\Http\Controllers;

use App\DailyAttendance;
use App\Department;
use App\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;


class MonthlyDTRController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::orderBy('name')->get();
        $departments = Department::orderBy('department_name')->get();

        $query = DailyAttendance::with([
            'employee.department',
            'employee.position'
        ]);

        if ($request->filled('employee_id')) {

            $query->where(
                'employee_id',
                $request->employee_id
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

        if ($request->filled('month')) {

            $month = Carbon::parse($request->month);

            $query->whereYear(
                'attendance_date',
                $month->year
            );

            $query->whereMonth(
                'attendance_date',
                $month->month
            );

        }

        $records =

            $query

            ->orderBy(
                'attendance_date'
            )

            ->paginate(20);

        return view(

            'reports.monthly.index',

            compact(

                'employees',

                'departments',

                'records'

            )

        );
    }

   public function print(Request $request)
    {
        $query = DailyAttendance::with([
            'employee.department',
            'employee.position'
        ]);

        if ($request->filled('employee_id')) {
            $query->where('employee_id', $request->employee_id);
        }

        if ($request->filled('department_id')) {
            $query->whereHas('employee.department', function ($q) use ($request) {
                $q->where('id', $request->department_id);
            });
        }

        if ($request->filled('month')) {

            $month = \Carbon\Carbon::parse($request->month);

            $query->whereYear('attendance_date', $month->year)
                  ->whereMonth('attendance_date', $month->month);
        }

        $records = $query
            ->orderBy('attendance_date')
            ->get();

        // Kunin ang employee
        $employee = null;

        if ($request->filled('employee_id')) {

            $employee = Employee::with([
                'department',
                'position'
            ])->find($request->employee_id);

        } elseif ($records->count()) {

            // Kung walang employee_id pero may records,
            // kunin ang employee mula sa unang record
            $employee = $records->first()->employee;

        }

        return view(
            'reports.monthly.print',
            compact(
                'records',
                'employee'
            )
        );
    }

   public function pdf(Request $request)
    {
        $query = DailyAttendance::with([
            'employee.department',
            'employee.position'
        ]);

        if ($request->filled('employee_id')) {
            $query->where('employee_id', $request->employee_id);
        }

        if ($request->filled('department_id')) {

            $query->whereHas('employee.department', function ($q) use ($request) {

                $q->where('id', $request->department_id);

            });

        }

        if ($request->filled('month')) {

            $month = \Carbon\Carbon::parse($request->month);

            $query->whereYear('attendance_date', $month->year)
                  ->whereMonth('attendance_date', $month->month);

        }

        $records = $query
            ->orderBy('attendance_date')
            ->get();

        $employee = null;

        if ($request->filled('employee_id')) {

            $employee = Employee::with([
                'department',
                'position'
            ])->find($request->employee_id);

        } elseif ($records->count()) {

            $employee = $records->first()->employee;

        }

        $pdf = \PDF::loadView(
            'reports.monthly.print',
            compact(
                'records',
                'employee'
            )
        );

        $pdf->setPaper('legal','portrait');

       return $pdf->stream();
    }

}