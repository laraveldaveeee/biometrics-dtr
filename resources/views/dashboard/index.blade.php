<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTC DTR Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
      :root {
        --sidebar: #071426;
        --sidebar-light: #102746;
        --primary: #1769e8;
        --background: #f1f5f9;
        --text: #172033;
        --muted: #718096;
      }

      * {
        box-sizing: border-box;
      }

      body {
        margin: 0;
        min-height: 100vh;
        background: var(--background);
        font-family: "Segoe UI", Arial, sans-serif;
        color: var(--text);
      }

      /* SIDEBAR */
      .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 270px;
        height: 100vh;
        padding: 25px 18px;
        color: white;
        background:
          linear-gradient(180deg,
            #071426,
            #0c2443);
        z-index: 1000;
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
        border-radius: 15px;
        color: white;
        font-size: 28px;
        background: #1769e8;
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
        margin:
          28px 14px 10px;
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
        transition: .25s;
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
          0 8px 25px rgba(23, 105, 232, .35);
      }

      /* MAIN */
      .main {
        margin-left: 270px;
        min-height: 100vh;
      }

      /* TOPBAR */
      .topbar {
        height: 85px;
        padding: 0 35px;
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

      .admin-avatar {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        color: white;
        font-size: 20px;
        background: #1769e8;
      }

      .content {
        padding: 30px 35px;
      }

      /* STAT CARDS */
      .stat-card {
        height: 150px;
        padding: 24px;
        border: 0;
        border-radius: 20px;
        background: white;
        box-shadow:
          0 8px 30px rgba(26, 45, 76, .07);
        transition: .25s;
      }

      .stat-card:hover {
        transform:
          translateY(-4px);
      }

      .stat-icon {
        width: 58px;
        height: 58px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 17px;
        font-size: 27px;
      }

      .icon-blue {
        color: #1769e8;
        background: #e8f1ff;
      }

      .icon-green {
        color: #16a34a;
        background: #e8f8ed;
      }

      .icon-orange {
        color: #e88b10;
        background: #fff3df;
      }

      .icon-red {
        color: #dc3545;
        background: #ffe9eb;
      }

      .stat-label {
        color: #718096;
        font-size: 14px;
        font-weight: 600;
      }

      .stat-number {
        margin-top: 4px;
        font-size: 35px;
        font-weight: 800;
      }

      /* PANELS */
      .dashboard-card {
        padding: 25px;
        border-radius: 20px;
        background: white;
        box-shadow:
          0 8px 30px rgba(26, 45, 76, .07);
      }

      .card-title {
        font-size: 20px;
        font-weight: 800;
      }

      .card-description {
        color: #718096;
        font-size: 13px;
      }

      /* ATTENDANCE SUMMARY */
      .summary-box {
        min-height: 320px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
      }

      .summary-circle {
        width: 190px;
        height: 190px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        border-radius: 50%;
        background:
          conic-gradient(#1769e8 0 70%,
            #e9eef5 70% 100%);
        position: relative;
      }

      .summary-circle::before {
        content: "";
        position: absolute;
        width: 145px;
        height: 145px;
        border-radius: 50%;
        background: white;
      }

      .summary-value {
        position: relative;
        font-size: 39px;
        font-weight: 900;
      }

      .summary-label {
        position: relative;
        color: #718096;
        font-size: 12px;
      }

      /* TABLE */
      .table {
        vertical-align: middle;
      }

      .table thead th {
        padding: 15px;
        color: #718096;
        border-bottom:
          1px solid #e9edf3;
        font-size: 12px;
        text-transform: uppercase;
      }

      .table tbody td {
        padding: 16px 15px;
        border-color: #edf0f4;
      }

      .employee-avatar {
        width: 45px;
        height: 45px;
        object-fit: cover;
        border-radius: 50%;
      }

      .employee-name {
        font-weight: 700;
      }

      .employee-number {
        color: #8a98aa;
        font-size: 12px;
      }

      .status-in {
        padding: 7px 13px;
        color: #159447;
        border-radius: 20px;
        background: #e6f7ec;
        font-size: 11px;
        font-weight: 800;
      }

      .status-out {
        padding: 7px 13px;
        color: #d93b47;
        border-radius: 20px;
        background: #ffe9eb;
        font-size: 11px;
        font-weight: 800;
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
    </style>
  </head>
  <body>
    <!-- SIDEBAR -->
    @include ('layouts.sidebar')
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
  </body>
</html>