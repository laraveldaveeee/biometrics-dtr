<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BioTrack DTR — Biometric Attendance System</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
<script>
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          ink: { 950:'#0A0F1A', 900:'#111826', 850:'#151F30', 800:'#1B2436', 700:'#232F45', line:'#28354C' },
          verify: { DEFAULT:'#16C79A', dim:'#0E5E4C' },
          stamp: { DEFAULT:'#D64545', dim:'#7A2626' },
          amber: { DEFAULT:'#F0A83A' },
          paper: '#F3EEE2',
        },
        fontFamily: {
          display: ['"Space Grotesk"','sans-serif'],
          body: ['Inter','sans-serif'],
          mono: ['"JetBrains Mono"','monospace'],
        }
      }
    }
  }
</script>
<style>
  * { scrollbar-width: thin; scrollbar-color: #28354C transparent; }
  ::-webkit-scrollbar { width: 6px; height: 6px; }
  ::-webkit-scrollbar-thumb { background: #28354C; border-radius: 999px; }

  body { background:
    radial-gradient(ellipse 900px 500px at 15% -10%, rgba(22,199,154,0.08), transparent),
    radial-gradient(ellipse 700px 500px at 100% 0%, rgba(214,69,69,0.06), transparent),
    #0A0F1A;
  }

  .grain { background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='120' height='120'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='2' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.03'/%3E%3C/svg%3E"); }

  @keyframes sweep { 0% { transform: translateY(-100%); } 100% { transform: translateY(100%); } }
  @keyframes spin-slow { to { transform: rotate(360deg); } }
  @keyframes spin-slow-rev { to { transform: rotate(-360deg); } }
  @keyframes pulse-ring { 0% { transform: scale(0.8); opacity: 0.9; } 100% { transform: scale(1.9); opacity: 0; } }
  @keyframes pop-in { 0% { transform: translateY(14px) scale(0.98); opacity:0; } 100% { transform: translateY(0) scale(1); opacity:1; } }
  @keyframes stamp-down { 0% { transform: translateY(-40px) rotate(-18deg) scale(1.4); opacity: 0; } 60% { transform: translateY(4px) rotate(-9deg) scale(0.96); opacity: 1;} 100% { transform: translateY(0) rotate(-9deg) scale(1); opacity: 1; } }
  @keyframes row-in { 0% { opacity: 0; transform: translateY(-6px); background-color: rgba(22,199,154,0.12); } 100% { opacity: 1; transform: translateY(0); background-color: transparent; } }
  @keyframes blink-dot { 0%,100% { opacity:1; } 50% { opacity:0.25; } }
  @keyframes flash-verify { 0% { box-shadow: 0 0 0 0 rgba(22,199,154,0.5);} 100% { box-shadow: 0 0 0 24px rgba(22,199,154,0);} }

  .anim-sweep { animation: sweep 2.6s ease-in-out infinite; }
  .anim-spin-slow { animation: spin-slow 7s linear infinite; }
  .anim-spin-slow-rev { animation: spin-slow-rev 10s linear infinite; }
  .anim-pulse-ring { animation: pulse-ring 2.2s cubic-bezier(0.4,0,0.6,1) infinite; }
  .anim-pop-in { animation: pop-in 0.4s cubic-bezier(0.16,1,0.3,1) both; }
  .anim-stamp { animation: stamp-down 0.55s cubic-bezier(0.34,1.56,0.64,1) both; }
  .anim-row-in { animation: row-in 0.6s ease-out both; }
  .anim-blink { animation: blink-dot 1.6s ease-in-out infinite; }
  .anim-flash { animation: flash-verify 0.8s ease-out; }

  @media (prefers-reduced-motion: reduce) {
    .anim-sweep, .anim-spin-slow, .anim-spin-slow-rev, .anim-pulse-ring, .anim-blink { animation: none !important; }
  }

  .tab-active { background: #16C79A1a; color:#5EEBC9; border-color:#16C79A55; }
  input:focus-visible, button:focus-visible { outline: 2px solid #16C79A; outline-offset: 2px; }
</style>
</head>
<body class="grain min-h-screen text-slate-100 font-body antialiased">

  <!-- HEADER -->
  <header class="border-b border-ink-line/70 bg-ink-950/80 backdrop-blur sticky top-0 z-30">
    <div class="max-w-[1400px] mx-auto px-5 md:px-8 py-3.5 flex items-center justify-between gap-4">
      <div class="flex items-center gap-3">
        <div class="w-9 h-9 rounded-lg bg-verify/10 border border-verify/30 flex items-center justify-center">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#16C79A" stroke-width="1.8" stroke-linecap="round">
            <path d="M12 3C7 3 4 6.5 4 11c0 3 1 5 1 7"/>
            <path d="M12 6c3.5 0 6 2.5 6 6 0 2-.5 3.5-.5 5"/>
            <path d="M8 9c0-2 1.8-3.5 4-3.5s4 1.5 4 3.5c0 2.5-.5 4-.5 6"/>
            <path d="M12 9.5c1.4 0 2.3 1 2.3 2.5 0 2-1 3.5-1 5.5"/>
          </svg>
        </div>
        <div>
          <p class="font-display font-semibold text-[15px] tracking-tight leading-none">BioTrack <span class="text-verify">DTR</span></p>
          <p class="text-[11px] text-slate-500 font-mono mt-0.5">Biometric Time Record · Main Branch</p>
        </div>
      </div>

      <div class="hidden md:flex items-center gap-2 text-xs font-mono text-slate-500">
        <span class="w-1.5 h-1.5 rounded-full bg-verify anim-blink"></span>
        <span id="header-date">—</span>
        <span class="text-ink-line">|</span>
        <span id="header-clock" class="text-slate-200 text-sm tabular-nums">--:--:-- --</span>
      </div>

      <div class="flex items-center gap-3">
        <button class="hidden sm:flex items-center gap-1.5 text-xs font-medium text-slate-400 hover:text-slate-200 transition-colors">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 17h5l-1.4-1.4A2 2 0 0 1 18 14.2V11a6 6 0 0 0-4-5.65V5a2 2 0 1 0-4 0v.35A6 6 0 0 0 6 11v3.2a2 2 0 0 1-.6 1.4L4 17h5"/><path d="M9 17v1a3 3 0 0 0 6 0v-1"/></svg>
        </button>
        <div class="flex items-center gap-2 pl-3 border-l border-ink-line">
          <div class="w-8 h-8 rounded-full bg-gradient-to-br from-verify/60 to-ink-700 flex items-center justify-center text-[11px] font-semibold font-display">RC</div>
          <div class="hidden lg:block leading-tight">
            <p class="text-xs font-medium">Reyna Castillo</p>
            <p class="text-[10px] text-slate-500">HR Administrator</p>
          </div>
        </div>
      </div>
    </div>
  </header>

  <main class="max-w-[1400px] mx-auto px-5 md:px-8 py-6 grid grid-cols-1 xl:grid-cols-12 gap-5">

    <!-- SCAN STATION -->
    <section class="xl:col-span-5">
      <div class="rounded-2xl border border-ink-line bg-ink-900/70 p-6 h-full flex flex-col">
        <div class="flex items-center justify-between mb-1">
          <h2 class="font-display font-semibold text-lg">Scan Station</h2>
          <span id="scanner-status-pill" class="text-[11px] font-mono px-2 py-1 rounded-full border border-verify/30 text-verify bg-verify/10">READY</span>
        </div>
        <p class="text-xs text-slate-500 mb-6">Ilagay ang daliri sa scanner para mag-time in o time out.</p>

        <!-- Scanner visual -->
        <div class="relative mx-auto w-56 h-56 flex items-center justify-center mb-6">
          <div id="pulse-container" class="absolute inset-0 flex items-center justify-center pointer-events-none"></div>

          <div class="absolute inset-0 rounded-full border border-dashed border-ink-line anim-spin-slow"></div>
          <div class="absolute inset-3 rounded-full border border-ink-700 anim-spin-slow-rev"></div>

          <!-- corner brackets -->
          <svg class="absolute inset-6" viewBox="0 0 100 100" fill="none">
            <path d="M4 18V6h12" stroke="#28354C" stroke-width="2" stroke-linecap="round"/>
            <path d="M96 18V6H84" stroke="#28354C" stroke-width="2" stroke-linecap="round"/>
            <path d="M4 82V94h12" stroke="#28354C" stroke-width="2" stroke-linecap="round"/>
            <path d="M96 82V94H84" stroke="#28354C" stroke-width="2" stroke-linecap="round"/>
          </svg>

          <div id="scan-ring" class="relative w-36 h-36 rounded-full bg-ink-850 border border-ink-line flex items-center justify-center overflow-hidden transition-all duration-300">
            <div id="sweep-line" class="anim-sweep absolute left-0 right-0 h-16 bg-gradient-to-b from-transparent via-verify/25 to-transparent"></div>
            <svg width="52" height="52" viewBox="0 0 24 24" fill="none" stroke="#8B99B0" stroke-width="1.6" stroke-linecap="round" class="relative z-10" id="fingerprint-icon">
              <path d="M12 3C7 3 4 6.5 4 11c0 3 1 5 1 7"/>
              <path d="M12 6c3.5 0 6 2.5 6 6 0 2-.5 3.5-.5 5"/>
              <path d="M8 9c0-2 1.8-3.5 4-3.5s4 1.5 4 3.5c0 2.5-.5 4-.5 6"/>
              <path d="M12 9.5c1.4 0 2.3 1 2.3 2.5 0 2-1 3.5-1 5.5"/>
              <path d="M9.5 20c-1-1.8-1.5-3.3-1.5-5"/>
            </svg>
          </div>
        </div>

        <div class="text-center mb-6">
          <p id="live-clock" class="font-mono text-3xl font-semibold tabular-nums tracking-tight">--:--:-- --</p>
          <p id="live-date" class="text-xs text-slate-500 mt-1">Loading date…</p>
        </div>

        <button id="scan-btn" class="w-full py-3 rounded-xl bg-verify text-ink-950 font-display font-semibold text-sm tracking-wide hover:bg-verify/90 active:scale-[0.98] transition-all shadow-[0_0_0_1px_rgba(22,199,154,0.3)]">
          Simulate Fingerprint Scan
        </button>
        <p class="text-center text-[11px] text-slate-600 mt-2 font-mono">Demo mode — walang totoong sensor na kailangan</p>

        <!-- Punch card slip -->
        <div id="slip-zone" class="mt-6 min-h-[150px] flex items-start justify-center">
          <p id="slip-placeholder" class="text-xs text-slate-600 mt-10 text-center">Ang punch slip ay lalabas dito<br>pagkatapos mag-scan.</p>
        </div>
      </div>
    </section>

    <!-- LOG + STATS -->
    <section class="xl:col-span-7 flex flex-col gap-5">

      <!-- stat pills -->
      <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
        <div class="rounded-xl border border-ink-line bg-ink-900/70 p-4">
          <p class="text-[11px] text-slate-500 mb-1">Present Today</p>
          <p id="stat-present" class="font-display font-semibold text-2xl text-verify tabular-nums">0</p>
        </div>
        <div class="rounded-xl border border-ink-line bg-ink-900/70 p-4">
          <p class="text-[11px] text-slate-500 mb-1">Late</p>
          <p id="stat-late" class="font-display font-semibold text-2xl text-amber tabular-nums">0</p>
        </div>
        <div class="rounded-xl border border-ink-line bg-ink-900/70 p-4">
          <p class="text-[11px] text-slate-500 mb-1">Timed Out</p>
          <p id="stat-out" class="font-display font-semibold text-2xl text-slate-300 tabular-nums">0</p>
        </div>
        <div class="rounded-xl border border-ink-line bg-ink-900/70 p-4">
          <p class="text-[11px] text-slate-500 mb-1">Absent</p>
          <p id="stat-absent" class="font-display font-semibold text-2xl text-stamp tabular-nums">42</p>
        </div>
      </div>

      <!-- log panel -->
      <div class="rounded-2xl border border-ink-line bg-ink-900/70 flex-1 flex flex-col overflow-hidden">
        <div class="p-5 pb-3 flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-ink-line">
          <div>
            <h2 class="font-display font-semibold text-lg leading-tight">Today's Log</h2>
            <p class="text-xs text-slate-500">Live attendance feed</p>
          </div>
          <div class="relative">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-500" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg>
            <input id="search-input" type="text" placeholder="Search name or ID…" class="pl-8 pr-3 py-2 text-xs bg-ink-850 border border-ink-line rounded-lg w-full sm:w-56 placeholder:text-slate-600 text-slate-200">
          </div>
        </div>

        <div class="px-5 pt-3 flex gap-2 flex-wrap">
          <button data-filter="all" class="filter-tab tab-active text-xs font-medium px-3 py-1.5 rounded-full border border-ink-line transition-colors">All</button>
          <button data-filter="On Time" class="filter-tab text-xs font-medium px-3 py-1.5 rounded-full border border-ink-line text-slate-400 hover:text-slate-200 transition-colors">On Time</button>
          <button data-filter="Late" class="filter-tab text-xs font-medium px-3 py-1.5 rounded-full border border-ink-line text-slate-400 hover:text-slate-200 transition-colors">Late</button>
          <button data-filter="Timed Out" class="filter-tab text-xs font-medium px-3 py-1.5 rounded-full border border-ink-line text-slate-400 hover:text-slate-200 transition-colors">Timed Out</button>
        </div>

        <div class="overflow-x-auto mt-3 flex-1">
          <table class="w-full text-sm min-w-[560px]">
            <thead>
              <tr class="text-left text-[11px] text-slate-500 uppercase tracking-wide border-b border-ink-line">
                <th class="font-medium px-5 py-2">Employee</th>
                <th class="font-medium px-3 py-2">Time In</th>
                <th class="font-medium px-3 py-2">Time Out</th>
                <th class="font-medium px-3 py-2">Status</th>
              </tr>
            </thead>
            <tbody id="log-body" class="divide-y divide-ink-line/70"></tbody>
          </table>
          <p id="empty-state" class="hidden text-center text-xs text-slate-600 py-10">Walang record na tumutugma sa iyong hinahanap.</p>
        </div>
      </div>
    </section>
  </main>

<script>
  // ---------- Live clock ----------
  function pad(n){ return n.toString().padStart(2,'0'); }
  function updateClock(){
    const now = new Date();
    let h = now.getHours();
    const ampm = h >= 12 ? 'PM' : 'AM';
    h = h % 12 || 12;
    const timeStr = `${pad(h)}:${pad(now.getMinutes())}:${pad(now.getSeconds())} ${ampm}`;
    const dateStr = now.toLocaleDateString('en-US', { weekday:'long', month:'long', day:'numeric', year:'numeric' });
    document.getElementById('live-clock').textContent = timeStr;
    document.getElementById('header-clock').textContent = timeStr;
    document.getElementById('live-date').textContent = dateStr;
    document.getElementById('header-date').textContent = now.toLocaleDateString('en-US',{month:'short',day:'numeric'});
  }
  updateClock();
  setInterval(updateClock, 1000);

  // ---------- Mock employees ----------
  const employees = [
    { id:'EMP-2041', name:'Juan Dela Cruz', dept:'Warehouse', initials:'JD', color:'from-verify/60' },
    { id:'EMP-2042', name:'Maria Santos', dept:'Accounting', initials:'MS', color:'from-amber/60' },
    { id:'EMP-2043', name:'Ramon Villanueva', dept:'IT Support', initials:'RV', color:'from-stamp/60' },
    { id:'EMP-2044', name:'Angelica Reyes', dept:'HR', initials:'AR', color:'from-verify/60' },
    { id:'EMP-2045', name:'Michael Torres', dept:'Logistics', initials:'MT', color:'from-amber/60' },
    { id:'EMP-2046', name:'Bea Fernandez', dept:'Sales', initials:'BF', color:'from-stamp/60' },
    { id:'EMP-2047', name:'Carlo Mendoza', dept:'Warehouse', initials:'CM', color:'from-verify/60' },
    { id:'EMP-2048', name:'Divina Aquino', dept:'Accounting', initials:'DA', color:'from-amber/60' },
  ];
  const empState = {}; // tracks each employee's timed-in status today
  let scanCounter = 0;

  // ---------- Seed initial log ----------
  const seedLog = [
    { emp: employees[0], timeIn:'7:52 AM', timeOut:'—', status:'On Time' },
    { emp: employees[1], timeIn:'8:14 AM', timeOut:'—', status:'Late' },
    { emp: employees[3], timeIn:'7:45 AM', timeOut:'5:03 PM', status:'Timed Out' },
    { emp: employees[5], timeIn:'7:58 AM', timeOut:'—', status:'On Time' },
  ];
  seedLog.forEach(r => empState[r.emp.id] = r.status === 'Timed Out' ? 'out' : 'in');

  const logBody = document.getElementById('log-body');
  let currentFilter = 'all';
  let searchTerm = '';

  function statusBadge(status){
    const map = {
      'On Time': 'bg-verify/10 text-verify border-verify/30',
      'Late': 'bg-amber/10 text-amber border-amber/30',
      'Timed Out': 'bg-ink-700 text-slate-400 border-ink-line',
    };
    return `<span class="text-[11px] font-medium px-2 py-1 rounded-full border ${map[status]}">${status}</span>`;
  }

  function renderRow(r, animate){
    const tr = document.createElement('tr');
    tr.className = `hover:bg-ink-850/60 transition-colors ${animate ? 'anim-row-in' : ''}`;
    tr.dataset.name = r.emp.name.toLowerCase();
    tr.dataset.id = r.emp.id.toLowerCase();
    tr.dataset.status = r.status;
    tr.innerHTML = `
      <td class="px-5 py-3 flex items-center gap-3">
        <div class="w-8 h-8 rounded-full bg-gradient-to-br ${r.emp.color} to-ink-700 flex items-center justify-center text-[10px] font-semibold font-display shrink-0">${r.emp.initials}</div>
        <div class="leading-tight">
          <p class="text-sm font-medium">${r.emp.name}</p>
          <p class="text-[11px] text-slate-500 font-mono">${r.emp.id} · ${r.emp.dept}</p>
        </div>
      </td>
      <td class="px-3 py-3 font-mono text-xs">${r.timeIn}</td>
      <td class="px-3 py-3 font-mono text-xs">${r.timeOut}</td>
      <td class="px-3 py-3">${statusBadge(r.status)}</td>
    `;
    return tr;
  }

  function fullRender(){
    logBody.innerHTML = '';
    const rows = [...allRows].reverse();
    let visibleCount = 0;
    rows.forEach(r => {
      const matchesFilter = currentFilter === 'all' || r.status === currentFilter;
      const matchesSearch = !searchTerm || r.emp.name.toLowerCase().includes(searchTerm) || r.emp.id.toLowerCase().includes(searchTerm);
      if (matchesFilter && matchesSearch){
        logBody.appendChild(renderRow(r, false));
        visibleCount++;
      }
    });
    document.getElementById('empty-state').classList.toggle('hidden', visibleCount !== 0);
    updateStats();
  }

  let allRows = [...seedLog];

  function updateStats(){
    const present = new Set(allRows.map(r => r.emp.id)).size;
    const late = allRows.filter(r => r.status === 'Late').length;
    const out = allRows.filter(r => r.status === 'Timed Out').length;
    document.getElementById('stat-present').textContent = present;
    document.getElementById('stat-late').textContent = late;
    document.getElementById('stat-out').textContent = out;
    document.getElementById('stat-absent').textContent = Math.max(employees.length + 34 - present, 0);
  }

  // filter tabs
  document.querySelectorAll('.filter-tab').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.filter-tab').forEach(b => b.classList.remove('tab-active','text-slate-400'));
      document.querySelectorAll('.filter-tab').forEach(b => b.classList.add('text-slate-400'));
      btn.classList.add('tab-active');
      btn.classList.remove('text-slate-400');
      currentFilter = btn.dataset.filter;
      fullRender();
    });
  });

  document.getElementById('search-input').addEventListener('input', (e) => {
    searchTerm = e.target.value.toLowerCase();
    fullRender();
  });

  // ---------- Scan simulation ----------
  const scanBtn = document.getElementById('scan-btn');
  const scanRing = document.getElementById('scan-ring');
  const pulseContainer = document.getElementById('pulse-container');
  const statusPill = document.getElementById('scanner-status-pill');
  const slipZone = document.getElementById('slip-zone');
  const slipPlaceholder = document.getElementById('slip-placeholder');

  function spawnPulse(){
    const ring = document.createElement('div');
    ring.className = 'absolute w-36 h-36 rounded-full border-2 border-verify anim-pulse-ring';
    pulseContainer.appendChild(ring);
    setTimeout(() => ring.remove(), 2300);
  }
  const pulseTimer = setInterval(spawnPulse, 1400);

  function nowTimeStr(){
    const now = new Date();
    let h = now.getHours();
    const ampm = h >= 12 ? 'PM' : 'AM';
    h = h % 12 || 12;
    return `${pad(h)}:${pad(now.getMinutes())} ${ampm}`;
  }

  scanBtn.addEventListener('click', () => {
    if (scanBtn.disabled) return;
    scanBtn.disabled = true;
    scanBtn.textContent = 'Scanning…';
    scanBtn.classList.add('opacity-60','cursor-wait');
    statusPill.textContent = 'SCANNING';
    statusPill.className = 'text-[11px] font-mono px-2 py-1 rounded-full border border-amber/30 text-amber bg-amber/10';
    scanRing.classList.add('ring-2','ring-amber/40');

    const emp = employees[scanCounter % employees.length];
    scanCounter++;

    setTimeout(() => {
      // verified
      scanRing.classList.remove('ring-2','ring-amber/40');
      scanRing.classList.add('ring-2','ring-verify/60','anim-flash');
      statusPill.textContent = 'VERIFIED';
      statusPill.className = 'text-[11px] font-mono px-2 py-1 rounded-full border border-verify/40 text-verify bg-verify/20';

      const isTimingIn = empState[emp.id] !== 'in';
      const action = isTimingIn ? 'TIME IN' : 'TIME OUT';
      empState[emp.id] = isTimingIn ? 'in' : 'out';

      const nowStr = nowTimeStr();
      const nowHour = new Date().getHours() + new Date().getMinutes()/60;
      let status;
      if (!isTimingIn) status = 'Timed Out';
      else status = nowHour > 8.25 ? 'Late' : 'On Time';

      if (isTimingIn) {
        allRows.push({ emp, timeIn: nowStr, timeOut: '—', status });
      } else {
        const existing = [...allRows].reverse().find(r => r.emp.id === emp.id && r.status !== 'Timed Out');
        if (existing) { existing.timeOut = nowStr; existing.status = 'Timed Out'; }
        else allRows.push({ emp, timeIn: '—', timeOut: nowStr, status: 'Timed Out' });
      }
      fullRender();

      // punch slip
      slipPlaceholder.classList.add('hidden');
      slipZone.innerHTML = '';
      const slip = document.createElement('div');
      slip.className = 'anim-stamp relative w-full max-w-[240px] bg-paper text-ink-950 rounded-sm shadow-xl px-4 py-3 font-mono text-xs border-t-4 border-dashed border-ink-950/10';
      slip.style.transform = 'rotate(-4deg)';
      slip.innerHTML = `
        <p class="text-[10px] tracking-widest text-ink-950/50 mb-1">BIOTRACK DTR SLIP</p>
        <p class="font-semibold text-sm mb-0.5">${emp.name}</p>
        <p class="text-[11px] text-ink-950/60 mb-2">${emp.id} · ${emp.dept}</p>
        <div class="flex justify-between text-[11px] border-t border-dashed border-ink-950/20 pt-2">
          <span>${new Date().toLocaleDateString('en-US',{month:'short',day:'numeric'})}</span>
          <span>${nowStr}</span>
        </div>
        <div class="absolute -right-2 -top-3 rotate-[10deg] border-2 border-stamp text-stamp font-bold text-[11px] px-2 py-1 rounded-sm tracking-wider bg-paper/90">
          ${action}
        </div>
      `;
      slipZone.appendChild(slip);

      setTimeout(() => {
        scanBtn.disabled = false;
        scanBtn.textContent = 'Simulate Fingerprint Scan';
        scanBtn.classList.remove('opacity-60','cursor-wait');
        statusPill.textContent = 'READY';
        statusPill.className = 'text-[11px] font-mono px-2 py-1 rounded-full border border-verify/30 text-verify bg-verify/10';
        scanRing.classList.remove('ring-2','ring-verify/60','anim-flash');
      }, 1400);
    }, 1500);
  });

  fullRender();
</script>
</body>
</html>