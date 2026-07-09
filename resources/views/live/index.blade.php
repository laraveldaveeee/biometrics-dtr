<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>NTC Live Attendance</title>


<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">


<link
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
rel="stylesheet">


<style>

:root{

--dark:#07111f;

--dark2:#0c192b;

--card:#101f34;

--border:#22344d;

--green:#20d6a2;

--red:#ef5350;

--blue:#3987ff;

}


*{

box-sizing:border-box;

}


body{

margin:0;

height:100vh;

overflow:hidden;

font-family:"Segoe UI",Arial,sans-serif;

color:white;

background:

radial-gradient(
circle at top left,
rgba(32,214,162,.10),
transparent 35%
),

#07111f;

}


/* ================= HEADER ================= */


.header{

height:105px;

padding:18px 40px;

background:rgba(7,17,31,.95);

border-bottom:1px solid var(--border);

display:flex;

align-items:center;

}


.logo-box{

width:60px;

height:60px;

border-radius:15px;

background:

rgba(32,214,162,.12);

border:

1px solid rgba(32,214,162,.4);

display:flex;

align-items:center;

justify-content:center;

font-size:34px;

color:var(--green);

}


.system-title{

font-size:31px;

font-weight:800;

letter-spacing:.5px;

}


.system-title span{

color:var(--green);

}


.subtitle{

color:#8191a8;

font-size:14px;

letter-spacing:2px;

}


.clock{

font-size:35px;

font-weight:700;

font-family:monospace;

}


.date{

color:#91a1b7;

}


.online{

color:var(--green);

font-weight:700;

}


.online-dot{

width:10px;

height:10px;

display:inline-block;

border-radius:50%;

background:var(--green);

box-shadow:

0 0 15px var(--green);

}


/* ================= MAIN ================= */


.main{

height:

calc(100vh - 105px);

padding:25px 35px;

}


.main-row{

height:100%;

}


.panel{

height:100%;

background:

rgba(16,31,52,.94);

border:

1px solid var(--border);

border-radius:25px;

box-shadow:

0 20px 60px

rgba(0,0,0,.28);

}


/* ================= PROFILE ================= */


.profile-panel{

padding:25px;

text-align:center;

position:relative;

overflow:hidden;

}


.live-label{

position:absolute;

top:20px;

right:20px;

padding:

7px 15px;

border-radius:30px;

font-size:13px;

font-weight:700;

color:var(--green);

background:

rgba(32,214,162,.12);

border:

1px solid

rgba(32,214,162,.4);

}


.photo-wrapper{

width:280px;

height:280px;

margin:

25px auto 18px;

position:relative;

}


.employee-photo{

width:100%;

height:100%;

object-fit:cover;

border-radius:50%;

border:8px solid var(--card);

box-shadow:

0 0 0 5px var(--green),

0 0 50px

rgba(32,214,162,.20);

}


.scan-line{

position:absolute;

left:10px;

right:10px;

height:4px;

background:

var(--green);

box-shadow:

0 0 20px

var(--green);

animation:

scan 3s infinite;

}


@keyframes scan{

0%{

top:15%;

opacity:0;

}

15%{

opacity:1;

}

85%{

opacity:1;

}

100%{

top:85%;

opacity:0;

}

}


.employee-name{

font-size:39px;

font-weight:800;

line-height:1.1;

margin-top:10px;

}


.employee-position{

color:#91a1b7;

font-size:17px;

margin-top:8px;

}


.employee-info{

margin-top:20px;

}


.info-box{

padding:15px;

border-radius:15px;

background:#0b1829;

border:

1px solid var(--border);

}


.info-label{

color:#71839c;

font-size:12px;

text-transform:uppercase;

letter-spacing:1px;

}


.info-value{

font-size:19px;

font-weight:700;

margin-top:4px;

}


.status-box{

margin-top:20px;

padding:18px;

border-radius:17px;

background:

rgba(32,214,162,.13);

border:

1px solid

rgba(32,214,162,.40);

}


.status-text{

font-size:29px;

font-weight:900;

color:var(--green);

}


.attendance-time{

font-size:30px;

font-family:monospace;

font-weight:800;

margin-top:5px;

}


/* ================= RIGHT ================= */


.attendance-panel{

padding:25px;

overflow:hidden;

}


.section-title{

font-size:27px;

font-weight:800;

}


.section-subtitle{

color:#71839c;

}


.refresh-status{

color:var(--green);

font-size:13px;

}


.table-wrapper{

margin-top:20px;

height:

calc(100% - 70px);

overflow:auto;

}


.table{

color:white;

vertical-align:middle;

}


.table thead{

position:sticky;

top:0;

z-index:5;

}


.table thead th{

background:#091728;

color:#71839c;

border:none;

padding:18px;

font-size:13px;

text-transform:uppercase;

}


.table tbody td{

background:transparent;

color:#e5edf8;

border-color:

rgba(34,52,77,.65);

padding:17px;

}


