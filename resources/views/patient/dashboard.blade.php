@extends('layouts.patient')

@section('title', 'Patient Dashboard')

@section('content')

<div class="max-w-7xl mx-auto">

    <h1 class="text-3xl font-bold mb-2">

        Welcome,
        {{ auth()->user()->first_name }}
        {{ auth()->user()->last_name }}

    </h1>

    <p class="text-gray-600 mb-8">

        Manage your appointments and medical history.

    </p>

    {{-- Statistics --}}

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">

        <div class="bg-white shadow rounded-xl p-6">

            <h3 class="text-gray-500">
                Total Appointments
            </h3>

            <p class="text-4xl font-bold text-blue-600 mt-2">

                {{ $totalAppointments }}

            </p>

        </div>

        <div class="bg-white shadow rounded-xl p-6">

            <h3 class="text-gray-500">
                Pending
            </h3>

            <p class="text-4xl font-bold text-yellow-500 mt-2">

                {{ $pendingAppointments }}

            </p>

        </div>

        <div class="bg-white shadow rounded-xl p-6">

            <h3 class="text-gray-500">
                Confirmed
            </h3>

            <p class="text-4xl font-bold text-green-600 mt-2">

                {{ $confirmedAppointments }}

            </p>

        </div>

        <div class="bg-white shadow rounded-xl p-6">

            <h3 class="text-gray-500">
                Completed
            </h3>

            <p class="text-4xl font-bold text-purple-600 mt-2">

                {{ $completedAppointments }}

            </p>

        </div>

    </div>

    {{-- Next Appointment --}}

    <div class="bg-white rounded-xl shadow p-6 mb-8">

        <h2 class="text-2xl font-bold mb-5">

            Next Appointment

        </h2>

        @if($nextAppointment)

            <div class="grid md:grid-cols-2 gap-6">

                <div>

                    <p>

                        <strong>Doctor:</strong>

                        Dr.
                        {{ $nextAppointment->doctor->user->first_name }}
                        {{ $nextAppointment->doctor->user->last_name }}

                    </p>

                    <p class="mt-2">

                        <strong>Specialty:</strong>

                        {{ $nextAppointment->doctor->specialty->name }}

                    </p>

                </div>

                <div>

                    <p>

                        <strong>Date:</strong>

                        {{ $nextAppointment->appointment_date }}

                    </p>

                    <p class="mt-2">

                        <strong>Time:</strong>

                        {{ $nextAppointment->start_time }}
                        -
                        {{ $nextAppointment->end_time }}

                    </p>

                    <p class="mt-2">

                        <strong>Status:</strong>

                        {{ ucfirst($nextAppointment->status) }}

                    </p>

                </div>

            </div>

        @else

            <p class="text-gray-500">

                You have no upcoming appointments.

            </p>

        @endif

    </div>

    {{-- Recent Consultations --}}

    <div class="bg-white rounded-xl shadow p-6">

        <h2 class="text-2xl font-bold mb-5">

            Recent Consultations

        </h2>

        @forelse($recentConsultations as $consultation)

            <div class="border rounded-lg p-4 mb-4 flex justify-between items-center">

                <div>

                    <h3 class="font-semibold">

                        Dr.
                        {{ $consultation->appointment->doctor->user->first_name }}
                        {{ $consultation->appointment->doctor->user->last_name }}

                    </h3>

                    <p class="text-gray-600">

                        {{ $consultation->appointment->doctor->specialty->name }}

                    </p>

                    <p class="text-sm text-gray-500">

                        {{ $consultation->appointment->appointment_date }}

                    </p>

                </div>

                <a
                    href="{{ route('patient.consultations.show', $consultation) }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded">

                    View

                </a>

            </div>

        @empty

            <p class="text-gray-500">

                No consultations available.

            </p>

        @endforelse

    </div>

</div>

@endsection