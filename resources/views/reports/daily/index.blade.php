@extends('layouts.master')
@section('content')
  <!-- MAIN -->
    <div class="main">
      <header class="topbar">
        <div>
          <div class="page-title">    
         <i class="bi bi-file-earmark-bar-graph-fill text-primary"></i>
         Daily Attendance Report
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
<div class="d-flex justify-content-between align-items-center mb-4">  
  
</div>
<!-- SUMMARY CARDS -->
<div class="row mb-4">
   <div class="col-lg-3">
      <div class="card border-0 shadow-sm rounded-4">
         <div class="card-body">
            <div class="d-flex justify-content-between">
               <div>
                  <small class="text-muted">
                  Total Employees
                  </small>
                  <h2 class="fw-bold mt-2">
                     {{ $totalEmployees }}
                  </h2>
               </div>
               <div class="text-primary">
                  <i class="bi bi-people-fill fs-1"></i>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-lg-3">
      <div class="card border-0 shadow-sm rounded-4">
         <div class="card-body">
            <div class="d-flex justify-content-between">
               <div>
                  <small class="text-muted">
                  Present Today
                  </small>
                  <h2 class="fw-bold text-success mt-2">
                     {{ $presentToday }}
                  </h2>
               </div>
               <div class="text-success">
                  <i class="bi bi-check-circle-fill fs-1"></i>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-lg-3">
      <div class="card border-0 shadow-sm rounded-4">
         <div class="card-body">
            <div class="d-flex justify-content-between">
               <div>
                  <small class="text-muted">
                  Absent Today
                  </small>
                  <h2 class="fw-bold text-danger mt-2">
                     {{ $absentToday }}
                  </h2>
               </div>
               <div class="text-danger">
                  <i class="bi bi-person-x-fill fs-1"></i>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-lg-3">
      <div class="card border-0 shadow-sm rounded-4">
         <div class="card-body">
            <div class="d-flex justify-content-between">
               <div>
                  <small class="text-muted">
                  Report Date
                  </small>
                  <h5 class="fw-bold mt-3">
                     {{ request('attendance_date') ?? date('F d, Y') }}
                  </h5>
               </div>
               <div class="text-warning">
                  <i class="bi bi-calendar-date-fill fs-1"></i>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- FILTER -->
 <div class="mb-4">
      <button class="btn btn-outline-primary me-2">
      <i class="bi bi-printer"></i>
      Print
      </button>
      <button class="btn btn-danger me-2">
      <i class="bi bi-file-earmark-pdf"></i>
      PDF
      </button>
      <button class="btn btn-success">
      <i class="bi bi-file-earmark-excel"></i>
      Excel
      </button>
   </div>

<div class="card border-0 shadow-sm rounded-4 mb-4">
   <div class="card-body">
      <form method="GET">
         <div class="row">
            <div class="col-md-3">
               <label class="form-label">
               Attendance Date
               </label>
               <input
                  type="date"
                  name="attendance_date"
                  value="{{ request('attendance_date') }}"
                  class="form-control">
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
               Search
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
            <a href="{{ route('reports.daily') }}"
               class="btn btn-secondary">
            Reset
            </a>
         </div>
      </form>
   </div>
</div>

<!-- ATTENDANCE TABLE -->

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-header bg-white border-0 py-3">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h5 class="fw-bold mb-1">
                    <i class="bi bi-table text-primary"></i>
                    Daily Attendance
                </h5>

                <small class="text-muted">
                    Showing {{ $attendances->total() }} attendance record(s)
                </small>

            </div>

        </div>

    </div>

    <div class="table-responsive">

        <table class="table align-middle mb-0">

            <thead class="table-light">

                <tr>

                    <th width="70">Photo</th>

                    <th>Employee</th>

                    <th>Department</th>

                    <th>Position</th>

                    <th width="120">Date</th>

                    <th width="110">Time In</th>

                    <th width="110">Time Out</th>

                    <th width="130">Status</th>

                </tr>

            </thead>

            <tbody>

            @forelse($attendances as $attendance)

                <tr>

                    <td>

                        @if($attendance->employee->photo)

                            <img
                                src="{{ asset('storage/'.$attendance->employee->photo) }}"
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

                            {{ $attendance->employee->name }}

                        </div>

                        <small class="text-muted">

                            {{ $attendance->employee->employee_no }}

                        </small>

                    </td>

                    <td>

                        {{ optional($attendance->employee->department)->department_name ?? '-' }}

                    </td>

                    <td>

                        {{ optional($attendance->employee->position)->position_name ?? '-' }}

                    </td>

                    <td>

                        {{ \Carbon\Carbon::parse($attendance->attendance_date)->format('M d, Y') }}

                    </td>

                    <td>

                        @if($attendance->time_in)

                            <span class="badge bg-success">

                                {{ \Carbon\Carbon::parse($attendance->time_in)->format('h:i A') }}

                            </span>

                        @else

                            -

                        @endif

                    </td>

                    <td>

                        @if($attendance->time_out)

                            <span class="badge bg-danger">

                                {{ \Carbon\Carbon::parse($attendance->time_out)->format('h:i A') }}

                            </span>

                        @else

                            -

                        @endif

                    </td>

                    <td>

                        @if($attendance->time_out)

                            <span class="badge bg-primary">

                                COMPLETED

                            </span>

                        @else

                            <span class="badge bg-warning text-dark">

                                TIME IN

                            </span>

                        @endif

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="8">

                        <div class="text-center py-5">

                            <i class="bi bi-calendar-x display-3 text-secondary"></i>

                            <h5 class="mt-3">

                                No attendance records found

                            </h5>

                            <p class="text-muted">

                                Try changing the filters or select another date.

                            </p>

                        </div>

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <div class="card-footer bg-white">

        {{ $attendances->appends(request()->query())->links() }}

    </div>

</div>

</div>

@endsection