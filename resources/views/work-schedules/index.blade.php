<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Positions | NTC DTR</title>
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

      .position-card {
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

      .position-icon {
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

      .position-name {
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

	@include ('layouts.sidebar')
{{-- <div class="main">
  <header class="topbar">
    <div>
      <div class="page-title">
         Work Schedules
      </div>
      <div class="page-subtitle"> Manage Work Schedules </div>
    </div>
  </header>
  <div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h2 class="fw-bold"></h2>
        <p class="text-secondary"> Manage office working hours </p>
      </div>
      <a href="{{ route('work-schedules.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Add Schedule </a>
    </div>  --}}

      <div class="main">
      <header class="topbar">
        <div>
          <div class="page-title"> Work Schedule </div>
          <div class="page-subtitle"> Manage employee work schedule </div>
        </div>
        <div class="fw-bold"> Administrator </div>
      </header>
      <div class="content"> @if(session('success')) <div class="alert alert-success">
          <i class="bi bi-check-circle-fill"></i>
          {{ session('success') }}
        </div> @endif @if(session('error')) <div class="alert alert-danger">
          <i class="bi bi-exclamation-circle-fill"></i>
          {{ session('error') }}
        </div> @endif <div class="position-card">
          <div class="d-flex
justify-content-between
align-items-center">
            <div>
              <div class="card-title"> Work Schedule Management </div>
              <div class="card-description"> Create and manage Work Schedule  </div>
            </div>
            <a href="{{ route('work-schedules.create') }}" class="btn-add">
              <i class="bi bi-plus-circle-fill"></i> Add Work Schedule </a>
          </div>
     
        <div class="table-responsive">
           <table class="table">
            <thead>
              <tr>
                <th> Schedule </th>
                <th> Time In </th>
                <th> Time Out </th>
                <th> Grace </th>
                <th> Break </th>
                <th> Working Days </th>
                <th> Status </th>
                <th> Actions </th>
              </tr>
            </thead>
            <tbody> @forelse($schedules as $schedule) <tr>
                <td>
                  <strong>{{ $schedule->schedule_name }}</strong>
                </td>
                <td>
                  {{ \Carbon\Carbon::parse($schedule->time_in)->format('h:i A') }}
                </td>
                <td>
                  {{ \Carbon\Carbon::parse($schedule->time_out)->format('h:i A') }}
                </td>
                <td>
                  {{ $schedule->grace_period }} minutes
                </td>
                <td> @if($schedule->break_start) {{ \Carbon\Carbon::parse($schedule->break_start)->format('h:i A') }} - {{ \Carbon\Carbon::parse($schedule->break_end)->format('h:i A') }} @else -- @endif </td>
                <td>{{ $schedule->working_days }}</td>
                <td> @if($schedule->status) <span class="badge bg-success">ACTIVE</span> @else <span class="badge bg-secondary">INACTIVE</span> @endif </td>
                <td>
                  <a href="{{ route('work-schedules.edit',$schedule->id) }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-pencil"></i>
                  </a>
                </td>
              </tr> @empty <tr>
                <td colspan="8" class="text-center"> No work schedules found. </td>
              </tr> @endforelse </tbody>
          </table>
        </div>
        {{ $schedules->links() }}
      </div>
    </div>
  </div> 
 