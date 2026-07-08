@extends('layouts.app')

@section('content')

<div class="grid grid-cols-4 gap-6">

    <div class="bg-white rounded-lg shadow p-5">

        <h2 class="text-gray-500">

            Employees

        </h2>

        <h1 class="text-4xl font-bold">

            

        </h1>

    </div>

    <div class="bg-green-500 text-white rounded-lg shadow p-5">

        <h2>

            Present

        </h2>

        <h1 class="text-4xl font-bold">

            

        </h1>

    </div>

    <div class="bg-yellow-500 text-white rounded-lg shadow p-5">

        <h2>

            Late

        </h2>

        <h1 class="text-4xl font-bold">

            

        </h1>

    </div>

    <div class="bg-red-500 text-white rounded-lg shadow p-5">

        <h2>

            Absent

        </h2>

        <h1 class="text-4xl font-bold">
 

        </h1>

    </div>

</div>

@endsection