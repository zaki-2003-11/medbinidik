@extends('layouts.doctor')

@section('title', 'Dashboard')

@section('content')

<div class="space-y-8">

    <div>

        <h1 class="text-3xl font-bold">

            Welcome Dr.
            {{ auth()->user()->first_name }}
            {{ auth()->user()->last_name }}

        </h1>

        <p class="text-gray-600 mt-2">

            Here's an overview of your activity.

        </p>

    </div>

    {{-- Statistics --}}

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        <div class="bg-white rounded-xl shadow p-6">

            <p class="text-gray-500">
                Total Appointments
            </p>

            <h2 class="text-4xl font-bold text-blue-600 mt-2">
                {{ $totalAppointments }}
            </h2>

        </div>

        <div class="bg-white rounded-xl shadow p-6">

            <p class="text-gray-500">
                Pending
            </p>

            <h2 class="text-4xl font-bold text-yellow-500 mt-2">
                {{ $pendingAppointments }}
            </h2>

        </div>

        <div class="bg-white rounded-xl shadow p-6">

            <p class="text-gray-500">
                Today's Appointments
            </p>

            <h2 class="text-4xl font-bold text-green-600 mt-2">
                {{ $todayAppointments }}
            </h2>

        </div>

        <div class="bg-white rounded-xl shadow p-6">

            <p class="text-gray-500">
                Completed Consultations
            </p>

            <h2 class="text-4xl font-bold text-purple-600 mt-2">
                {{ $completedAppointments }}
            </h2>

        </div>

    </div>

    {{-- Today's Schedule --}}

    <div class="bg-white rounded-xl shadow">

        <div class="p-6 border-b">

            <h2 class="text-xl font-bold">

                Today's Schedule

            </h2>

        </div>

        <div class="p-6">

            @forelse($todaySchedule as $appointment)

                <div class="flex justify-between items-center border-b py-4">

                    <div>

                        <h3 class="font-semibold">

                            {{ $appointment->patient->user->first_name }}
                            {{ $appointment->patient->user->last_name }}

                        </h3>

                        <p class="text-gray-500">

                            {{ $appointment->start_time }}
                            -
                            {{ $appointment->end_time }}

                        </p>

                    </div>

                    <span class="px-3 py-1 rounded bg-blue-100 text-blue-700">

                        {{ ucfirst($appointment->status) }}

                    </span>

                </div>

            @empty

                <p class="text-gray-500">

                    No appointments today.

                </p>

            @endforelse

        </div>

    </div>

    {{-- Recent Appointments --}}

    <div class="bg-white rounded-xl shadow">

        <div class="p-6 border-b">

            <h2 class="text-xl font-bold">

                Recent Appointments

            </h2>

        </div>

        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="text-left px-6 py-3">

                            Patient

                        </th>

                        <th class="text-left px-6 py-3">

                            Date

                        </th>

                        <th class="text-left px-6 py-3">

                            Time

                        </th>

                        <th class="text-left px-6 py-3">

                            Status

                        </th>

                        <th class="text-left px-6 py-3">

                            Action

                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($recentAppointments as $appointment)

                        <tr class="border-b">

                            <td class="px-6 py-4">

                                {{ $appointment->patient->user->first_name }}
                                {{ $appointment->patient->user->last_name }}

                            </td>

                            <td class="px-6 py-4">

                                {{ $appointment->appointment_date }}

                            </td>

                            <td class="px-6 py-4">

                                {{ $appointment->start_time }}

                            </td>

                            <td class="px-6 py-4">

                                {{ ucfirst($appointment->status) }}

                            </td>

                            <td class="px-6 py-4">

                                <a href="{{ route('doctor.appointments.show', $appointment) }}"
                                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">

                                    View

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center py-6 text-gray-500">

                                No appointments found.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection