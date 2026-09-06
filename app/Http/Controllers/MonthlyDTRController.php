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

   // public function pdf(Request $request)
   //  {
   //      $query = DailyAttendance::with([
   //          'employee.department',
   //          'employee.position'
   //      ]);

   //      if ($request->filled('employee_id')) {
   //          $query->where('employee_id', $request->employee_id);
   //      }

   //      if ($request->filled('department_id')) {
   //          $query->whereHas('employee.department', function ($q) use ($request) {
   //              $q->where('id', $request->department_id);
   //          });
   //      }

   //      if ($request->filled('month')) {
   //          $month = \Carbon\Carbon::parse($request->month)
   //          $query->whereYear('attendance_date', $month->year)
   //                ->whereMonth('attendance_date', $month->month);
   //      }

   //      $records = $query
   //          ->orderBy('attendance_date')
   //          ->get();

   //      $employee = null;

   //      if ($request->filled('employee_id')) {

   //          $employee = Employee::with([
   //              'department',
   //              'position'
   //          ])->find($request->employee_id);

   //      } elseif ($records->count()) {

   //          $employee = $records->first()->employee;

   //      }

   //      $pdf = \PDF::loadView(
   //          'reports.monthly.print',
   //          compact(
   //              'records',
   //              'employee'
   //          )
   //      );

   //      $pdf->setPaper('legal','portrait');

   //     return $pdf->stream();
   //  }

    // public function pdf(Request $request)
    // {
    //     $query = DailyAttendance::with([
    //         'employee.department',
    //         'employee.position'
    //     ]);

    //     // Employee
    //     if ($request->filled('employee_id')) {
    //         $query->where('employee_id', $request->employee_id);
    //     }

    //     // Department
    //     if ($request->filled('department_id')) {
    //         $query->whereHas('employee', function ($q) use ($request) {
    //             $q->where('department_id', $request->department_id);
    //         });
    //     }

    //     // Month
    //     if ($request->filled('month')) {

    //         $month = \Carbon\Carbon::createFromFormat(
    //             'Y-m',
    //             $request->month
    //         );

    //         $query->whereYear(
    //             'attendance_date',
    //             $month->year
    //         )->whereMonth(
    //             'attendance_date',
    //             $month->month
    //         );
    //     }

    //     // Search Employee
    //     if ($request->filled('search')) {

    //         $search = $request->search;

    //         $query->whereHas('employee', function ($q) use ($search) {

    //             $q->where('name', 'like', '%' . $search . '%')
    //               ->orWhere(
    //                   'employee_no',
    //                   'like',
    //                   '%' . $search . '%'
    //               );

    //         });
    //     }

    //     // Get records
    //     $records = $query
    //         ->orderBy('attendance_date', 'asc')
    //         ->get();

    //     // Employee information
    //     $employee = null;

    //     if ($request->filled('employee_id')) {

    //         $employee = Employee::with([
    //             'department',
    //             'position'
    //         ])->find($request->employee_id);

    //     } elseif ($records->count()) {

    //         $employee = $records->first()->employee;
    //     }

    //     // Month name for PDF
    //     $monthName = null;

    //     if ($request->filled('month')) {

    //         $monthName = \Carbon\Carbon::createFromFormat(
    //             'Y-m',
    //             $request->month
    //         )->format('F Y');
    //     }

    //     // Generate PDF
    //     $pdf = \PDF::loadView(
    //         'reports.monthly.print',
    //         compact(
    //             'records',
    //             'employee',
    //             'monthName'
    //         )
    //     );

    //     $pdf->setPaper('legal', 'portrait');

    //     return $pdf->stream('monthly-dtr-report.pdf');
    // }


    public function pdf(Request $request)
    {
        $query = DailyAttendance::with([
            'employee.department',
            'employee.position'
        ]);

        // Employee filter
        if ($request->filled('employee_id')) {
            $query->where('employee_id', $request->employee_id);
        }

        // Department filter
        if ($request->filled('department_id')) {
            $query->whereHas('employee', function ($q) use ($request) {
                $q->where('department_id', $request->department_id);
            });
        }

        // Month filter
        if ($request->filled('month')) {

            $month = \Carbon\Carbon::createFromFormat(,,
                'Y-m',
                $request->month
            );

            $query->whereYear(
                'attendance_date',
                $month->year
            )->whereMonth(
                'attendance_date',
                $month->month
            );
        }

        // Search employee
        if ($request->filled('search')) {

            $search = $request->search;

            $query->whereHas('employee', function ($q) use ($search) {

                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('employee_no', 'like', '%' . $search . '%');

            });
        }

        // Get records
        $records = $query
            ->orderBy('attendance_date', 'asc')
            ->get();

        // Employee information
        $employee = null;

        if ($request->filled('employee_id')) {

            $employee = Employee::with([
                'department',
                'position'
            ])->find($request->employee_id);

        } elseif ($records->count()) {

            $employee = $records->first()->employee;
        }

        // Generate PDF
        $pdf = \PDF::loadView(
            'reports.monthly.print',
            compact(
                'records',
                'employee'
            )
        );

        $pdf->setPaper('legal', 'portrait');

        return $pdf->stream('monthly-dtr.pdf');
    }

}