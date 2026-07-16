<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MED BIN IDIK</title>

    @vite(['resources/css/app.css'])

</head>

<body class="bg-gray-100">

    <div class="max-w-4xl mx-auto mt-16">

        <div class="bg-white rounded-xl shadow-lg p-10">

            <div class="flex flex-col items-center">

                <img src="{{ asset('images/logo medbinidik.png') }}" alt="MED BIN IDIK Logo" class="w-28 h-28 object-contain mb-5">

                <h1 class="text-4xl font-bold text-blue-700">

                    MED BIN IDIK

                </h1>

                <p class="text-center text-gray-500 mt-3">

                    Medical Appointment Management System

                </p>

            </div>

            <hr class="my-8">

            <h2 class="text-xl font-semibold mb-5">

                Authentication
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                <a href="{{ route('login') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white rounded-lg p-4 text-center">

                    Login

                </a>

                <a href="{{ route('patient.register') }}"
                    class="bg-green-600 hover:bg-green-700 text-white rounded-lg p-4 text-center">

                    Register Patient

                </a>

                <a href="{{ route('doctor.register') }}"
                    class="bg-purple-600 hover:bg-purple-700 text-white rounded-lg p-4 text-center">

                    Register Doctor

                </a>

            </div>

            <hr class="my-8">

            <h2 class="text-xl font-semibold mb-5">

                Administration
            </h2>
            <hr class="my-8">

            <h2 class="text-xl font-semibold mb-5">
                Session
            </h2>

            @auth

                <div class="mb-4 p-4 rounded-lg bg-green-100 border border-green-300">
                    <p>
                        <strong>Logged in as:</strong>
                        {{ auth()->user()->first_name }}
                        {{ auth()->user()->last_name }}
                    </p>

                    <p>
                        <strong>Role:</strong>
                        {{ ucfirst(auth()->user()->role) }}
                    </p>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                        class="w-full bg-red-600 hover:bg-red-700 text-white rounded-lg p-4 font-semibold">
                        Logout
                    </button>
                </form>
            @else
                <div class="p-4 rounded-lg bg-yellow-100 border border-yellow-300">
                    No user is currently logged in.
                </div>

            @endauth
            <a href="{{ route('admin.dashboard') }}"
                class="block bg-red-600 hover:bg-red-700 text-white rounded-lg p-4 text-center">

                Admin Dashboard

            </a>

        </div>

    </div>

</body>

</html>
