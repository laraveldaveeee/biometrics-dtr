<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee | NTC DTR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/employee.css') }}" rel="stylesheet">
 
</head>

<body>
    <!-- SIDEBAR -->
      @include ('layouts.sidebar') 
    <!-- MAIN -->
    <div class="main">
        <header class="topbar">
            <div>
                <div class="page-title"> Add Employee </div>
                <div class="page-subtitle"> Register employee information </div>
            </div>
            <div class="fw-bold"> Administrator </div>
        </header>
        <div class="content">
            <div class="form-card">
                <div>
                    <div class="form-title"> Employee Information </div>
                    <div class="form-description"> Complete the employee details below </div>
                </div> @if( $errors->any() )
                <div class="alert alert-danger mt-4">
                    <strong> Please check the following: </strong>
                    <ul class="mb-0 mt-2"> @foreach( $errors->all() as $error )
                        <li>
                            {{ $error }}
                        </li> @endforeach </ul>
                </div> @endif
                <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data"> @csrf
                    <div class="section-title">
                        <i class="bi bi-person-fill"></i> Basic Information
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-8">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label"> Full Name <span class="text-danger"> * </span>
                                    </label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Employee full name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label"> Employee Number </label>
                                    <input type="text" name="employee_no" class="form-control" value="{{ old('employee_no') }}" placeholder="Example: NTC-2026-001">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label"> Biometric User ID <span class="text-danger"> * </span>
                                    </label>
                                    <input type="text" name="biometric_userid" class="form-control" value="{{ old('biometric_userid') }}" placeholder="ID from biometric device" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label"> Biometric UID </label>
                                    <input type="number" name="biometric_uid" class="form-control" value="{{ old('biometric_uid') }}" placeholder="Biometric internal UID">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label"> Department </label>
                                    <select name="department_id" class="form-select">
                                        <option value=""> Select Department </option> 
                                        @foreach( $departments as $department )
                                        <option value="{{ $department->id }}"> {{ $department->department_name }}
                                        </option> @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label"> Position </label>
                                    <select name="position_id" class="form-select">
                                        <option value=""> Select Position
                                        </option> @foreach( $positions as $position )
                                        <option value="{{ $position->id }}"> {{ $position->position_name }}

                                        </option> @endforeach
                                    </select>
                                </div>
                                <div class="form-group">

                                <label for="work_schedule_id">
                                    Work Schedule
                                </label>

                                <select
                                    name="work_schedule_id"
                                    id="work_schedule_id"
                                    class="form-control"
                                >

                                    <option value="">
                                        Select Work Schedule
                                    </option>

                                    @foreach($workSchedules as $schedule)

                                        <option
                                            value="{{ $schedule->id }}"
                                            {{ old('work_schedule_id') == $schedule->id ? 'selected' : '' }}
                                        >

                                            {{ $schedule->schedule_name }}

                                            — {{ \Carbon\Carbon::parse($schedule->time_in)->format('h:i A') }}

                                            to {{ \Carbon\Carbon::parse($schedule->time_out)->format('h:i A') }}

                                        </option>

                                    @endforeach

                                </select>

                                @error('work_schedule_id')

                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>

                                @enderror

                            </div>
                                <div class="col-md-6">
                                    <label class="form-label"> Contact Number </label>
                                    <input type="text" name="contact_no" class="form-control" value="{{ old('contact_no') }}" placeholder="09XXXXXXXXX">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label"> Employee Status </label>
                                    <div class="form-check

form-switch

mt-2">
                                        <input class="form-check-input" type="checkbox" name="status" value="1" id="status" {{ old( 'status', 1 ) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status"> Active Employee </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label"> Address </label>
                                    <textarea name="address" class="form-control" placeholder="Employee address">{{ old('address') }}

                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label"> Employee Photo </label>
                            <div class="photo-box">
                                <img src="{{ asset('images/default.png') }}" id="photoPreview" class="photo-preview">
                                <div class="small

text-secondary

mt-3"> JPG or PNG, maximum 2 MB </div>
                            </div>
                            <input type="file" name="photo" id="photoInput" class="form-control mt-3" accept="image/png,image/jpeg">
                        </div>
                    </div>
                    <div class="d-flex

justify-content-end

gap-3

mt-5">
                        <a href="{{ route('employees.index') }}" class="btn

btn-light

btn-cancel"> Cancel </a>
                        <button type="submit" class="btn-save">
                            <i class="bi bi-check-circle-fill"></i> Save Employee </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
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