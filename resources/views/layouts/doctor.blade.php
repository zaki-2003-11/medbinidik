<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Doctor Panel</title>

    @vite(['resources/css/app.css'])

</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">

        {{-- Sidebar --}}

        <aside class="w-64 bg-blue-900 text-white">

            <div class="p-6">

                <h1 class="text-2xl font-bold">

                    MED BIN IDIK

                </h1>

                <p class="text-sm text-blue-200">

                    Doctor Panel

                </p>

            </div>

            <nav class="mt-8">

                <a href="{{ route('doctor.dashboard') }}" class="block px-6 py-3 hover:bg-blue-800">

                    Dashboard

                </a>

                <a href="{{ route('doctor.appointments.index') }}" class="block px-6 py-3 hover:bg-blue-800">

                    Appointments

                </a>

                <a href="#" class="block px-6 py-3 hover:bg-blue-800">

                    Patients

                </a>

                <a href="#" class="block px-6 py-3 hover:bg-blue-800">

                    Consultations

                </a>

                <a href="#" class="block px-6 py-3 hover:bg-blue-800">

                    Prescriptions

                </a>

                <a href="#" class="block px-6 py-3 hover:bg-blue-800">

                    Profile

                </a>

            </nav>

        </aside>

        {{-- Content --}}

        <div class="flex-1">

            <header class="bg-white shadow px-8 py-5 flex justify-between">

                <h2 class="text-2xl font-semibold">

                    @yield('title')

                </h2>

                <div class="flex items-center gap-5">

                    <span>

                        Dr.
                        {{ auth()->user()->first_name }}
                        {{ auth()->user()->last_name }}

                    </span>

                    <form method="POST" action="{{ route('logout') }}">

                        @csrf

                        <button class="bg-red-600 text-white px-4 py-2 rounded">

                            Logout

                        </button>

                    </form>

                </div>

            </header>

            <main class="p-8">

                @yield('content')

            </main>

        </div>

    </div>

</body>

</html>
