<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    // DEPARTMENT LIST
    public function index()
    {
        $departments = Department::withCount('employees')
            ->latest()
            ->paginate(10);

        return view(
            'departments.index',
            compact('departments')
        );
    }


    // ADD DEPARTMENT PAGE
    public function create()
    {
        return view('departments.create');
    }


    // SAVE DEPARTMENT
    public function store(Request $request)
    {
        $request->validate([
            'department_name' => [
                'required',
                'string',
                'max:255',
                'unique:departments,department_name'
            ]
        ]);

        $department = new Department();

        $department->department_name =
            $request->department_name;

        $department->status =
            $request->has('status');

        $department->save();


        return redirect()
            ->route('departments.index')
            ->with(
                'success',
                'Department added successfully!'
            );
    }


    // EDIT DEPARTMENT PAGE
    public function edit($id)
    {
        $department =
            Department::findOrFail($id);

        return view(
            'departments.edit',
            compact('department')
        );
    }


    // UPDATE DEPARTMENT
    public function update(
        Request $request,
        $id
    ) {
        $department =
            Department::findOrFail($id);

        $request->validate([
            'department_name' => [
                'required',
                'string',
                'max:255',
                'unique:departments,department_name,'
                . $department->id
            ]
        ]);

        $department->department_name =
            $request->department_name;

        $department->status =
            $request->has('status');

        $department->save();


        return redirect()
            ->route('departments.index')
            ->with(
                'success',
                'Department updated successfully!'
            );
    }


    // DELETE DEPARTMENT
    public function destroy($id)
    {
        $department =
            Department::findOrFail($id);


        // Huwag burahin kapag may employee
        if (
            $department
            ->employees()
            ->exists()
        ) {

            return redirect()
                ->route(
                    'departments.index'
                )
                ->with(
                    'error',
                    'Cannot delete this department because it has assigned employees.'
                );
        }


        $department->delete();


        return redirect()
            ->route('departments.index')
            ->with(
                'success',
                'Department deleted successfully!'
            );
    }
}