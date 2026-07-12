<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departments | NTC DTR</title>
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/department.css') }}" rel="stylesheet">
  </head>
  <body>
   @include ('layouts.sidebar')
    <div class="main">
      <header class="topbar">
        <div>
          <div class="page-title">
            <i class="bi bi-building text-primary"></i>Departments
          </div>
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
                    {{ optional($department->created_at)->format('M d, Y') ?? '-' }}
                  </td>
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
                    <form action="{{route(
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