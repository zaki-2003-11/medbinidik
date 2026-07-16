@extends('layouts.doctor')

@section('title', 'New Consultation')

@section('content')

<div class="max-w-6xl mx-auto">

    @if ($errors->any())
        <div class="mb-6 bg-red-100 border border-red-300 text-red-700 rounded-lg p-4">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white shadow rounded-xl p-8">

        <h2 class="text-3xl font-bold mb-8">
            New Consultation
        </h2>

        {{-- Patient & Appointment Information --}}

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">

            <div>

                <h3 class="text-xl font-semibold mb-4">
                    Patient Information
                </h3>

                <p><strong>Name:</strong>
                    {{ $appointment->patient->user->first_name }}
                    {{ $appointment->patient->user->last_name }}
                </p>

                <p class="mt-2">
                    <strong>Email:</strong>
                    {{ $appointment->patient->user->email }}
                </p>

            </div>

            <div>

                <h3 class="text-xl font-semibold mb-4">
                    Appointment
                </h3>

                <p>
                    <strong>Date:</strong>
                    {{ $appointment->appointment_date }}
                </p>

                <p class="mt-2">
                    <strong>Time:</strong>
                    {{ $appointment->start_time }}
                    -
                    {{ $appointment->end_time }}
                </p>

            </div>

        </div>

        <form method="POST"
              action="{{ route('doctor.consultations.store', $appointment) }}">

            @csrf

            <div class="space-y-8">

                {{-- Chief Complaint --}}

                <div>

                    <label class="font-semibold block mb-2">
                        Chief Complaint
                    </label>

                    <textarea
                        name="chief_complaint"
                        rows="3"
                        class="w-full border rounded-lg p-3">{{ old('chief_complaint') }}</textarea>

                </div>

                {{-- Symptoms --}}

                <div>

                    <label class="font-semibold block mb-2">
                        Symptoms
                    </label>

                    <textarea
                        name="symptoms"
                        rows="3"
                        class="w-full border rounded-lg p-3">{{ old('symptoms') }}</textarea>

                </div>

                {{-- Diagnosis --}}

                <div>

                    <label class="font-semibold block mb-2">
                        Diagnosis
                    </label>

                    <textarea
                        name="diagnosis"
                        rows="3"
                        class="w-full border rounded-lg p-3">{{ old('diagnosis') }}</textarea>

                </div>

                {{-- Doctor Notes --}}

                <div>

                    <label class="font-semibold block mb-2">
                        Doctor Notes
                    </label>

                    <textarea
                        name="doctor_notes"
                        rows="5"
                        class="w-full border rounded-lg p-3">{{ old('doctor_notes') }}</textarea>

                </div>

                {{-- Vital Signs --}}

                <div>

                    <h3 class="text-xl font-semibold mb-4">
                        Vital Signs
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                        <div>

                            <label>Weight (kg)</label>

                            <input
                                type="number"
                                step="0.01"
                                name="weight"
                                value="{{ old('weight') }}"
                                class="w-full border rounded-lg p-2">

                        </div>

                        <div>

                            <label>Height (cm)</label>

                            <input
                                type="number"
                                step="0.01"
                                name="height"
                                value="{{ old('height') }}"
                                class="w-full border rounded-lg p-2">

                        </div>

                        <div>

                            <label>Temperature (°C)</label>

                            <input
                                type="number"
                                step="0.1"
                                name="temperature"
                                value="{{ old('temperature') }}"
                                class="w-full border rounded-lg p-2">

                        </div>

                        <div>

                            <label>Blood Pressure</label>

                            <input
                                type="text"
                                name="blood_pressure"
                                value="{{ old('blood_pressure') }}"
                                placeholder="120/80"
                                class="w-full border rounded-lg p-2">

                        </div>

                        <div>

                            <label>Heart Rate</label>

                            <input
                                type="number"
                                name="heart_rate"
                                value="{{ old('heart_rate') }}"
                                class="w-full border rounded-lg p-2">

                        </div>

                        <div>

                            <label>Respiratory Rate</label>

                            <input
                                type="number"
                                name="respiratory_rate"
                                value="{{ old('respiratory_rate') }}"
                                class="w-full border rounded-lg p-2">

                        </div>

                        <div>

                            <label>Oxygen Saturation (%)</label>

                            <input
                                type="number"
                                name="oxygen_saturation"
                                value="{{ old('oxygen_saturation') }}"
                                class="w-full border rounded-lg p-2">

                        </div>

                    </div>

                </div>

                {{-- Follow Up --}}

                <div class="flex items-center gap-3">

                    <input
                        type="checkbox"
                        name="follow_up_required"
                        value="1"
                        {{ old('follow_up_required') ? 'checked' : '' }}>

                    <label>
                        Follow-up Required
                    </label>

                </div>

                <div>

                    <label class="block mb-2">
                        Next Visit Date
                    </label>

                    <input
                        type="date"
                        name="next_visit_date"
                        value="{{ old('next_visit_date') }}"
                        class="border rounded-lg p-2">

                </div>

                <div class="flex gap-4">

                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg">

                        Save Consultation

                    </button>

                    <a href="{{ route('doctor.appointments.index') }}"
                       class="bg-gray-500 hover:bg-gray-600 text-white px-8 py-3 rounded-lg">

                        Cancel

                    </a>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection