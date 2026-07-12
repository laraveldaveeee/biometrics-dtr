<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Records | NTC DTR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
      :root {
        --sidebar: #071426;
        --sidebar-light: #0c2443;
        --primary: #1769e8;
        --background: #f1f5f9;
        --text: #172033;
        --muted: #718096;
        --success: #16a34a;
        --danger: #dc3545;
        --warning: #f59e0b;
      }

      * {
        box-sizing: border-box;
      }

      body {
        margin: 0;
        min-height: 100vh;
        background: var(--background);
        color: var(--text);
        font-family: "Segoe UI", Arial, sans-serif;
      }

      /* SIDEBAR */
      .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 270px;
        height: 100vh;
        padding: 25px 18px;
        overflow-y: auto;
        color: white;
        background:
          linear-gradient(180deg,
            #071426,
            #0c2443);
      }

      .brand {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 5px 10px 30px;
        border-bottom:
          1px solid rgba(255, 255, 255, .10);
      }

      .brand-icon {
        width: 52px;
        height: 52px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        border-radius: 15px;
        background: var(--primary);
        font-size: 28px;
      }

      .brand-title {
        font-size: 22px;
        font-weight: 800;
      }

      .brand-subtitle {
        color: #91a4be;
        font-size: 11px;
        letter-spacing: 1px;
      }

      .menu-title {
        margin: 28px 14px 10px;
        color: #6f829d;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1.5px;
      }

      .nav-link {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 7px;
        padding: 14px 16px;
        border-radius: 13px;
        color: #b7c4d7;
        font-weight: 600;
        transition: .2s;
      }

      .nav-link i {
        width: 24px;
        font-size: 20px;
      }

      .nav-link:hover {
        color: white;
        background:
          rgba(255, 255, 255, .08);
      }

      .nav-link.active {
        color: white;
        background:
          linear-gradient(90deg,
            #1769e8,
            #3184ff);
        box-shadow:
          0 8px 25px rgba(23, 105, 232, .25);
      }

      /* MAIN */
      .main {
        margin-left: 270px;
        min-height: 100vh;
      }

      .topbar {
        min-height: 85px;
        padding: 15px 35px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: white;
        border-bottom: 1px solid #e5eaf1;
      }

      .page-title {
        font-size: 25px;
        font-weight: 800;
      }

      .page-subtitle {
        color: var(--muted);
        font-size: 14px;
      }

      .admin-icon {
        width: 43px;
        height: 43px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        color: white;
        background: var(--primary);
        font-size: 20px;
      }

      .content {
        padding: 30px 35px;
      }

      /* FILTER CARD */
      .filter-card,
      .attendance-card {
        padding: 25px;
        border-radius: 20px;
        background: white;
        box-shadow:
          0 8px 30px rgba(26, 45, 76, .07);
      }

      .filter-title {
        margin-bottom: 20px;
        font-size: 18px;
        font-weight: 800;
      }

      .form-control,
      .form-select {
        min-height: 45px;
        border-radius: 11px;
        border: 1px solid #dce3ec;
      }

      .form-control:focus,
      .form-select:focus {
        border-color: var(--primary);
        box-shadow:
          0 0 0 4px rgba(23, 105, 232, .10);
      }

      .btn-filter {
        min-height: 45px;
        padding: 0 20px;
        border: 0;
        border-radius: 11px;
        color: white;
        background: var(--primary);
        font-weight: 700;
      }

      .btn-reset {
        min-height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 11px;
        font-weight: 700;
      }

      /* TABLE */
      .attendance-card {
        margin-top: 25px;
      }

      .card-title {
        font-size: 21px;
        font-weight: 800;
      }

      .card-description {
        color: var(--muted);
        font-size: 13px;
      }

      .table {
        margin-top: 20px;
        vertical-align: middle;
      }

      .table thead th {
        padding: 16px 14px;
        color: #718096;
        border-bottom: 1px solid #e7ebf1;
        font-size: 11px;
        white-space: nowrap;
        text-transform: uppercase;
        letter-spacing: .5px;
      }

      .table tbody td {
        padding: 17px 14px;
        border-color: #edf0f4;
      }

      .employee-photo {
        width: 48px;
        height: 48px;
        flex-shrink: 0;
        border-radius: 50%;
        object-fit: cover;
        background: #e9eef5;
      }

      .employee-name {
        font-weight: 800;
      }

      .employee-number {
        color: #8793a4;
        font-size: 12px;
      }

      .department-badge {
        display: inline-block;
        padding: 7px 12px;
        border-radius: 20px;
        color: #1769e8;
        background: #e8f1ff;
        font-size: 11px;
        font-weight: 800;
      }

      .time-in {
        color: #159447;
        font-weight: 800;
      }

      .time-out {
        color: #dc3545;
        font-weight: 800;
      }

      .no-time {
        color: #9aa5b4;
      }

      .status-in {
        display: inline-block;
        padding: 7px 13px;
        border-radius: 20px;
        color: #159447;
        background: #e6f7ec;
        font-size: 11px;
        font-weight: 800;
      }

      .status-out {
        display: inline-block;
        padding: 7px 13px;
        border-radius: 20px;
        color: #dc3545;
        background: #ffe9eb;
        font-size: 11px;
        font-weight: 800;
      }

      .status-absent {
        display: inline-block;
        padding: 7px 13px;
        border-radius: 20px;
        color: #718096;
        background: #edf1f5;
        font-size: 11px;
        font-weight: 800;
      }

      .date-day {
        font-weight: 800;
      }

      .date-year {
        color: #8793a4;
        font-size: 12px;
      }

      /* PAGINATION */
      .pagination {
        margin-bottom: 0;
      }

      .page-link {
        color: var(--primary);
      }

      .page-item.active .page-link {
        border-color: var(--primary);
        background: var(--primary);
      }

      /* RESPONSIVE */
      @media(max-width:992px) {
        .sidebar {
          width: 85px;
        }

        .brand-title,
        .brand-subtitle,
        .menu-title,
        .nav-link span {
          display: none;
        }

        .main {
          margin-left: 85px;
        }
      }

      @media(max-width:768px) {
        .sidebar {
          position: relative;
          width: 100%;
          height: auto;
        }

        .main {
          margin-left: 0;
        }

        .content {
          padding: 20px 15px;
        }

        .topbar {
          padding: 15px;
        }
      }
    </style>
  </head>
  <body>
    <!-- SIDEBAR -->
   @include ('layouts.sidebar')
    <!-- MAIN -->
    <div class="main">
      <header class="topbar">
        <div>
          <div class="page-title">  <i class="bi bi-calendar text-primary"></i> Attendance Records </div>
          <div class="page-subtitle"> View and filter employee daily attendance </div>
        </div>
        <div class="d-flex align-items-center gap-3">
          <div class="text-end">
            <div class="fw-bold"> Administrator </div>
            <div class="small text-secondary"> System Admin </div>
          </div>
          <div class="admin-icon">
            <i class="bi bi-person-fill"></i>
          </div>
        </div>
      </header>
      <div class="content">
        <!-- FILTER -->
        <div class="filter-card">
          <div class="filter-title">
            <i class="bi bi-funnel-fill text-primary"></i> Filter Attendance
          </div>
          <form method="GET" action="{{ route('attendance.index') }}">
            <div class="row g-3">
              <div class="col-xl-3 col-md-6">
                <label class="form-label fw-bold"> Search Employee </label>
                <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Name or employee number">
              </div>
              <div class="col-xl-2 col-md-6">
                <label class="form-label fw-bold"> Attendance Date </label>
                <input type="date" name="date" class="form-control" value="{{ request('date') }}">
              </div>
              <div class="col-xl-2 col-md-6">
                <label class="form-label fw-bold"> Department </label>
                <select name="department_id" class="form-select">
                  <option value=""> All Departments </option> @foreach($departments as $department) <option value="{{ $department->id }}" {{ request('department_id') == $department->id ? 'selected' : '' }}>
                    {{ $department->department_name }}
                  </option> @endforeach
                </select>
              </div>
              <div class="col-xl-2 col-md-6">
                <label class="form-label fw-bold"> Status </label>
                <select name="status" class="form-select">
                  <option value=""> All Status </option>
                  <option value="time_in" {{

request('status')

== 'time_in'

? 'selected'

: ''

}}> Timed In </option>
                  <option value="time_out" {{

request('status')

== 'time_out'

? 'selected'

: ''

}}> Timed Out </option>
                </select>
              </div>
              <div class="col-xl-3
d-flex
align-items-end
gap-2">
                <button type="submit" class="btn-filter flex-fill">
                  <i class="bi bi-search"></i> Apply Filter </button>
                <a href="{{ route('attendance.index') }}" class="btn btn-light btn-reset">
                  <i class="bi bi-arrow-counterclockwise"></i>
                </a>
              </div>
            </div>
          </form>
        </div>
        <!-- ATTENDANCE TABLE -->
        <div class="attendance-card">
          <div class="d-flex
justify-content-between
align-items-center
flex-wrap
gap-3">
            <div>
              <div class="card-title">
                <i class="bi bi-calendar-check text-primary"></i> Daily Attendance
              </div>
              <div class="card-description"> Showing {{ $attendances->total() }} attendance record(s) </div>
            </div>
            <div class="text-secondary">
              <i class="bi bi-calendar3"></i>
              {{ now()->format('F d, Y') }}
            </div>
          </div>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Employee</th>
                  <th>Department</th>
                  <th>Date</th>
                  <th>Time In</th>
                  <th>Time Out</th>
                  <th>Late</th>
                  <th>Undertime</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody> @forelse($attendances as $attendance) <tr>
                  <td>
                    <div class="d-flex align-items-center gap-3">
                      <img src="{{

$attendance->employee
&& $attendance->employee->photo

? asset(
'storage/'
. $attendance->employee->photo
)

: asset(
'images/default.png'
)

}}" class="employee-photo" alt="Employee">
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
                    <span class="department-badge">
                      {{ optional(
optional(
$attendance->employee
)->department
)->department_name

?? '-'

}}
                    </span>
                  </td>
                  <td>
                    <div class="date-day">
                      {{ \Carbon\Carbon::parse(
$attendance->attendance_date
)->format('M d')

}}
                    </div>
                    <div class="date-year">
                      {{ \Carbon\Carbon::parse(
$attendance->attendance_date
)->format('Y')

}}
                    </div>
                  </td>
                  <td> @if($attendance->time_in) <span class="time-in">
                      <i class="bi bi-box-arrow-in-right"></i>
                      {{ \Carbon\Carbon::parse(
$attendance->time_in
)->format('h:i:s A')

}}
                    </span> @else <span class="no-time"> -- </span> @endif </td>
                  <td> @if($attendance->time_out) <span class="time-out">
                      <i class="bi bi-box-arrow-right"></i>
                      {{ \Carbon\Carbon::parse(
$attendance->time_out
)->format('h:i:s A')

}}
                    </span> @else <span class="no-time"> -- </span> @endif </td>
                  <td>
                    {{ $attendance->late_minutes

?? 0

}} min
                  </td>
                  <td>
                    {{ $attendance->undertime_minutes

?? 0

}} min
                  </td>
                  <td> @if( $attendance->time_out ) <span class="status-out">
                      <i class="bi bi-check-circle-fill"></i> TIMED OUT </span> @elseif( $attendance->time_in ) <span class="status-in">
                      <i class="bi bi-check-circle-fill"></i> TIMED IN </span> @else <span class="status-absent"> NO RECORD </span> @endif </td>
                </tr> @empty <tr>
                  <td colspan="8" class="text-center py-5">
                    <i class="
bi
bi-calendar-x
fs-1
text-secondary"></i>
                    <div class="fw-bold mt-3"> No attendance records found </div>
                    <div class="small text-secondary"> Try changing the attendance filters. </div>
                  </td>
                </tr> @endforelse </tbody>
            </table>
          </div>
          <div class="d-flex
justify-content-between
align-items-center
flex-wrap
gap-3
mt-3">
            <div class="small text-secondary"> @if($attendances->total() > 0) Showing {{ $attendances->firstItem() }} to {{ $attendances->lastItem() }} of {{ $attendances->total() }} records @endif </div>
            <div>
              {{ $attendances->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>