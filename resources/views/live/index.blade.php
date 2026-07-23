<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTC Live Attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/live.css') }}" rel="stylesheet">
  </head>
  <body>
    <!-- ==================================================
HEADER
================================================== -->
    <header class="header">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-md-7 col-7">
            <div class="d-flex align-items-center gap-3">
              <div class="logo-box">
                <i class="bi bi-fingerprint"></i>
              </div>
              <div>
                <div>
                  <div class="agency-name"> NATIONAL TELECOMMUNICATIONS COMMISSION </div>
                  <div class="system-name">
                    <span>ATTENDANCE</span> SYSTEM
                  </div>
                  <div class="subtitle"> BIOMETRIC LIVE MONITORING </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5 col-5">
            <div class="d-flex

align-items-center

justify-content-end">
              <button type="button" class="theme-toggle" id="themeToggle" onclick="toggleTheme()" title="Switch light or dark theme">
                <i class="bi bi-sun-fill" id="themeIcon"></i>
              </button>
              <div class="text-end">
                <div class="clock" id="clock"> --:--:-- </div>
                <div class="date" id="date"> Loading... </div>
                <div class="online mt-1">
                  <span class="online-dot"></span> LIVE MONITORING
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- ==================================================
MAIN
================================================== -->
    <main class="main">
      <div class="row g-4 main-row">
        <!-- ==================================================
EMPLOYEE PROFILE
================================================== -->
        <div class="col-xl-5">
          <div class="panel profile-panel" id="profilePanel">
            <div class="live-label">
              <i class="bi bi-broadcast"></i> LIVE
            </div>
            <div class="photo-wrapper">
              <img id="employee_photo" src="{{ asset('img/default.jpeg') }}" class="employee-photo" alt="Employee Photo">
              <div class="scan-line"></div>
            </div>
            <div class="employee-name" id="employee_name"> @if( $attendance ) {{ optional(

$attendance->employee

)->name

?? 'UNKNOWN EMPLOYEE'

}} @else WAITING FOR SCAN @endif </div>
            <div class="employee-position" id="employee_position"> @if( $attendance && $attendance->employee && $attendance->employee->position ) {{ $attendance

->employee

->position

->position_name

}} @else Place your finger on the biometric device @endif </div>
            <div class="row g-3 employee-info">
              <div class="col-6">
                <div class="info-box">
                  <div class="info-icon">
                    <i class="bi bi-person-vcard"></i>
                  </div>
                  <div class="info-label"> Employee Number </div>
                  <div class="info-value" id="employee_no"> @if( $attendance && $attendance->employee ) {{ $attendance

->employee

->employee_no

??

'------'

}} @else ------ @endif </div>
                </div>
              </div>
              <div class="col-6">
                <div class="info-box">
                  <div class="info-icon">
                    <i class="bi bi-building"></i>
                  </div>
                  <div class="info-label"> Department </div>
                  <div class="info-value" id="department"> @if( $attendance && $attendance->employee ) {{ optional(

$attendance

->employee

->department

)

->department_name

??

'------'

}} @else ------ @endif </div>
                </div>
              </div>
            </div>
            <div class="status-box" id="statusBox">
              <div class="status-text" id="status"> @if( $attendance ) @if( $attendance->time_out ) <i class="bi bi-box-arrow-right"></i> TIME OUT RECORDED @else <i class="bi bi-check-circle-fill"></i> TIME IN RECORDED @endif @else <i class="bi bi-fingerprint"></i> READY TO SCAN @endif </div>
              <div class="attendance-time" id="attendance_time"> @if( $attendance ) @if( $attendance->time_out ) {{ \Carbon\Carbon

::parse(

$attendance->time_out

)

->format(

'h:i:s A'

)

}} @elseif( $attendance->time_in ) {{ \Carbon\Carbon

::parse(

$attendance->time_in

)

->format(

'h:i:s A'

)

}} @else --:--:-- @endif @else --:--:-- @endif </div>
            </div>
          </div>
        </div>
        <!-- ==================================================
