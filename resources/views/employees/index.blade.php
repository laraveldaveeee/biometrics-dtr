<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees | NTC DTR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
      :root {
        --sidebar: #071426;
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
        background: #1769e8;
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
      }

      /* MAIN */
      .main {
        margin-left: 270px;
        min-height: 100vh;
      }

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

      .content {
        padding: 30px 35px;
      }

      /* EMPLOYEE CARD */
      .employee-card {
        padding: 25px;
        border-radius: 20px;
        background: white;
        box-shadow:
          0 8px 30px rgba(26, 45, 76, .07);
      }

      .employee-title {
        font-size: 21px;
        font-weight: 800;
      }

      .employee-description {
        color: #718096;
        font-size: 13px;
      }

      .search-box {
        position: relative;
        width: 300px;
      }

      .search-box i {
        position: absolute;
        top: 12px;
        left: 15px;
        color: #8a98aa;
      }

      .search-input {
        height: 43px;
        padding-left: 43px;
        border-radius: 12px;
        border: 1px solid #dce3ec;
      }

      .btn-add {
        height: 43px;
        padding: 0 20px;
        border: 0;
        border-radius: 12px;
        color: white;
        background: #1769e8;
        font-weight: 700;
      }

      /* TABLE */
      .table {
        margin-top: 20px;
        vertical-align: middle;
      }

      .table thead th {
        padding: 16px;
        color: #718096;
        border-bottom: 1px solid #e9edf3;
        font-size: 12px;
        text-transform: uppercase;
      }

      .table tbody td {
        padding: 17px 16px;
        border-color: #edf0f4;
      }

      .employee-photo {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        object-fit: cover;
        background: #e9eef5;
      }

      .employee-name {
        font-weight: 800;
      }

      .employee-id {
        color: #8a98aa;
        font-size: 12px;
      }

      .status-active {
        display: inline-block;
        padding: 7px 14px;
        border-radius: 20px;
        color: #159447;
        background: #e6f7ec;
        font-size: 11px;
        font-weight: 800;
      }

      .status-inactive {
        display: inline-block;
        padding: 7px 14px;
        border-radius: 20px;
        color: #d93b47;
        background: #ffe9eb;
        font-size: 11px;
        font-weight: 800;
      }

      .action-button {
        width: 36px;
        height: 36px;
        border: 0;
        border-radius: 10px;
      }

      .edit-button {
        color: #1769e8;
        background: #e8f1ff;
      }

      .view-button {
        color: #16a34a;
        background: #e8f8ed;
      }

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
    <aside class="sidebar">
      <div class="brand">
        <div class="brand-icon">
          <i class="bi bi-fingerprint"></i>
        </div>
        <div>
          <div class="brand-title"> NTC DTR </div>
          <div class="brand-subtitle"> ATTENDANCE SYSTEM </div>
        </div>
      </div>
      <div class="menu-title"> MAIN MENU </div>
      <a href="{{ route('dashboard') }}" class="nav-link">
        <i class="bi bi-grid-1x2-fill"></i>
        <span>Dashboard</span>
      </a>
      <a href="{{ route('employees.index') }}" class="nav-link active">
        <i class="bi bi-people-fill"></i>
        <span>Employees</span>
      </a>
      <a href="#" class="nav-link">
        <i class="bi bi-building"></i>
        <span>Departments</span>
      </a>
      <a href="#" class="nav-link">
        <i class="bi bi-briefcase-fill"></i>
        <span>Positions</span>
      </a>
      <a
        href="{{ route('attendance.index') }}"
        class="nav-link">

        <i class="bi bi-calendar-check-fill"></i>

        <span>Attendance</span>

        </a>
      <div class="menu-title"> REPORTS </div>
      <a href="#" class="nav-link">
        <i class="bi bi-bar-chart-fill"></i>
        <span>Attendance Reports</span>
      </a>
      <a href="#" class="nav-link">
        <i class="bi bi-file-earmark-pdf-fill"></i>
        <span>DTR Reports</span>
      </a>
      <div class="menu-title"> SYSTEM </div>
      <a href="{{ url('/live') }}" target="_blank" class="nav-link">
        <i class="bi bi-display-fill"></i>
        <span>Live Monitor</span>
      </a>
      <a href="#" class="nav-link">
        <i class="bi bi-gear-fill"></i>
        <span>Settings</span>
      </a>
    </aside>
    <div class="main">
      <header class="topbar">
        <div>
          <div class="page-title"> Employees </div>
          <div class="page-subtitle"> Manage employee information and biometric accounts </div>
        </div>
        <div class="fw-bold"> Administrator </div>
      </header>
      <div class="content">
        <div class="employee-card">
          <div class="
d-flex
justify-content-between
align-items-center
flex-wrap
gap-3">
            <div>
              <div class="employee-title"> Employee Management </div>
              <div class="employee-description"> List of registered biometric employees </div>
            </div>
            <div class="
d-flex
gap-2">
              <div class="search-box">
                <i class="bi bi-search"></i>
                <input type="text" id="employeeSearch" class="
form-control
search-input" placeholder="Search employee...">
              </div>
               


               <a href="{{ route('employees.create') }}" class="btn btn-add d-flex align-items-center gap-2">

                <i class="bi bi-person-plus-fill"></i>

                    Add Employee

                </a>

            </div>
          </div>
          <div class="table-responsive">
            <table class="table" id="employeeTable">
              <thead>
                <tr>
                  <th>Employee</th>
                  <th>Biometric ID</th>
                  <th>Department</th>
                  <th>Position</th>
                  <th>Contact</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody> @forelse($employees as $employee) <tr>
                  <td>
                    <div class="
d-flex
align-items-center
gap-3">
                      <img src="{{
$employee->photo
? asset(
'storage/'.$employee->photo
)
: asset(
'images/default.png'
)
}}" class="employee-photo">
                      <div>
                        <div class="employee-name">
                          {{ $employee->name }}
                        </div>
                        <div class="employee-id">
                          {{ $employee->employee_no

?? 'No Employee Number'

}}
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    {{ $employee->biometric_userid

}}
                  </td>
                  <td>
                    {{ optional(
$employee->department
)->department_name

?? '-'

}}
                  </td>
                  <td>
                    {{ optional(
$employee->position
)->position_name

?? '-'

}}
                  </td>
                  <td>
                    {{ $employee->contact_no

?? '-'

}}
                  </td>
                  <td> 
                    @if($employee->status) 
                    <span class="status-active"> ACTIVE </span> 
                     @else 
                        <span class="status-inactive"> INACTIVE </span>
                   @endif 
               </td>
                  <td>
                    <button class="action-button view-button" title="View">
                      <i class="bi bi-eye-fill"></i>
                    </button>
                    
                    <a
                        href="{{ route('employees.edit', $employee->id) }}"
                        class="
                        action-button
                        edit-button
                        d-inline-flex
                        align-items-center
                        justify-content-center
                        text-decoration-none"
                        title="Edit Employee">

                        <i class="bi bi-pencil-fill"></i>

                        </a>
                  </td>
                </tr> @empty 
            <tr>
                  <td colspan="7" class="
text-center
py-5
text-secondary">
                    <i class="
bi
bi-people
fs-1"></i>
                    <div class="mt-2"> No employees found. </div>
                  </td>
                </tr> @endforelse </tbody>
            </table>
          </div>
          <div class="mt-3">
            {{ $employees->links() }}
          </div>
        </div>
      </div>
    </div>
    <script>
      document.getElementById('employeeSearch').addEventListener('keyup', function() {
        let keyword = this.value.toLowerCase();
        let rows = document.querySelectorAll('#employeeTable tbody tr');
        rows.forEach(function(row) {
          row.style.display = row.innerText.toLowerCase().includes(keyword) ? '' : 'none';
        });
      });
    </script>
  </body>
</html>