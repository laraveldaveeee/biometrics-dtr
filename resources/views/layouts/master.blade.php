<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTC Attendance Management System</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body class="bg-gray-100">

<div class="flex">

    @include('layouts.sidebar')

    <div class="flex-1">

        @include('layouts.navbar')

        <main class="p-6">

            @yield('content')

        </main>

    </div>

</div>

</body>
</html>