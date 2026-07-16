<!DOCTYPE html>
<html>

<head>

    <title>Patient Panel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100">

    <nav class="bg-blue-700 text-white p-4">

        <div class="container mx-auto flex justify-between">

            <h1 class="font-bold">

                Patient Panel

            </h1>

            <div class="space-x-4">

                <a href="{{ route('patient.dashboard') }}">
                    Dashboard
                </a>

                <a href="{{ route('patient.doctors.index') }}">
                    Doctors
                </a>

                <a href="{{ route('patient.appointments.index') }}">
                    My Appointments
                </a>

                <a href="{{ route('profile.edit') }}">
                    Profile
                </a>

            </div>

        </div>

    </nav>

    <div class="container mx-auto mt-8">

        @include('partials.alert')

        @yield('content')

    </div>

</body>

</html>
