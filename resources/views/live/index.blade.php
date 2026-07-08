<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>NTC Attendance System</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">



<style>


:root{

--primary:#0b1f3a;

--secondary:#0066ff;

--success:#16a34a;

--light:#f8fafc;

}



*{

box-sizing:border-box;

}



body{

margin:0;

height:100vh;

overflow:hidden;

font-family:"Segoe UI",Arial,sans-serif;

background:#eef3f8;

}



/* HEADER */


.header{


height:120px;


background:

linear-gradient(90deg,#071426,#123d78);


color:white;


padding:25px 40px;


display:flex;


align-items:center;


box-shadow:0 5px 20px rgba(0,0,0,.25);


}



.logo-title{

font-size:38px;

font-weight:800;

}



.sub-title{

font-size:18px;

opacity:.8;

}




.clock{

font-size:42px;

font-weight:700;

}





/* MAIN */


.main{

height:calc(100vh - 120px);

padding:35px;


}





.card-box{


background:white;


border-radius:25px;


box-shadow:

0 10px 30px rgba(0,0,0,.12);


padding:30px;


height:100%;


}





/* EMPLOYEE */


.profile-area{

text-align:center;

}



.photo{


width:320px;

height:320px;


border-radius:50%;


object-fit:cover;


border:8px solid white;


box-shadow:

0 0 0 8px #0d6efd;


}




.employee-name{


font-size:45px;


font-weight:800;


color:#0b1f3a;


margin-top:25px;


}





.info{


background:#f1f5f9;


border-radius:15px;


padding:15px;


margin-top:15px;


font-size:22px;


font-weight:600;


}



.info i{

color:#0066ff;

font-size:28px;

}







.status-card{


margin-top:25px;


padding:20px;


border-radius:20px;


background:#16a34a;


color:white;


font-size:35px;


font-weight:800;


}




/* RIGHT TABLE */


.section-title{


font-size:32px;


font-weight:800;


color:#0b1f3a;


margin-bottom:25px;


}



.table thead{


background:#0b1f3a;


color:white;


}



.table{


font-size:20px;


}



.avatar{


width:55px;

height:55px;


border-radius:50%;


object-fit:cover;


}





.badge-in{


background:#16a34a;


color:white;


padding:8px 18px;


border-radius:20px;


font-weight:700;


}



.badge-out{


background:#dc2626;


color:white;


padding:8px 18px;


border-radius:20px;


font-weight:700;


}






/* RESPONSIVE */


@media(max-width:1200px){


body{

overflow:auto;

}


.main{

height:auto;

}



.photo{

width:220px;

height:220px;

}


.employee-name{

font-size:35px;

}



}





@media(max-width:768px){


.header{

height:auto;

text-align:center;

}



.logo-title{

font-size:25px;

}



.clock{

font-size:30px;

}



.main{

padding:15px;

}



.card-box{

margin-bottom:20px;

}


}




</style>


</head>


<body>




<!-- HEADER -->


<div class="header">


<div class="container-fluid">


<div class="row align-items-center">


<div class="col-md-8">


<div class="logo-title">

<i class="bi bi-fingerprint"></i>

NTC ATTENDANCE MANAGEMENT SYSTEM

</div>


<div class="sub-title">

BIOMETRIC LIVE MONITORING SYSTEM

</div>


</div>




<div class="col-md-4 text-end">


<div class="clock" id="clock">

--:--

</div>


<div>

<i class="bi bi-wifi text-success"></i>

DEVICE ONLINE

</div>


</div>


</div>


</div>


</div>







<!-- BODY -->


<div class="main">


<div class="row g-4">





<!-- EMPLOYEE CARD -->


<div class="col-lg-5">


<div class="card-box profile-area">



<img

src="{{asset('images/default.png')}}"

id="photo"

class="photo"

>



<div class="employee-name" id="employee_name">

    @if($attendance)

        {{ $attendance->employee->name }}

    @else



    Waiting Employee...

    @endif

</div>






<div class="row">


<div class="col-6">


<div class="info">


<i class="bi bi-person-badge"></i>


<br>


Employee No


<br>


<span id="employee_no">

    @if($attendance)

        {{ $attendance->employee->employee_no }}

    @else

        ------

    @endif

</span>


</div>


</div>




<div class="col-6">


<div class="info">


<i class="bi bi-building"></i>


<br>


Department


<br>


<span id="department">

    @if($attendance && $attendance->employee->department_name)

    {{ $attendance->employee->department_name }}

    @else

    ------

    @endif


</span>



</div>


</div>


</div>





<div class="status-card">


<i class="bi bi-check-circle-fill"></i>


<span id="status">

@if($attendance)

@if($attendance->time_out)

TIME OUT RECORDED

@else

TIME IN RECORDED

@endif

@else

READY TO SCAN

@endif

</span>


</div>





<h3 class="mt-4">

<i class="bi bi-clock-history"></i>

<span id="attendance_time">


    @if($attendance)

        @if($attendance->time_out)

        {{ \Carbon\Carbon::parse($attendance->time_out)->format('h:i:s A') }}

        @else

        {{ \Carbon\Carbon::parse($attendance->time_in)->format('h:i:s A') }}

        @endif

    @endif


</span>


</h3>



</div>


</div>







<!-- ATTENDANCE TABLE -->


<div class="col-lg-7">


<div class="card-box">


<div class="section-title">


<i class="bi bi-list-check"></i>

Recent Attendance


</div>




<table class="table table-hover align-middle">


<thead>


<tr>

<th>Photo</th>

<th>Name</th>

<th>Department</th>

<th>Time</th>

<th>Status</th>


</tr>


</thead>



<tbody id="recentAttendance">

 

 

</tbody>

</table>



</div>


</div>




</div>


</div>





<script>

function clock() {
    let d = new Date();
    document.getElementById("clock").innerHTML = d.toLocaleTimeString();
}

setInterval(clock, 1000);
clock();

let syncing = false;

function loadAttendance(){

    // Huwag magsimula ng panibagong request kung may tumatakbo pa
    if(syncing) return;

    syncing = true;

    fetch('/sync-attendance')

    .then(response => response.text())

    .then(() => {

        return fetch('/live/latest');

    })

    .then(response => response.json())

    .then(data => {

        if(!data.attendance){

            syncing = false;
            return;

        }

        let attendance = data.attendance;

        // ==========================
        // EMPLOYEE
        // ==========================

        document.getElementById("employee_name").innerHTML =
            attendance.employee.name;

        document.getElementById("employee_no").innerHTML =
            attendance.employee.employee_no ?? "------";

        document.getElementById("department").innerHTML =
            attendance.employee.department
            ? attendance.employee.department.department_name
            : "------";

        document.getElementById("attendance_time").innerHTML =
            attendance.time_out
            ? attendance.time_out.substring(11,19)
            : attendance.time_in.substring(11,19);

        document.getElementById("status").innerHTML =
            attendance.time_out
            ? "TIME OUT RECORDED"
            : "TIME IN RECORDED";

        // ==========================
        // RECENT TABLE
        // ==========================

        let html = "";

        data.recent.forEach(function(row){

            html += `
            <tr>

                <td>

                    <img src="/images/default.png" class="avatar">

                </td>

                <td>

                    ${row.employee.name}

                </td>

                <td>

                    ${
                        row.employee.department
                        ? row.employee.department.department_name
                        : "-"
                    }

                </td>

                <td>

                    ${
                        row.time_out
                        ? row.time_out.substring(11,19)
                        : row.time_in.substring(11,19)
                    }

                </td>

                <td>

                    ${
                        row.time_out
                        ? '<span class="badge-out">TIME OUT</span>'
                        : '<span class="badge-in">TIME IN</span>'
                    }

                </td>

            </tr>`;

        });

        document.getElementById("recentAttendance").innerHTML = html;

    })

    .catch(function(error){

        console.error(error);

    })

    .finally(function(){

        syncing = false;

    });

}

// Load agad
loadAttendance();

// Every 2 seconds
setInterval(loadAttendance, 2000);

</script>
</body>

</html>