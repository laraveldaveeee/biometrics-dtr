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
   <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
     <i class="bi bi-grid-1x2-fill"></i>
     <span>Dashboard</span>
   </a>
   <a href="{{ route('employees.index') }}" class="nav-link {{ request()->routeIs('employees.*') ? 'active' : '' }}">
     <i class="bi bi-people-fill"></i>
     <span>Employees</span>
   </a>
   <a href="{{ route('departments.index') }}" class="nav-link {{ request()->routeIs('departments.*') ? 'active' : '' }}">
     <i class="bi bi-building"></i>
     <span>Departments</span>
   </a>
   <a href="{{ route('positions.index') }}" class="nav-link {{ request()->routeIs('positions.*') ? 'active' : '' }}">
     <i class="bi bi-briefcase-fill"></i>
     <span>Positions</span>
   </a>
   <a href="{{ route('attendance.index') }}" class="nav-link {{ request()->routeIs('attendance.*') ? 'active' : '' }}">
     <i class="bi bi-calendar-check-fill"></i>
     <span>Attendance</span>
   </a>
   <a href="{{ route('work-schedules.index') }}" class="nav-link {{ request()->routeIs('work-schedules.*') ? 'active' : '' }}">
     <i class="bi bi-clock-history"></i>
     <span>Work Schedules</span>
   </a>
   <div class="menu-title"> REPORTS </div>
   <a href="{{ route('reports.daily') }}" class="nav-link {{ request()->routeIs('reports.daily') ? 'active' : '' }}">
     <i class="bi bi-file-earmark-bar-graph-fill"></i>
     <span>Daily Reports</span>
   </a>
   <a href="{{ route('reports.monthly') }}" class="nav-link {{ request()->routeIs('reports.monthly') ? 'active' : '' }}">
     <i class="bi bi-calendar3"></i>
     <span>DTR Reports</span>
   </a>
   <div class="menu-title"> SYSTEM </div>
   <a href="{{ url('/live') }}" target="_blank" class="nav-link {{ request()->is('live') ? 'active' : '' }}">
     <i class="bi bi-display-fill"></i>
     <span>Live Monitor</span>
   </a>
   <a href="{{ route('settings.index') }}" class="nav-link {{ request()->routeIs('settings.*') ? 'active' : '' }}">
     <i class="bi bi-gear-fill"></i>
     <span>System Settings</span>
   </a>
 </aside>