.table tbody tr{

transition:.25s;

}


.table tbody tr:hover{

background:

rgba(32,214,162,.05);

}


.avatar{

width:53px;

height:53px;

border-radius:50%;

object-fit:cover;

border:

2px solid var(--green);

}


.employee-table-name{

font-size:17px;

font-weight:700;

}


.employee-number{

font-size:12px;

color:#71839c;

}


.badge-in,

.badge-out{

padding:

8px 15px;

border-radius:30px;

font-weight:800;

font-size:12px;

}


.badge-in{

color:var(--green);

background:

rgba(32,214,162,.12);

border:

1px solid

rgba(32,214,162,.4);

}


.badge-out{

color:#ff7774;

background:

rgba(239,83,80,.12);

border:

1px solid

rgba(239,83,80,.4);

}


/* NEW SCAN ANIMATION */


.new-scan{

animation:

newAttendance .7s;

}


@keyframes newAttendance{

0%{

transform:

scale(.96);

opacity:.3;

box-shadow:

0 0 80px

var(--green);

}

100%{

transform:

scale(1);

opacity:1;

}

}


/* RESPONSIVE */


@media(max-width:1200px){

body{

overflow:auto;

}

.main{

height:auto;

}

.panel{

min-height:700px;

}

}


</style>

</head>


<body>


<!-- ================= HEADER ================= -->


<header class="header">


<div class="container-fluid">


<div class="row align-items-center">


<div class="col-7">


<div class="d-flex align-items-center gap-3">


<div class="logo-box">

<i class="bi bi-fingerprint"></i>

</div>


<div>


<div class="system-title">

NTC

<span>

ATTENDANCE

</span>

SYSTEM

</div>


<div class="subtitle">

BIOMETRIC LIVE MONITORING

</div>


</div>


</div>


</div>


<div class="col-5 text-end">


<div class="clock"

id="clock">

--:--:--

</div>


<div class="date"

id="date">

Loading...

</div>


<div class="online mt-1">

<span class="online-dot">

</span>

LIVE MONITORING

</div>


</div>


</div>


</div>


</header>



<!-- ================= CONTENT ================= -->


<main class="main">


<div class="row g-4 main-row">


<!-- ================= PROFILE ================= -->


<div class="col-xl-5">


<div

class="panel profile-panel"

id="profilePanel">


<div class="live-label">

<i class="bi bi-broadcast">

</i>

LIVE

</div>


<div class="photo-wrapper">


<img

id="employee_photo"

src="{{ asset('img/default.jpeg') }}"

class="employee-photo">


<div class="scan-line">

</div>


</div>


<div

class="employee-name"

id="employee_name">


@if($attendance)

{{ $attendance->employee->name }}

@else

WAITING FOR SCAN

@endif


</div>


<div

class="employee-position"

id="employee_position">


@if(
$attendance &&
$attendance->employee->position
)

{{ $attendance->employee
->position->position_name }}

@else

Place your finger on the biometric device

@endif


</div>



<div class="row g-3 employee-info">


<div class="col-6">


<div class="info-box">


<div class="info-label">

Employee Number

</div>


<div

class="info-value"

id="employee_no">


@if($attendance)

{{

$attendance->employee
->employee_no ?? '------'

}}

@else

------

@endif


</div>


</div>


</div>


<div class="col-6">


<div class="info-box">


<div class="info-label">

Department

</div>


<div

class="info-value"

id="department">


@if($attendance)

{{

optional(

$attendance->employee
->department

)->department_name

?? '------'

}}

@else

------

@endif


</div>


</div>


</div>


</div>



<div

class="status-box"

id="statusBox">


<div

class="status-text"

id="status">


@if($attendance)


@if($attendance->time_out)

<i class="bi bi-box-arrow-right">

</i>

TIME OUT RECORDED


@else


<i class="bi bi-check-circle-fill">

</i>

TIME IN RECORDED


@endif


@else


<i class="bi bi-fingerprint">

</i>

READY TO SCAN


@endif


</div>


<div

class="attendance-time"

id="attendance_time">


@if($attendance)


@if($attendance->time_out)


{{

\Carbon\Carbon::parse(

$attendance->time_out

)->format('h:i:s A')

}}


@else


{{

\Carbon\Carbon::parse(

$attendance->time_in

)->format('h:i:s A')

}}


@endif


@else

--:--:--

@endif


</div>


</div>


</div>


</div>



<!-- ================= TABLE ================= -->


<div class="col-xl-7">


<div class="panel attendance-panel">


<div

class="d-flex

justify-content-between

align-items-center">


<div>


<div class="section-title">


<i

class="bi

bi-clock-history

text-success">


</i>


Recent Attendance


</div>


<div class="section-subtitle">

Latest biometric transactions

</div>


</div>


<div

class="refresh-status">


<i

class="bi

bi-arrow-repeat">


</i>


Auto Updating


</div>


</div>



<div class="table-wrapper">


<table class="table">


<thead>


<tr>


