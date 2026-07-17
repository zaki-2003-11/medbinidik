@extends('layouts.patient')

@section('title', 'Consultation Details')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-xl shadow p-8">

        <h2 class="text-3xl font-bold mb-8">

            Consultation Details

        </h2>

        <div class="grid grid-cols-2 gap-8 mb-8">

            <div>

                <h3 class="font-semibold text-lg mb-3">

                    Doctor

                </h3>

                <p>

                    Dr.
                    {{ $consultation->appointment->doctor->user->first_name }}
                    {{ $consultation->appointment->doctor->user->last_name }}

                </p>

                <p class="mt-2">

                    {{ $consultation->appointment->doctor->specialty->name }}

                </p>

            </div>

            <div>

                <h3 class="font-semibold text-lg mb-3">

                    Appointment

                </h3>

                <p>

                    {{ $consultation->appointment->appointment_date }}

                </p>

                <p>

                    {{ $consultation->appointment->start_time }}
                    -
                    {{ $consultation->appointment->end_time }}

                </p>

            </div>

        </div>

        <hr class="my-8">

        <div class="space-y-6">

            <div>

                <h3 class="font-bold">

                    Chief Complaint

                </h3>

                <p>{{ $consultation->chief_complaint }}</p>

            </div>

            @if($consultation->symptoms)

            <div>

                <h3 class="font-bold">

                    Symptoms

                </h3>

                <p>{{ $consultation->symptoms }}</p>

            </div>

            @endif

            <div>

                <h3 class="font-bold">

                    Diagnosis

                </h3>

                <p>{{ $consultation->diagnosis }}</p>

            </div>

            @if($consultation->doctor_notes)

            <div>

                <h3 class="font-bold">

                    Doctor Notes

                </h3>

                <p>{{ $consultation->doctor_notes }}</p>

            </div>

            @endif

        </div>

        <hr class="my-8">

        <h3 class="text-xl font-bold mb-4">

            Vital Signs

        </h3>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

            <div>

                <strong>Weight</strong>

                <p>{{ $consultation->weight ?? '-' }} kg</p>

            </div>

            <div>

                <strong>Height</strong>

                <p>{{ $consultation->height ?? '-' }} cm</p>

            </div>

            <div>

                <strong>BMI</strong>

                <p>{{ $consultation->bmi ?? '-' }}</p>

            </div>

            <div>

                <strong>Blood Pressure</strong>

                <p>{{ $consultation->blood_pressure ?? '-' }}</p>

            </div>

            <div>

                <strong>Heart Rate</strong>

                <p>{{ $consultation->heart_rate ?? '-' }}</p>

            </div>

            <div>

                <strong>Temperature</strong>

                <p>{{ $consultation->temperature ?? '-' }} °C</p>

            </div>

            <div>

                <strong>Respiratory Rate</strong>

                <p>{{ $consultation->respiratory_rate ?? '-' }}</p>

            </div>

            <div>

                <strong>Oxygen Saturation</strong>

                <p>{{ $consultation->oxygen_saturation ?? '-' }}%</p>

            </div>

        </div>

        @if($consultation->follow_up_required)

        <div class="mt-8 p-4 rounded-lg bg-yellow-100 border border-yellow-300">

            <strong>Next Visit:</strong>

            {{ $consultation->next_visit_date }}

        </div>

        @endif

        <div class="mt-8">

            <a
                href="{{ route('patient.consultations.index') }}"
                class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded">

                Back

            </a>

        </div>

    </div>

</div>

@endsection