 @extends('layouts.master')

@section('content')
    <!-- MAIN -->
    <div class="main">
      <header class="topbar">
        <div>
          <div class="page-title"> Dashboard </div>
          <div class="page-subtitle"> Attendance overview and employee monitoring </div>
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
      <div class="content">
        <!-- STATISTICS -->
        <div class="row g-4">
          <div class="col-xl-3 col-md-6">
            <div class="stat-card">
              <div class="
d-flex
align-items-center
justify-content-between">
                <div>
                  <div class="stat-label"> Total Employees </div>
                  <div class="stat-number">
                    {{ $totalEmployees }}
                  </div>
                </div>
                <div class="
stat-icon
icon-blue">
                  <i class="bi bi-people-fill"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="stat-card">
              <div class="
d-flex
align-items-center
justify-content-between">
                <div>
                  <div class="stat-label"> Present Today </div>
                  <div class="stat-number">
                    {{ $presentToday }}
                  </div>
                </div>
                <div class="
stat-icon
icon-green">
                  <i class="bi bi-person-check-fill"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="stat-card">
              <div class="
d-flex
align-items-center
justify-content-between">
                <div>
                  <div class="stat-label"> Late Today </div>
                  <div class="stat-number">
                    {{ $lateToday }}
                  </div>
                </div>
                <div class="
stat-icon
icon-orange">
                  <i class="bi bi-clock-fill"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="stat-card">
              <div class="
d-flex
align-items-center
justify-content-between">
                <div>
                  <div class="stat-label"> Timed Out </div>
                  <div class="stat-number">
                    {{ $timeOutToday }}
                  </div>
                </div>
                <div class="
stat-icon
icon-red">
                  <i class="bi bi-box-arrow-right"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- CONTENT -->
        <div class="row g-4 mt-1">
          <div class="col-xl-4">
            <div class="
dashboard-card
summary-box">
              <div class="card-title"> Today's Attendance </div>
              <div class="
card-description
mb-4"> Employee attendance summary </div>
              <div class="summary-circle">
                <div class="summary-value">
                  {{ $presentToday }}
                </div>
                <div class="summary-label"> PRESENT </div>
              </div>
              <div class="mt-4 text-secondary"> Active employees: <strong>
                  {{ $totalEmployees }}
                </strong>
              </div>
            </div>
          </div>
          <div class="col-xl-8">
            <div class="dashboard-card">
              <div class="
d-flex
justify-content-between
align-items-center
mb-3">
                <div>
                  <div class="card-title"> Recent Attendance </div>
                  <div class="card-description"> Latest employee attendance records </div>
                </div>
                <a href="{{ url('/live') }}" target="_blank" class="
btn
btn-primary">
                  <i class="bi bi-display"></i> Open Live Monitor </a>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Employee</th>
                      <th>Department</th>
                      <th>Time In</th>
                      <th>Time Out</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody> @forelse( $recentAttendances as $attendance ) <tr>
                      <td>
                        <div class="
d-flex
align-items-center
gap-3">
                          <img src="{{ asset('img/default.jpeg') }}" class="employee-avatar">
                          <div>
                            <div class="employee-name">
                              {{ optional(
$attendance->employee
)->name

?? 'Unknown Employee'

}}
                            </div>
                            <div class="employee-number">
                              {{ optional(
$attendance->employee
)->employee_no

?? 'No Employee Number'

}}
                            </div>
                          </div>
                        </div>
                      </td>
                      <td>
                        {{ optional(
optional(
$attendance->employee
)->department
)->department_name

?? '-'

}}
                      </td>
                      <td> @if($attendance->time_in) {{ \Carbon\Carbon::parse(
$attendance->time_in
)->format('h:i A')

}} @else - @endif </td>
                      <td> @if($attendance->time_out) {{ \Carbon\Carbon::parse(
$attendance->time_out
)->format('h:i A')

}} @else - @endif </td>
                      <td> @if($attendance->time_out) <span class="status-out"> TIME OUT </span> @elseif($attendance->time_in) <span class="status-in"> TIME IN </span> @endif </td>
                    </tr> @empty <tr>
                      <td colspan="5" class="
text-center
py-5
text-secondary">
                        <i class="
bi
bi-calendar-x
fs-1"></i>
                        <div class="mt-2"> No attendance records found. </div>
                      </td>
                    </tr> @endforelse </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection