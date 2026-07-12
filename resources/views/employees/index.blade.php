<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees | NTC DTR</title>
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/employee.css') }}" rel="stylesheet">
  </head>
  <body> @include ('layouts.sidebar') <div class="main">
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
            <div class="d-flex gap-2">
              <div class="search-box">
                <i class="bi bi-search"></i>
                <input type="text" id="employeeSearch" class="
form-control
search-input" placeholder="Search employee...">
              </div>
              <a href="{{ route('employees.create') }}" class="btn btn-add d-flex align-items-center gap-2">
                <i class="bi bi-person-plus-fill"></i> Add Employee </a>
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
                    <div class="d-fle align-items-center gap-3">
                      <img src="{{ $employee->photo ? asset( 'storage/'.$employee->photo) : asset('images/default.png') }}" class="employee-photo">
                      <div>
                        <div class="employee-name">
                          {{ $employee->name }}
                        </div>
                        <div class="employee-id">
                          {{ $employee->employee_no ?? 'No Employee Number' }}
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    {{ $employee->biometric_userid }}
                  </td>
                  <td>
                    {{ optional($employee->department)->department_name ?? '-' }}
                  </td>
                  <td>
                    {{ optional($employee->position)->position_name ?? '-' }}
                  </td>
                  <td>
                    {{ $employee->contact_no ?? '-' }}
                  </td>
                  <td> @if($employee->status) 
                    <span class="status-active"> ACTIVE </span> @else <span class="status-inactive"> INACTIVE </span>
                     @endif 
                   </td>
                  <td>
                    <button class="action-button view-button" title="View">
                      <i class="bi bi-eye-fill"></i>
                    </button>
                    <a href="{{ route('employees.edit', $employee->id) }}" class="
                        action-button
                        edit-button
                        d-inline-flex
                        align-items-center
                        justify-content-center
                        text-decoration-none" title="Edit Employee">
                      <i class="bi bi-pencil-fill"></i>
                    </a>
                  </td>
                </tr> @empty 
                <tr>
                  <td colspan="7" class="text-center py-5 text-secondary">
                    <i class="bi bi-people fs-1"></i>
                    <div class="mt-2"> No employees found. </div>
                  </td>
                </tr> @endforelse 
              </tbody>
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