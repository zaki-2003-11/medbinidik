<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | MED BIN IDIK</title>

    @vite(['resources/css/app.css'])

</head>

<body class="bg-gray-100">

    <nav class="bg-blue-700 text-white shadow">

        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <div>

                <h1 class="text-2xl font-bold">

                    MED BIN IDIK

                </h1>

                <p class="text-sm text-blue-100">

                    Patient Space

                </p>

            </div>

            <div class="flex gap-3">

                <a href="{{ route('patient.dashboard') }}" class="hover:underline">

                    Dashboard

                </a>

                <a href="{{ route('patient.doctors.index') }}" class="hover:underline">

                    Doctors

                </a>
                <a href="{{ route('patient.appointments.index') }}" class="hover:underline">

                    My Appointments

                </a>

                <a href="{{ route('patient.consultations.index') }}" class="hover:underline">

                    Medical History

                </a>
                   <a href="{{ route('profile.edit') }}" class="hover:underline">

                    Profile

                </a>

                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button class="bg-red-600 px-4 py-1 rounded">

                        Logout

                    </button>

                </form>

            </div>

        </div>

    </nav>

    <div class="py-8 px-6">

        @if (session('success'))
            <div class="max-w-7xl mx-auto mb-6 bg-green-100 border border-green-300 text-green-700 p-4 rounded">

                {{ session('success') }}

            </div>
        @endif

        @yield('content')

    </div>

</body>

</html>