RECENT ATTENDANCE
================================================== -->
        <div class="col-xl-7">
          <div class="panel attendance-panel">
            <div class="d-flex

justify-content-between

align-items-center">
              <div>
                <div class="section-title">
                  <i class="bi bi-clock-history"></i> Recent Attendance
                </div>
                <div class="section-subtitle"> Latest biometric transactions </div>
              </div>
              <div class="refresh-status">
                <i class="bi bi-arrow-repeat"></i> Auto Updating
              </div>
            </div>
            <div class="table-wrapper">
              <table class="table">
                <thead>
                  <tr>
                    <th> Employee </th>
                    <th> Department </th>
                    <th> Time </th>
                    <th> Status </th>
                  </tr>
                </thead>
                <tbody id="recentAttendance">
                  <tr>
                    <td colspan="4" class="text-center py-5"> Waiting for attendance... </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>

<script>

/* ==================================================
CLOCK
================================================== */
function updateClock() {
  let now = new Date();
  document.getElementById("clock")
    .innerHTML = now
    .toLocaleTimeString();
  document.getElementById("date")
    .innerHTML = now
    .toLocaleDateString('en-US', {
      weekday: 'long',
      month: 'long',
      day: 'numeric',
      year: 'numeric'
    });
}
updateClock();
setInterval(updateClock, 1000);
/* ==================================================
LIGHT AND DARK THEME
================================================== */
function applyTheme(theme) {
  let body = document.body;
  let icon = document.getElementById(
    "themeIcon");
  if (theme === "light") {
    body.classList.add(
      "light-theme");
    icon.className =
      "bi bi-moon-stars-fill";
  } else {
    body.classList.remove(
      "light-theme");
    icon.className =
      "bi bi-sun-fill";
  }
}

function toggleTheme() {
  let currentTheme = document.body
    .classList.contains(
      "light-theme") ? "light" :
    "dark";
  let newTheme = currentTheme ===
    "dark" ? "light" : "dark";
  localStorage.setItem("ntc-theme",
    newTheme);
  applyTheme(newTheme);
}
let savedTheme = localStorage.getItem(
  "ntc-theme") || "dark";
applyTheme(savedTheme);
/* ==================================================
LIVE ATTENDANCE
================================================== */
let previousUpdate = null;
let loading = false;

function formatTime(dateTime) {
  if (!dateTime) {
    return "--:--:--";
  }
  let date = new Date(dateTime
    .replace(" ", "T"));
  return date.toLocaleTimeString(
    [], {
      hour: '2-digit',
      minute: '2-digit',
      second: '2-digit'
    });
}

