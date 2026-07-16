@extends('layouts.doctor')

@section('title','Appointments')

@section('content')

<div class="max-w-7xl mx-auto py-8">

    <div class="flex justify-between items-center mb-6">

        <div>

            <h1 class="text-3xl font-bold">
                My Appointments
            </h1>

            <p class="text-gray-500">
                Manage patient appointment requests.
            </p>

        </div>

    </div>

    @if(session('success'))

        <div class="mb-5 rounded-lg bg-green-100 border border-green-300 p-4 text-green-700">

            {{ session('success') }}

        </div>

    @endif

    <div class="bg-white rounded-xl shadow p-6">

        <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search patient..."
                class="border rounded-lg p-2">

            <select
                name="status"
                class="border rounded-lg p-2">

                <option value="">All Status</option>

                <option value="pending"
                    @selected(request('status')=='pending')>
                    Pending
                </option>

                <option value="confirmed"
                    @selected(request('status')=='confirmed')>
                    Confirmed
                </option>

                <option value="completed"
                    @selected(request('status')=='completed')>
                    Completed
                </option>

                <option value="rejected"
                    @selected(request('status')=='rejected')>
                    Rejected
                </option>

            </select>

            <button
                class="bg-blue-600 hover:bg-blue-700 text-white rounded-lg">

                Search

            </button>

        </form>

        <table class="w-full">

            <thead>

            <tr class="border-b">

                <th class="text-left py-3">Patient</th>

                <th>Date</th>

                <th>Time</th>

                <th>Status</th>

                <th>Action</th>

            </tr>

            </thead>

            <tbody>

            @forelse($appointments as $appointment)

                <tr class="border-b">

                    <td class="py-4">

                        {{ $appointment->patient->user->first_name }}

                        {{ $appointment->patient->user->last_name }}

                    </td>

                    <td>

                        {{ $appointment->appointment_date }}

                    </td>

                    <td>

                        {{ $appointment->start_time }}

                        -

                        {{ $appointment->end_time }}

                    </td>

                    <td>

                        @switch($appointment->status)

                            @case('pending')

                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">
                                    Pending
                                </span>

                                @break

                            @case('confirmed')

                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">
                                    Confirmed
                                </span>

                                @break

                            @case('completed')

                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full">
                                    Completed
                                </span>

                                @break

                            @case('rejected')

                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">
                                    Rejected
                                </span>

                                @break

                        @endswitch

                    </td>

                    <td>

                        <a
                            href="{{ route('doctor.appointments.show',$appointment) }}"
                            class="text-blue-600 font-semibold">

                            View

                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center py-8">

                        No appointments found.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        <div class="mt-6">

            {{ $appointments->links() }}

        </div>

    </div>

</div>

@endsection