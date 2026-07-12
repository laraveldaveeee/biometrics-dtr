<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee | NTC DTR</title>
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/edit-employee.css') }}" rel="stylesheet">

  </head>
  <body>
    <!-- SIDEBAR -->
  @include ('layouts.sidebar')
    <!-- MAIN -->
    <div class="main">
      <header class="topbar">
        <div>
          <div class="page-title"> Edit Employee </div>
          <div class="page-subtitle"> Update employee information and profile </div>
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
        <div class="form-card">
          <div>
            <div class="form-title">
              <i class="bi bi-pencil-square text-primary"></i> Edit Employee Information
            </div>
            <div class="form-description"> Update the employee details below </div>
          </div>
          <!-- VALIDATION ERRORS --> @if($errors->any()) <div class="alert alert-danger mt-4" role="alert">
            <div class="fw-bold">
              <i class="bi bi-exclamation-circle-fill"></i> Please check the following:
            </div>
            <ul class="mb-0 mt-2"> @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
          </div> @endif
          <!-- EDIT FORM -->
          <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data"> @csrf @method('PUT') <div class="section-title">
              <i class="bi bi-person-fill text-primary"></i> Basic Information
            </div>
            <div class="row g-4">
              <!-- LEFT FORM -->
              <div class="col-lg-8">
                <div class="row g-3">
                  <!-- FULL NAME -->
                  <div class="col-md-6">
                    <label class="form-label"> Full Name <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $employee->name) }}" placeholder="Employee full name" required>
                  </div>
                  <!-- EMPLOYEE NUMBER -->
                  <div class="col-md-6">
                    <label class="form-label"> Employee Number </label>
                    <input type="text" name="employee_no" class="form-control" value="{{ old('employee_no', $employee->employee_no) }}" placeholder="Example: NTC-2026-001">
                  </div>
                  <!-- BIOMETRIC USER ID -->
                  <div class="col-md-6">
                    <label class="form-label"> Biometric User ID <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="biometric_userid" class="form-control" value="{{ old('biometric_userid', $employee->biometric_userid) }}" placeholder="ID from biometric device" required>
                  </div>
                  <!-- BIOMETRIC UID -->
                  <div class="col-md-6">
                    <label class="form-label"> Biometric UID </label>
                    <input type="number" name="biometric_uid" class="form-control" value="{{ old('biometric_uid', $employee->biometric_uid) }}" placeholder="Biometric internal UID">
                  </div>
                  <!-- DEPARTMENT -->
                  <div class="col-md-6">
                    <label class="form-label"> Department </label>
                    <select name="department_id" class="form-select">
                      <option value=""> Select Department </option> @foreach($departments as $department) <option value="{{ $department->id }}" {{

old(
    'department_id',
    $employee->department_id
)

== $department->id

? 'selected'

: ''

}}>
                        {{ $department->department_name }}
                      </option> @endforeach
                    </select>
                  </div>
                  <!-- POSITION -->
                  <div class="col-md-6">
                    <label class="form-label"> Position </label>
                    <select name="position_id" class="form-select">
                      <option value=""> Select Position </option> @foreach($positions as $position) <option value="{{ $position->id }}" {{ old('position_id', $employee->position_id)  == $position->id ? 'selected' : ''}}>
                        {{ $position->position_name }}
                      </option> @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="work_schedule_id"> Work Schedule </label>
                    <select name="work_schedule_id" id="work_schedule_id" class="form-control">
                      <option value=""> Select Work Schedule </option> @foreach($workSchedules as $schedule) <option value="{{ $schedule->id }}" {{
                                    old(
                                        'work_schedule_id',
                                        $employee->work_schedule_id
                                    ) == $schedule->id

                                    ? 'selected'

                                    : ''
                                }}>
                        {{ $schedule->schedule_name }} — {{ \Carbon\Carbon::parse($schedule->time_in)->format('h:i A') }} to {{ \Carbon\Carbon::parse($schedule->time_out)->format('h:i A') }}
                      </option> @endforeach
                    </select> @error('work_schedule_id') <small class="text-danger">
                      {{ $message }}
                    </small> @enderror
                  </div>
                  <!-- CONTACT -->
                  <div class="col-md-6">
                    <label class="form-label"> Contact Number </label>
                    <input type="text" name="contact_no" class="form-control" value="{{ old('contact_no', $employee->contact_no) }}" placeholder="09XXXXXXXXX">
                  </div>
                  <!-- STATUS -->
                  <div class="col-md-6">
                    <label class="form-label"> Employee Status </label>
                    <div class="form-check form-switch mt-2">
                      <input class="form-check-input" type="checkbox" name="status" value="1" id="status" {{

old(
    'status',
    $employee->status
)

? 'checked'

: ''

}}>
                      <label class="form-check-label" for="status"> Active Employee </label>
                    </div>
                  </div>
                  <!-- ADDRESS -->
                  <div class="col-12">
                    <label class="form-label"> Address </label>
                    <textarea name="address" class="form-control" placeholder="Employee address">{{ old('address', $employee->address) }}</textarea>
                  </div>
                </div>
              </div>
              <!-- PHOTO -->
              <div class="col-lg-4">
                <label class="form-label"> Employee Photo </label>
                <div class="photo-box">
                  <img src="{{

$employee->photo

? asset('storage/' . $employee->photo)

: asset('images/default.png')

}}" id="photoPreview" class="photo-preview" alt="Employee Photo">
                  <div class="small text-secondary mt-3"> Select a new photo only if you want to replace the current photo. </div>
                </div>
                <input type="file" name="photo" id="photoInput" class="form-control mt-3" accept="image/png,image/jpeg">
                <div class="small text-secondary mt-2"> JPG or PNG, maximum 2 MB </div>
              </div>
            </div>
            <!-- BUTTONS -->
            <div class="d-flex
justify-content-end
gap-3
mt-5">
              <a href="{{ route('employees.index') }}" class="btn btn-light btn-cancel">
                <i class="bi bi-x-circle me-2"></i> Cancel </a>
              <button type="submit" class="btn-update">
                <i class="bi bi-check-circle-fill me-1"></i> Update Employee </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script>
      /* EMPLOYEE PHOTO PREVIEW */
      document.getElementById('photoInput').addEventListener('change', function(event) {
        let file = event.target.files[0];
        if (file) {
          let reader = new FileReader();
          reader.onload = function(e) {
            document.getElementById('photoPreview').src = e.target.result;
          };
          reader.readAsDataURL(file);
        }
      });
    </script>
  </body>
</html>