<th>

Employee

</th>


<th>

Department

</th>


<th>

Time

</th>


<th>

Status

</th>


</tr>


</thead>


<tbody

id="recentAttendance">


<tr>


<td

colspan="4"

class="text-center">


Waiting for attendance...


</td>


</tr>


</tbody>


</table>


</div>


</div>


</div>


</div>


</main>



<script>


/* ================= CLOCK ================= */


function updateClock(){


let now=

new Date();


document

.getElementById("clock")

.innerHTML=

now.toLocaleTimeString();


document

.getElementById("date")

.innerHTML=

now.toLocaleDateString(

'en-US',

{

weekday:'long',

month:'long',

day:'numeric',

year:'numeric'

}

);


}


updateClock();


setInterval(

updateClock,

1000

);



/* ================= LIVE DATA ================= */


let previousUpdate=null;


let loading=false;



function formatTime(

dateTime

){


if(!dateTime){

return "--";

}


let date=

new Date(

dateTime.replace(

" ",

"T"

)

);


return date

.toLocaleTimeString(

[],

{

hour:

'2-digit',

minute:

'2-digit',

second:

'2-digit'

}

);


}



function loadAttendance(){


if(loading){

return;

}


loading=true;


/*

TESTING:

Sync biometric first.

Kapag background sync na,

aalisin natin ito.

*/


fetch(

'/sync-attendance'

)


.then(

response=>

response.text()

)


.then(()=>{


return fetch(

'/live/latest'

);


})


.then(

response=>{


if(

!response.ok

){


throw new Error(

"Cannot load attendance"

);


}


return response.json();


})


.then(data=>{


let attendance=

data.attendance;


if(!attendance){

return;

}


let employee=

attendance.employee;


/* PROFILE */


document

.getElementById(

"employee_name"

)

.innerHTML=

employee.name;


document

.getElementById(

"employee_no"

)

.innerHTML=

employee.employee_no

??

"------";


document

.getElementById(

"department"

)

.innerHTML=

employee.department

?

employee.department

.department_name

:

"------";


document

.getElementById(

"employee_position"

)

.innerHTML=

employee.position

?

employee.position

.position_name

:

"Employee";


let attendanceDate=

attendance.time_out

?

attendance.time_out

:

attendance.time_in;


document

.getElementById(

"attendance_time"

)

.innerHTML=

formatTime(

attendanceDate

);


let status=

document

.getElementById(

"status"

);


let statusBox=

document

.getElementById(

"statusBox"

);


if(

attendance.time_out

){


status.innerHTML=

'<i class="bi bi-box-arrow-right"></i> TIME OUT RECORDED';


statusBox.style

.background=

"rgba(239,83,80,.13)";


statusBox.style

.borderColor=

"rgba(239,83,80,.50)";


status.style.color=

"#ff7774";


}


else{


status.innerHTML=

'<i class="bi bi-check-circle-fill"></i> TIME IN RECORDED';


statusBox.style

.background=

"rgba(32,214,162,.13)";


statusBox.style

.borderColor=

"rgba(32,214,162,.50)";


status.style.color=

"#20d6a2";


}


/* ANIMATION */


if(

previousUpdate

!==

attendance.updated_at

){


let panel=

document

.getElementById(

"profilePanel"

);


panel.classList

.remove(

"new-scan"

);


void panel

.offsetWidth;


panel.classList

.add(

"new-scan"

);


previousUpdate=

attendance.updated_at;


}



/* TABLE */


let html="";


data.recent

.forEach(

function(row){


if(

!row.employee

){

return;

}


let rowEmployee=

row.employee;


let rowTime=

row.time_out

?

row.time_out

:

row.time_in;


html+=`


<tr>


<td>


<div

class="d-flex

align-items-center

gap-3">


<img

src="/img/default.jpeg"

class="avatar">


<div>


<div

class="employee-table-name">


${

rowEmployee.name

}


</div>


<div

class="employee-number">


${

rowEmployee.employee_no

??

"NO EMPLOYEE NUMBER"

}


</div>


</div>


</div>


</td>


<td>


${

rowEmployee.department

?

rowEmployee.department

.department_name

:

"-"

}


</td>


<td>


<strong>


${

formatTime(

rowTime

)

}


</strong>


</td>


<td>


${


row.time_out


?


'<span class="badge-out">TIME OUT</span>'


:


'<span class="badge-in">TIME IN</span>'


}


</td>


</tr>


`;


});


document

.getElementById(

"recentAttendance"

)

.innerHTML=

html

||

`


<tr>


<td

colspan="4"

class="text-center">


No attendance records


</td>


</tr>


`;


})


.catch(

error=>{


console.error(

"Attendance error:",

error

);


})


.finally(()=>{


loading=false;


});


}



/* LOAD IMMEDIATELY */


loadAttendance();



/*

CHECK EVERY 3 SECONDS

*/


setInterval(

loadAttendance,

3000

);


</script>


</body>

</html>