<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departments | NTC DTR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
      :root {
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
        overflow-y: auto;
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
      }

      .menu-title {
        margin: 28px 14px 10px;
        color: #6f829d;
        font-size: 11px;
        font-weight: 700;
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

      .department-card {
        padding: 25px;
        border-radius: 20px;
        background: white;
        box-shadow:
          0 8px 30px rgba(26, 45, 76, .07);
      }

      .card-title {
        font-size: 21px;
        font-weight: 800;
      }

      .card-description {
        color: var(--muted);
        font-size: 13px;
      }

      .btn-add {
        height: 43px;
        padding: 0 20px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border-radius: 12px;
        color: white;
        background: var(--primary);
        font-weight: 700;
        text-decoration: none;
      }

      .btn-add:hover {
        color: white;
        background: #105acb;
      }

      .table {
        margin-top: 20px;
        vertical-align: middle;
      }

      .table thead th {
        padding: 16px;
        color: #718096;
        font-size: 12px;
        text-transform: uppercase;
      }

      .table tbody td {
        padding: 18px 16px;
      }

      .department-icon {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 13px;
        color: #1769e8;
        background: #e8f1ff;
        font-size: 22px;
      }

      .department-name {
        font-size: 17px;
        font-weight: 800;
      }

      .status-active {
        padding: 7px 14px;
        border-radius: 20px;
        color: #159447;
        background: #e6f7ec;
        font-size: 11px;
        font-weight: 800;
      }

      .status-inactive {
        padding: 7px 14px;
        border-radius: 20px;
        color: #d93b47;
        background: #ffe9eb;
        font-size: 11px;
        font-weight: 800;
      }

      .action-button {
        width: 37px;
        height: 37px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 0;
        border-radius: 10px;
        text-decoration: none;
      }

      .edit-button {
        color: #1769e8;
        background: #e8f1ff;
      }

      .delete-button {
        color: #dc3545;
        background: #ffe9eb;
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
      <a href="{{ route('employees.index') }}" class="nav-link">
        <i class="bi bi-people-fill"></i>
        <span>Employees</span>
      </a>
      <a href="{{ route('departments.index') }}" class="nav-link active">
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
    </aside>
    <div class="main">
      <header class="topbar">
        <div>
          <div class="page-title"> Departments </div>
          <div class="page-subtitle"> Manage employee departments </div>
        </div>
        <div class="fw-bold"> Administrator </div>
      </header>
      <div class="content"> @if(session('success')) <div class="alert alert-success">
          <i class="bi bi-check-circle-fill"></i>
          {{ session('success') }}
        </div> @endif @if(session('error')) <div class="alert alert-danger">
          <i class="bi bi-exclamation-circle-fill"></i>
          {{ session('error') }}
        </div> @endif <div class="department-card">
          <div class="d-flex
justify-content-between
align-items-center">
            <div>
              <div class="card-title"> Department Management </div>
              <div class="card-description"> Create and manage departments </div>
            </div>
            <a href="{{ route('departments.create') }}" class="btn-add">
              <i class="bi bi-plus-circle-fill"></i> Add Department </a>
          </div>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Department</th>
                  <th>Employees</th>
                  <th>Status</th>
                  <th>Created</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody> @forelse( $departments as $department ) <tr>
                  <td>
                    <div class="d-flex
align-items-center
gap-3">
                      <div class="department-icon">
                        <i class="bi bi-building"></i>
                      </div>
                      <div class="department-name">
                        {{ $department->department_name }}
                      </div>
                    </div>
                  </td>
                  <td>
                    {{ $department->employees_count }} Employee(s)
                  </td>
                  <td> @if($department->status) <span class="status-active"> ACTIVE </span> @else <span class="status-inactive"> INACTIVE </span> @endif </td>
                  <td>
{{ optional($department->created_at)->format('M d, Y') ?? '-' }}                  </td>
                  <td>
                    <a href="{{
route(
'departments.edit',
$department->id
)
}}" class="
action-button
edit-button">
                      <i class="bi bi-pencil-fill"></i>
                    </a>
                    <form action="{{
route(
'departments.destroy',
$department->id
)
}}" method="POST" class="d-inline"> @csrf @method('DELETE') <button type="submit" class="
action-button
delete-button" onclick="
return confirm(
'Delete this department?'
)
">
                        <i class="bi bi-trash-fill"></i>
                      </button>
                    </form>
                  </td>
                </tr> @empty <tr>
                  <td colspan="5" class="
text-center
py-5
text-secondary"> No departments found. </td>
                </tr> @endforelse </tbody>
            </table>
          </div>
          {{ $departments->links() }}
        </div>
      </div>
    </div>
  </body>
</html>