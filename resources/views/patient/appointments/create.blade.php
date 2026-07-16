@extends('patient.layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-white shadow rounded-xl p-8">

        <h1 class="text-3xl font-bold mb-8">
            Book Appointment
        </h1>

        <div class="mb-6">

            <h2 class="text-xl font-semibold">
                Dr. {{ $doctor->user->first_name }} {{ $doctor->user->last_name }}
            </h2>

            <p>{{ $doctor->specialty->name }}</p>

            <p>{{ number_format($doctor->consultation_fee,2) }} DH</p>

            <p>{{ $doctor->location->address }}</p>

        </div>

        <form method="POST"
              action="{{ route('patient.appointments.store') }}">

            @csrf

            <input
                type="hidden"
                name="doctor_id"
                value="{{ $doctor->id }}">

            <div class="mb-4">

                <label>Date</label>

                <input
                    type="date"
                    name="appointment_date"
                    class="w-full border rounded-lg p-2"
                    required>

            </div>

            <div class="grid grid-cols-2 gap-4">

                <div>

                    <label>Start Time</label>

                    <input
                        type="time"
                        name="start_time"
                        class="w-full border rounded-lg p-2"
                        required>

                </div>

                <div>

                    <label>End Time</label>

                    <input
                        type="time"
                        name="end_time"
                        class="w-full border rounded-lg p-2"
                        required>

                </div>

            </div>

            <div class="mt-4">

                <label>Appointment Type</label>

                <select
                    name="appointment_type"
                    class="w-full border rounded-lg p-2">

                    <option value="first_visit">First Visit</option>

                    <option value="follow_up">Follow Up</option>

                    <option value="control">Control</option>

                    <option value="emergency">Emergency</option>

                </select>

            </div>

            <div class="mt-4">

                <label>Reason</label>

                <textarea
                    name="reason"
                    rows="4"
                    class="w-full border rounded-lg p-2"></textarea>

            </div>

            <button
                class="mt-6 bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg">

                Book Appointment

            </button>

        </form>

    </div>

</div>

@endsection