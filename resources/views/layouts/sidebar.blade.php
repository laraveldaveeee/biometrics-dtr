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
      <a href="{{ route('dashboard') }}" class="nav-link active">
        <i class="bi bi-grid-1x2-fill"></i>
        <span>Dashboard</span>
      </a>
      <a href="{{ route('employees.index') }}" class="nav-link">
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
      <a href="#" class="nav-link">
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