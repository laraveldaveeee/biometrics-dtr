@extends('layouts.app')


@section('content')


<div class="container">


<div class="card

border-0

shadow-sm">


<div class="card-body

p-5">


<h3 class="fw-bold">


Add Work Schedule


</h3>


<hr>



<form

action="{{

route(

'work-schedules.store'

)

}}"

method="POST">


@csrf



<div class="mb-3">


<label>


Schedule Name


</label>


<input

name="schedule_name"

class="form-control"

placeholder="

Regular Office Schedule

"

required>


</div>



<div class="row">


<div class="col-md-6">


<label>


Office Time In


</label>


<input

type="time"

name="time_in"

class="form-control"

required>


</div>



<div class="col-md-6">


<label>


Office Time Out


</label>


<input

type="time"

name="time_out"

class="form-control"

required>


</div>


</div>



<div class="mt-3">


<label>


Grace Period


</label>


<input

type="number"

name="grace_period"

value="15"

class="form-control">


</div>



<div class="row

mt-3">


<div class="col">


<label>


Break Start


</label>


<input

type="time"

name="break_start"

class="form-control">


</div>



<div class="col">


<label>


Break End


</label>


<input

type="time"

name="break_end"

class="form-control">


</div>


</div>



<h5 class="mt-4">


Working Days


</h5>



@foreach(

[

'Monday',

'Tuesday',

'Wednesday',

'Thursday',

'Friday',

'Saturday',

'Sunday'

]

as

$day

)


<label class="me-3">


<input

type="checkbox"

name="working_days[]"

value="{{

$day

}}">


{{

$day

}}


</label>


@endforeach



<div class="mt-4">


<label>


<input

type="checkbox"

name="status"

checked>


Active Schedule


</label>


</div>



<button

class="btn

btn-primary

mt-4">


Save Schedule


</button>


</form>


</div>


</div>


</div>


@endsection