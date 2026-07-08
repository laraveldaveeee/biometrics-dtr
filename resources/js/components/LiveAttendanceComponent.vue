<template>

<div>


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


<div class="clock">


{{ clock }}


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

:src="employee.photo"

class="photo"

>





<div class="employee-name">


{{ employee.name }}


</div>








<div class="row">



<div class="col-6">



<div class="info">


<i class="bi bi-person-badge"></i>



<br>


Employee No


<br>



<span>


{{ employee.employee_no }}


</span>



</div>



</div>








<div class="col-6">



<div class="info">



<i class="bi bi-building"></i>



<br>



Department


<br>



<span>


{{ employee.department }}


</span>



</div>



</div>





</div>








<div class="status-card">


<i class="bi bi-check-circle-fill"></i>



{{ employee.status }}



</div>







<h3 class="mt-4">


<i class="bi bi-clock-history"></i>


{{ employee.time }}



</h3>






<button

@click="testTimeIn"

class="btn btn-warning btn-lg mt-3">


<i class="bi bi-fingerprint"></i>


TEST FINGERPRINT


</button>







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






<tbody>




<tr v-if="attendance.length == 0">


<td colspan="5" class="text-center">


No Attendance Record


</td>



</tr>







<tr

v-for="item in attendance"

:key="item.time"

>



<td>



<img

:src="item.photo"

class="avatar"


>



</td>





<td>


{{item.name}}


</td>






<td>


{{item.department}}


</td>






<td>


{{item.time}}


</td>






<td>



<span class="badge-in">


{{item.status}}


</span>



</td>







</tr>





</tbody>





</table>







</div>


</div>







</div>


</div>



</div>


</template>
