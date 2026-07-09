<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Department;
use App\Position;
use Illuminate\Http\Request;
class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with([
            'department',
            'position'
        ])
        ->latest()
        ->paginate(10);

        return view(
            'employees.index',
            compact('employees')
        );
    }


    // ADD EMPLOYEE PAGE
    public function create()
    {
        $departments = Department::orderBy('department_name')
        ->get();

        $positions = Position::all();

        return view('employees.create', compact(
            'departments',
            'positions'
        ));
    }

      // SAVE EMPLOYEE
    public function store(Request $request)
    {
        $request->validate([

            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'biometric_userid' => [
                'required',
                'string',
                'max:255',
                'unique:employees,biometric_userid'
            ],

            'biometric_uid' => [
                'nullable',
                'integer'
            ],

            'employee_no' => [
                'nullable',
                'string',
                'max:255',
                'unique:employees,employee_no'
            ],

            'department_id' => [
                'nullable',
                'exists:departments,id'
            ],

            'position_id' => [
                'nullable',
                'exists:positions,id'
            ],

            'contact_no' => [
                'nullable',
                'string',
                'max:30'
            ],

            'address' => [
                'nullable',
                'string'
            ],

            'photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048'
            ]

        ]);


        $employee = new Employee();

        $employee->name = $request->name;

        $employee->biometric_userid = $request->biometric_userid;

        $employee->biometric_uid = $request->biometric_uid;

        $employee->employee_no = $request->employee_no;

        $employee->department_id = $request->department_id;

        $employee->position_id = $request->position_id;

        $employee->contact_no = $request->contact_no;

        $employee->address = $request->address;

        $employee->status = $request->has('status');

        // PHOTO UPLOAD
        if ($request->hasFile('photo')) {

            $employee->photo =
                $request->file('photo')
                        ->store('employees', 
                                'public'
                            );
        }


        $employee->save();


        return redirect()->route('employees.index')->with(
                'success',
                'Employee added successfully!'
            );
    }


    // EDIT EMPLOYEE PAGE
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);

        $departments = Department::orderBy('department_name')
            ->get();

        // Kung wala ka pang positions, collect([]) muna
        $positions = Position::orderBy('position_name')
            ->get();

        return view('employees.edit', compact(
            'employee',
            'departments',
            'positions'
        ));
    }

    
    // UPDATE EMPLOYEE
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $request->validate([

            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'biometric_userid' => [
                'required',
                'string',
                'max:255',
                'unique:employees,biometric_userid,' . $employee->id
            ],

            'biometric_uid' => [
                'nullable',
                'integer'
            ],

            'employee_no' => [
                'nullable',
                'string',
                'max:255',
                'unique:employees,employee_no,' . $employee->id
            ],

            'department_id' => [
                'nullable',
                'exists:departments,id'
            ],

            'position_id' => [
                'nullable',
                'exists:positions,id'
            ],

            'contact_no' => [
                'nullable',
                'string',
                'max:30'
            ],

            'address' => [
                'nullable',
                'string'
            ],

            'photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048'
            ]

        ]);


        $employee->name = $request->name;

        $employee->employee_no =
            $request->employee_no;

        $employee->biometric_userid =
            $request->biometric_userid;

        $employee->biometric_uid =
            $request->biometric_uid;

        $employee->department_id =
            $request->department_id;

        $employee->position_id =
            $request->position_id;

        $employee->contact_no =
            $request->contact_no;

        $employee->address =
            $request->address;

        $employee->status =
            $request->has('status');


        // KAPAG MAY BAGONG PHOTO
        if ($request->hasFile('photo')) {

            // Burahin ang lumang uploaded photo
            if (
                $employee->photo &&
                \Storage::disk('public')
                    ->exists($employee->photo)
            ) {

                \Storage::disk('public')
                    ->delete($employee->photo);
            }


            // Save bagong photo
            $employee->photo =
                $request
                    ->file('photo')
                    ->store(
                        'employees',
                        'public'
                    );
        }


        $employee->save();


        return redirect()
            ->route('employees.index')
            ->with(
                'success',
                'Employee updated successfully!'
            );
    }

}

 