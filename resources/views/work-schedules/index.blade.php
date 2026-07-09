@extends('layouts.app')


@section('content')


<div class="container-fluid">


<div class="d-flex

justify-content-between

align-items-center

mb-4">


<div>


<h2 class="fw-bold">


<i class="bi

bi-clock-fill

text-primary">


</i>


Work Schedules


</h2>


<p class="text-secondary">


Manage office working hours


</p>


</div>



<a

href="{{

route(

'work-schedules.create'

)

}}"

class="btn

btn-primary">


<i class="bi

bi-plus-circle">


</i>


Add Schedule


</a>


</div>




@if(

session('success')

)


<div class="alert

alert-success">


{{

session('success')

}}


</div>


@endif




<div class="card

border-0

shadow-sm">


<div class="card-body">


<div class="table-responsive">


<table class="table

align-middle">


<thead>


<tr>


<th>

Schedule

</th>


<th>

Time In

</th>


<th>

Time Out

</th>


<th>

Grace

</th>


<th>

Break

</th>


<th>

Working Days

</th>


<th>

Status

</th>


<th>

Actions

</th>


</tr>


</thead>


<tbody>



@forelse(

$schedules

as

$schedule

)


<tr>


<td>


<strong>


{{

$schedule

->schedule_name

}}


</strong>


</td>



<td>


<span class="text-success

fw-bold">


{{

\Carbon\Carbon

::parse(

$schedule

->time_in

)

->format(

'h:i A'

)

}}


</span>


</td>



<td>


<span class="text-danger

fw-bold">


{{

\Carbon\Carbon

::parse(

$schedule

->time_out

)

->format(

'h:i A'

)

}}


</span>


</td>



<td>


{{

$schedule

->grace_period

}}


minutes


</td>



<td>


@if(

$schedule

->break_start

)


{{

\Carbon\Carbon

::parse(

$schedule

->break_start

)

->format(

'h:i A'

)

}}


-


{{

\Carbon\Carbon

::parse(

$schedule

->break_end

)

->format(

'h:i A'

)

}}


@else


--


@endif


</td>



<td>


{{

$schedule

->working_days

}}


</td>



<td>


@if(

$schedule

->status

)


<span class="badge

bg-success">


ACTIVE


</span>


@else


<span class="badge

bg-secondary">


INACTIVE


</span>


@endif


</td>



<td>


<a

href="{{

route(

'work-schedules.edit',

$schedule->id

)

}}"

class="btn

btn-sm

btn-primary">


<i class="bi

bi-pencil">


</i>


</a>



<form

action="{{

route(

'work-schedules.destroy',

$schedule->id

)

}}"

method="POST"

class="d-inline">


@csrf


@method('DELETE')


<button

class="btn

btn-sm

btn-danger"

onclick="

return confirm(

'Delete schedule?'

)

">


<i class="bi

bi-trash">


</i>


</button>


</form>


</td>


</tr>



@empty


<tr>


<td

colspan="8"

class="text-center

py-5">


No work schedules


</td>


</tr>


@endforelse


</tbody>


</table>


</div>


{{

$schedules

->links()

}}


</div>


</div>


</div>


@endsection