function loadAttendance() {
  if (loading) {
    return;
  }
  loading = true;
  /*

  TEMPORARY BIOMETRIC SYNC

  Kapag may Laravel Scheduler

  na tayo, aalisin natin

  ang /sync-attendance dito.

  */
  fetch('/sync-attendance').then(
    response => {
      if (!response.ok) {
        throw new Error(
          "Biometric sync failed"
        );
      }
      return response.text();
    }).then(() => {
    return fetch(
      '/live/latest');
  }).then(response => {
    if (!response.ok) {
      throw new Error(
        "Cannot load live attendance"
      );
    }
    return response.json();
  }).then(data => {
    let attendance = data
      .attendance;
    if (!attendance || !
      attendance.employee
    ) {
      return;
    }
    let employee =
      attendance.employee;
    /* ==================================================
    EMPLOYEE INFORMATION
    ================================================== */
    document.getElementById(
        "employee_name")
      .textContent =
      employee.name ||
      "UNKNOWN EMPLOYEE";
    document.getElementById(
        "employee_no")
      .textContent =
      employee
      .employee_no ||
      "------";
    document.getElementById(
        "department")
      .textContent =
      employee
      .department ?
      employee.department
      .department_name :
      "------";
    document.getElementById(
        "employee_position"
      ).textContent =
      employee.position ?
      employee.position
      .position_name :
      "Employee";
    /* ==================================================
    EMPLOYEE PHOTO
    ================================================== */
    let employeePhoto =
      document
      .getElementById(
        "employee_photo"
      );
    employeePhoto.src =
      employee.photo ?
      "/storage/" +
      employee.photo :
      "/img/default.jpeg";
    /* ==================================================
    ATTENDANCE TIME
    ================================================== */
    let attendanceDate =
      attendance
      .time_out ?
      attendance
      .time_out :
      attendance.time_in;
    document.getElementById(
        "attendance_time"
      ).textContent =
      formatTime(
        attendanceDate);
    /* ==================================================
    TIME IN OR TIME OUT
    ================================================== */
    let status = document
      .getElementById(
        "status");
    let statusBox = document
      .getElementById(
        "statusBox");
    if (attendance
      .time_out) {
      status.innerHTML =
        '<i class="bi bi-box-arrow-right"></i> TIME OUT RECORDED';
      status.style.color =
        "#ff6764";
      statusBox.style
        .background =
        "rgba(255,103,100,.11)";
      statusBox.style
        .borderColor =
        "rgba(255,103,100,.50)";
    } else {
      status.innerHTML =
        '<i class="bi bi-check-circle-fill"></i> TIME IN RECORDED';
      status.style.color =
        "#20d6a2";
      statusBox.style
        .background =
        "rgba(32,214,162,.11)";
      statusBox.style
        .borderColor =
        "rgba(32,214,162,.45)";
    }
    /* ==================================================
    NEW SCAN ANIMATION
    ================================================== */
    if (previousUpdate !==
      attendance
      .updated_at) {
      let panel = document
        .getElementById(
          "profilePanel"
        );
      panel.classList
        .remove(
          "new-scan");
      void
      panel.offsetWidth;
      panel.classList.add(
        "new-scan");
      previousUpdate =
        attendance
        .updated_at;
    }
    /* ==================================================
    RECENT ATTENDANCE TABLE
    ================================================== */
    let html = "";
    if (data.recent && Array
      .isArray(data
        .recent)) {
      data.recent.forEach(
        function(
          row) {
          if (!row
            .employee
          ) {
            return;
          }
          let rowEmployee =
            row
            .employee;
          let rowTime =
            row
            .time_out ?
            row
            .time_out :
            row
            .time_in;
          let photo =
            rowEmployee
            .photo ?
            "/storage/" +
            rowEmployee
            .photo :
            "/img/default.jpeg";
          let department =
            rowEmployee
            .department ?
            rowEmployee
            .department
            .department_name :
            "-";
          html += `


<tr>


<td>


<div

class="d-flex

align-items-center

gap-3">


<img

src="${photo}"

class="avatar"

alt="Employee">


<div>


<div

class="employee-table-name">


${

rowEmployee.name

}


</div>


<div

class="employee-number">


${

rowEmployee.employee_no

??

"NO EMPLOYEE NUMBER"

}


</div>


</div>


</div>


</td>


<td>


<span

class="department-text">


${

department

}


</span>


</td>


<td>


<strong>


${

formatTime(

rowTime

)

}


</strong>


</td>


<td>


${


row.time_out


?


'<span class="badge-out"><i class="bi bi-box-arrow-right"></i> TIME OUT</span>'


:


'<span class="badge-in"><i class="bi bi-check-circle-fill"></i> TIME IN</span>'


}


</td>


</tr>


`;
        });
    }
    document.getElementById(
        "recentAttendance"
      ).innerHTML =
      html || `


<tr>


<td

colspan="4"

class="text-center py-5">


<i

class="bi bi-clock-history fs-2">


</i>


<div class="mt-2">


No attendance records


</div>


</td>


</tr>


`;
  }).catch(error => {
    console.error(
      "Attendance error:",
      error);
  }).finally(() => {
    loading = false;
  });
}
/* ==================================================
START LIVE MONITORING
================================================== */
loadAttendance();
setInterval(loadAttendance, 3000);


</script>


</body>

</html>