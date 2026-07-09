@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="row justify-content-center">

        <div class="col-lg-9">

            <div class="card border-0 shadow-sm"
                 style="border-radius:20px;">

                <div class="card-body p-5">

                    <!-- HEADER -->

                    <div class="d-flex align-items-center mb-4">

                        <div
                            class="d-flex align-items-center justify-content-center bg-primary text-white me-3"
                            style="
                                width:55px;
                                height:55px;
                                border-radius:15px;
                                font-size:25px;
                            "
                        >

                            <i class="bi bi-clock-history"></i>

                        </div>

                        <div>

                            <h3 class="fw-bold mb-1">

                                Edit Work Schedule

                            </h3>

                            <p class="text-secondary mb-0">

                                Update office working hours and schedule

                            </p>

                        </div>

                    </div>


                    <!-- VALIDATION ERRORS -->

                    @if($errors->any())

                        <div class="alert alert-danger">

                            <div class="fw-bold mb-2">

                                <i class="bi bi-exclamation-circle-fill"></i>

                                Please check the following:

                            </div>

                            <ul class="mb-0">

                                @foreach($errors->all() as $error)

                                    <li>

                                        {{ $error }}

                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    <!-- FORM -->

                    <form
                        action="{{ route('work-schedules.update', $schedule->id) }}"
                        method="POST"
                    >

                        @csrf

                        @method('PUT')


                        <!-- SCHEDULE NAME -->

                        <div class="mb-4">

                            <label class="form-label fw-bold">

                                Schedule Name

                                <span class="text-danger">*</span>

                            </label>

                            <input
                                type="text"
                                name="schedule_name"
                                class="form-control form-control-lg"
                                value="{{ old('schedule_name', $schedule->schedule_name) }}"
                                placeholder="Example: Regular Office Schedule"
                                required
                            >

                        </div>


                        <!-- TIME IN AND TIME OUT -->

                        <div class="row g-4">

                            <div class="col-md-6">

                                <label class="form-label fw-bold">

                                    <i class="bi bi-box-arrow-in-right text-success"></i>

                                    Office Time In

                                    <span class="text-danger">*</span>

                                </label>

                                <input
                                    type="time"
                                    name="time_in"
                                    class="form-control form-control-lg"
                                    value="{{ old('time_in', \Carbon\Carbon::parse($schedule->time_in)->format('H:i')) }}"
                                    required
                                >

                            </div>


                            <div class="col-md-6">

                                <label class="form-label fw-bold">

                                    <i class="bi bi-box-arrow-right text-danger"></i>

                                    Office Time Out

                                    <span class="text-danger">*</span>

                                </label>

                                <input
                                    type="time"
                                    name="time_out"
                                    class="form-control form-control-lg"
                                    value="{{ old('time_out', \Carbon\Carbon::parse($schedule->time_out)->format('H:i')) }}"
                                    required
                                >

                            </div>

                        </div>


                        <!-- GRACE PERIOD -->

                        <div class="mt-4">

                            <label class="form-label fw-bold">

                                <i class="bi bi-hourglass-split text-warning"></i>

                                Grace Period

                            </label>

                            <div class="input-group input-group-lg">

                                <input
                                    type="number"
                                    name="grace_period"
                                    class="form-control"
                                    value="{{ old('grace_period', $schedule->grace_period) }}"
                                    min="0"
                                    max="180"
                                    required
                                >

                                <span class="input-group-text">

                                    Minutes

                                </span>

                            </div>

                            <small class="text-secondary">

                                Employees will not be marked late during the grace period.

                            </small>

                        </div>


                        <!-- BREAK TIME -->

                        <div class="row g-4 mt-1">

                            <div class="col-md-6">

                                <label class="form-label fw-bold">

                                    <i class="bi bi-cup-hot-fill text-primary"></i>

                                    Break Start

                                </label>

                                <input
                                    type="time"
                                    name="break_start"
                                    class="form-control form-control-lg"
                                    value="{{ old(
                                        'break_start',
                                        $schedule->break_start
                                            ? \Carbon\Carbon::parse($schedule->break_start)->format('H:i')
                                            : ''
                                    ) }}"
                                >

                            </div>


                            <div class="col-md-6">

                                <label class="form-label fw-bold">

                                    <i class="bi bi-cup-hot text-primary"></i>

                                    Break End

                                </label>

                                <input
                                    type="time"
                                    name="break_end"
                                    class="form-control form-control-lg"
                                    value="{{ old(
                                        'break_end',
                                        $schedule->break_end
                                            ? \Carbon\Carbon::parse($schedule->break_end)->format('H:i')
                                            : ''
                                    ) }}"
                                >

                            </div>

                        </div>


                        <!-- WORKING DAYS -->

                        @php

                            $selectedDays = old(
                                'working_days',
                                $schedule->working_days
                                    ? explode(',', $schedule->working_days)
                                    : []
                            );

                            $days = [
                                'Monday',
                                'Tuesday',
                                'Wednesday',
                                'Thursday',
                                'Friday',
                                'Saturday',
                                'Sunday'
                            ];

                        @endphp


                        <div class="mt-4">

                            <label class="form-label fw-bold">

                                <i class="bi bi-calendar-week-fill text-primary"></i>

                                Working Days

                                <span class="text-danger">*</span>

                            </label>


                            <div class="row g-3">

                                @foreach($days as $day)

                                    <div class="col-lg-3 col-md-4 col-6">

                                        <div
                                            class="border rounded-3 p-3"
                                            style="background:#f8fafc;"
                                        >

                                            <div class="form-check">

                                                <input
                                                    type="checkbox"
                                                    name="working_days[]"
                                                    value="{{ $day }}"
                                                    id="{{ strtolower($day) }}"
                                                    class="form-check-input"

                                                    {{ in_array(
                                                        $day,
                                                        $selectedDays
                                                    ) ? 'checked' : '' }}
                                                >

                                                <label
                                                    for="{{ strtolower($day) }}"
                                                    class="form-check-label fw-semibold"
                                                >

                                                    {{ $day }}

                                                </label>

                                            </div>

                                        </div>

                                    </div>

                                @endforeach

                            </div>

                        </div>


                        <!-- STATUS -->

                        <div
                            class="mt-4 p-4 border rounded-4"
                            style="background:#f8fafc;"
                        >

                            <div class="form-check form-switch">

                                <input
                                    type="checkbox"
                                    name="status"
                                    value="1"
                                    id="status"
                                    class="form-check-input"

                                    {{ old(
                                        'status',
                                        $schedule->status
                                    ) ? 'checked' : '' }}
                                >

                                <label
                                    for="status"
                                    class="form-check-label"
                                >

                                    <span class="fw-bold">

                                        Active Schedule

                                    </span>

                                    <br>

                                    <small class="text-secondary">

                                        Enable this work schedule for attendance computation.

                                    </small>

                                </label>

                            </div>

                        </div>


                        <!-- BUTTONS -->

                        <div
                            class="d-flex justify-content-end gap-3 mt-5"
                        >

                            <a
                                href="{{ route('work-schedules.index') }}"
                                class="btn btn-light btn-lg px-4"
                            >

                                <i class="bi bi-arrow-left"></i>

                                Cancel

                            </a>


                            <button
                                type="submit"
                                class="btn btn-primary btn-lg px-4"
                            >

                                <i class="bi bi-check-circle-fill"></i>

                                Update Schedule

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection