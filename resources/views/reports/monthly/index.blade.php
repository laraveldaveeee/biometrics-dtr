@extends('layouts.master')

@section('content')
<!-- MAIN -->
    <div class="main">

         <header class="topbar">
        <div>
          <div class="page-title">    
      
                <i class="bi bi-calendar3 text-primary"></i>
       Monthly DTR Report
        </div>
          <div class="page-subtitle">View and Generate Daily Attendance Reports </div>
        </div>
        <div class="d-flex align-items-center gap-3">
          <div class="text-end">
            <div class="fw-bold"> Administrator </div>
            <div class="small text-secondary"> System Admin </div>
          </div>
          <div class="admin-avatar">
            <i class="bi bi-person-fill"></i>
          </div>
        </div>
      </header>

<div class="container-fluid">

    <!-- PAGE HEADER -->

    <div class="d-flex justify-content-between align-items-center mb-4">
    <div>

        </div>

        <div>

        </div>

    </div>


    <!-- SUMMARY CARDS -->

    <div class="row mb-4">

        <div class="col-lg-3">

            <div class="card border-0 shadow rounded-4">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">

                                Total Records

                            </small>

                            <h2 class="fw-bold mt-2">

                                {{ $records->total() }}

                            </h2>

                        </div>

                        <i class="bi bi-folder2-open text-primary display-5"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="card border-0 shadow rounded-4">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">

                                Employees

                            </small>

                            <h2 class="fw-bold mt-2">

                                {{ $employees->count() }}

                            </h2>

                        </div>

                        <i class="bi bi-people-fill text-success display-5"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="card border-0 shadow rounded-4">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">

                                Departments

                            </small>

                            <h2 class="fw-bold mt-2">

                                {{ $departments->count() }}

                            </h2>

                        </div>

                        <i class="bi bi-building text-warning display-5"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="card border-0 shadow rounded-4">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">

                                Generated

                            </small>

                            <h6 class="fw-bold mt-3">

                                {{ now()->format('F d, Y') }}

                            </h6>

                        </div>

                        <i class="bi bi-calendar-check text-danger display-5"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- FILTER CARD -->
    <div class="mb-4">
       <a
            href="{{ route('reports.monthly.print', request()->query()) }}"
            target="_blank"
            class="btn btn-outline-primary me-2">

            <i class="bi bi-printer"></i>

            Print

            </a>

          <a
            href="{{ route('reports.monthly.pdf', request()->query()) }}"
            class="btn btn-danger" target="_blank">

            <i class="bi bi-file-earmark-pdf"></i>

            PDF

        </a>

            <button class="btn btn-success">

                <i class="bi bi-file-earmark-excel"></i>

                Excel

            </button>
        </div>

    <div class="card border-0 shadow rounded-4 mb-4">


        <div class="card-body">

            <form method="GET">

                <div class="row">

                    <div class="col-md-3">

                        <label class="form-label">

                            Employee

                        </label>

                        <select
                            name="employee_id"
                            class="form-select">

                            <option value="">

                                All Employees

                            </option>

                            @foreach($employees as $employee)

                                <option
                                    value="{{ $employee->id }}"
                                    {{ request('employee_id')==$employee->id ? 'selected':'' }}>

                                    {{ $employee->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-3">

                        <label class="form-label">

                            Department

                        </label>

                        <select
                            name="department_id"
                            class="form-select">

                            <option value="">

                                All Departments

                            </option>

                            @foreach($departments as $department)

                                <option
                                    value="{{ $department->id }}"
                                    {{ request('department_id')==$department->id ? 'selected':'' }}>

                                    {{ $department->department_name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-3">

                        <label class="form-label">

                            Month

                        </label>

                        <input
                            type="month"
                            name="month"
                            value="{{ request('month') }}"
                            class="form-control">

                    </div>

                    <div class="col-md-3">

                        <label class="form-label">

                            Search Employee

                        </label>

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Search employee..."
                            class="form-control">

                    </div>

                </div>

                <div class="mt-4">

                    <button class="btn btn-primary">

                        <i class="bi bi-search"></i>

                        Generate Report

                    </button>

                    <a
                        href="{{ route('reports.monthly') }}"
                        class="btn btn-secondary">

                        Reset

                    </a>

                </div>

            </form>

        </div>

    </div>

        <!-- MONTHLY DTR TABLE -->

    <div class="card border-0 shadow rounded-4">

        <div class="card-header bg-white border-0 py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h5 class="fw-bold mb-1">

                        <i class="bi bi-table text-primary"></i>

                        Monthly Attendance Records

                    </h5>

                    <small class="text-muted">

                        Showing {{ $records->total() }} record(s)

                    </small>

                </div>

            </div>

        </div>

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th width="70">Photo</th>

                        <th>Employee</th>

                        <th>Department</th>

                        <th>Position</th>

                        <th>Date</th>

                        <th>Day</th>

                        <th>Time In</th>

                        <th>Time Out</th>

                        <th>Status</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($records as $record)

                    <tr>

                        <td>

                            @if($record->employee && $record->employee->photo)

                                <img
                                    src="{{ asset('storage/'.$record->employee->photo) }}"
                                    class="rounded-circle"
                                    width="45"
                                    height="45"
                                    style="object-fit:cover;">

                            @else

                                <img
                                    src="{{ asset('images/default.png') }}"
                                    class="rounded-circle"
                                    width="45"
                                    height="45">

                            @endif

                        </td>

                        <td>

                            <div class="fw-bold">

                                {{ optional($record->employee)->name }}

                            </div>

                            <small class="text-muted">

                                {{ optional($record->employee)->employee_no }}

                            </small>

                        </td>

                        <td>

                            {{ optional(optional($record->employee)->department)->department_name ?? '-' }}

                        </td>

                        <td>

                            {{ optional(optional($record->employee)->position)->position_name ?? '-' }}

                        </td>

                        <td>

                            {{ \Carbon\Carbon::parse($record->attendance_date)->format('M d, Y') }}

                        </td>

                        <td>

                            {{ \Carbon\Carbon::parse($record->attendance_date)->format('l') }}

                        </td>

                        <td>

                            @if($record->time_in)

                                <span class="badge bg-success">

                                    {{ \Carbon\Carbon::parse($record->time_in)->format('h:i A') }}

                                </span>

                            @else

                                -

                            @endif

                        </td>

                        <td>

                            @if($record->time_out)

                                <span class="badge bg-danger">

                                    {{ \Carbon\Carbon::parse($record->time_out)->format('h:i A') }}

                                </span>

                            @else

                                -

                            @endif

                        </td>

                        <td>

                            @if($record->time_out)

                                <span class="badge bg-primary">

                                    COMPLETED

                                </span>

                            @else

                                <span class="badge bg-warning text-dark">

                                    TIME IN ONLY

                                </span>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="9">

                            <div class="text-center py-5">

                                <i class="bi bi-calendar-x display-3 text-secondary"></i>

                                <h5 class="mt-3">

                                    No Monthly Attendance Found

                                </h5>

                                <p class="text-muted">

                                    Select an employee and month to generate a report.

                                </p>

                            </div>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="card-footer bg-white">

            {{ $records->appends(request()->query())->links() }}

        </div>

    </div>

</div>
 

    @endsection