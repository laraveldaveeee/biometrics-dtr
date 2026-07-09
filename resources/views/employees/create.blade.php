<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee | NTC DTR</title>
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
          }
    
          * {
            box-sizing: border-box;
          }
    
          body {
            margin: 0;
            min-height: 100vh;
            background: var(--background);
            font-family:
              "Segoe UI",
              Arial,
              sans-serif;
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
            padding:
              5px 10px 30px;
            border-bottom:
              1px solid rgba(255,
                255,
                255,
                .10);
          }
    
          .brand-icon {
            width: 52px;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            background:
              var(--primary);
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
          }
    
          .nav-link i {
            width: 24px;
            font-size: 20px;
          }
    
          .nav-link:hover {
            color: white;
            background:
              rgba(255,
                255,
                255,
                .08);
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
            justify-content:
              space-between;
            background: white;
            border-bottom:
              1px solid #e5eaf1;
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
    
          /* FORM */
          .form-card {
            max-width: 1200px;
            margin: auto;
            padding: 30px;
            border-radius: 22px;
            background: white;
            box-shadow:
              0 8px 30px rgba(26,
                45,
                76,
                .07);
          }
    
          .form-title {
            font-size: 22px;
            font-weight: 800;
          }
    
          .form-description {
            color: var(--muted);
            font-size: 13px;
          }
    
          .section-title {
            margin:
              30px 0 18px;
            padding-bottom: 12px;
            border-bottom:
              1px solid #e9edf3;
            font-size: 15px;
            font-weight: 800;
          }
    
          .form-label {
            font-size: 13px;
            font-weight: 700;
          }
    
          .form-control,
          .form-select {
            height: 48px;
            border-radius: 12px;
            border:
              1px solid #dce3ec;
          }
    
          textarea.form-control {
            height: 110px;
          }
    
          .form-control:focus,
          .form-select:focus {
            border-color:
              var(--primary);
            box-shadow:
              0 0 0 4px rgba(23,
                105,
                232,
                .10);
          }
    
          .photo-box {
            height: 230px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border:
              2px dashed #cbd5e1;
            border-radius: 18px;
            background: #f8fafc;
          }
    
          .photo-preview {
            width: 125px;
            height: 125px;
            object-fit: cover;
            border-radius: 50%;
            border:
              5px solid white;
            box-shadow:
              0 5px 20px rgba(0,
                0,
                0,
                .12);
          }
    
          .btn-save {
            height: 48px;
            padding:
              0 25px;
            border: 0;
            border-radius: 12px;
            color: white;
            background:
              var(--primary);
            font-weight: 700;
          }
    
          .btn-cancel {
            height: 48px;
            padding:
              0 25px;
            display: flex;
            align-items: center;
            border-radius: 12px;
            font-weight: 700;
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
    <!-- SIDEBAR -->
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
            <span> Dashboard </span>
        </a>
        <a href="{{ route('employees.index') }}" class="nav-link active">
            <i class="bi bi-people-fill"></i>
            <span> Employees </span>
        </a>
        <a href="#" class="nav-link">
            <i class="bi bi-building"></i>
            <span> Departments </span>
        </a>
        <a href="#" class="nav-link">
            <i class="bi bi-briefcase-fill"></i>
            <span> Positions </span>
        </a>
        <a href="#" class="nav-link">
            <i class="bi bi-calendar-check-fill"></i>
            <span> Attendance </span>
        </a>
    </aside>
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