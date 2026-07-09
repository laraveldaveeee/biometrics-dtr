<?php

namespace App\Http\Controllers;

use App\WorkSchedule;
use Illuminate\Http\Request;

class WorkScheduleController extends Controller
{

    // WORK SCHEDULE LIST

    public function index()
    {
        $schedules = WorkSchedule::latest()
            ->paginate(10);

        return view(
            'work-schedules.index',
            compact('schedules')
        );
    }


    // ADD PAGE

    public function create()
    {
        return view(
            'work-schedules.create'
        );
    }


    // SAVE

    public function store(
        Request $request
    ) {

        $request->validate([

            'schedule_name'
                => 'required|max:255',

            'time_in'
                => 'required',

            'time_out'
                => 'required',

            'grace_period'
                => 'required|integer|min:0',

            'working_days'
                => 'required|array'

        ]);


        WorkSchedule::create([

            'schedule_name'
                => $request->schedule_name,

            'time_in'
                => $request->time_in,

            'time_out'
                => $request->time_out,

            'grace_period'
                => $request->grace_period,

            'break_start'
                => $request->break_start,

            'break_end'
                => $request->break_end,

            'working_days'
                => implode(
                    ',',
                    $request->working_days
                ),

            'status'
                => $request->has('status')

        ]);


        return redirect()

            ->route(
                'work-schedules.index'
            )

            ->with(

                'success',

                'Work schedule added successfully!'

            );

    }


    // EDIT PAGE

    public function edit($id)
    {

        $schedule =

            WorkSchedule::findOrFail($id);


        return view(

            'work-schedules.edit',

            compact('schedule')

        );

    }


    // UPDATE

    public function update(

        Request $request,

        $id

    ) {

        $schedule =

            WorkSchedule::findOrFail($id);


        $request->validate([

            'schedule_name'
                => 'required|max:255',

            'time_in'
                => 'required',

            'time_out'
                => 'required',

            'grace_period'
                => 'required|integer|min:0',

            'working_days'
                => 'required|array'

        ]);


        $schedule->update([

            'schedule_name'
                => $request->schedule_name,

            'time_in'
                => $request->time_in,

            'time_out'
                => $request->time_out,

            'grace_period'
                => $request->grace_period,

            'break_start'
                => $request->break_start,

            'break_end'
                => $request->break_end,

            'working_days'
                => implode(
                    ',',
                    $request->working_days
                ),

            'status'
                => $request->has('status')

        ]);


        return redirect()

            ->route(
                'work-schedules.index'
            )

            ->with(

                'success',

                'Work schedule updated successfully!'

            );

    }


    // DELETE

    public function destroy($id)
    {

        $schedule =

            WorkSchedule::findOrFail($id);


        $schedule->delete();


        return redirect()

            ->route(
                'work-schedules.index'
            )

            ->with(

                'success',

                'Work schedule deleted successfully!'

            );

    }

}