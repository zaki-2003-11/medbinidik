@extends('patient.layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white shadow rounded-xl p-8">

        <div class="flex justify-between items-center mb-8">

            <h1 class="text-3xl font-bold">

                Doctor Profile

            </h1>

            <a
                href="{{ route('patient.doctors.index') }}"
                class="bg-gray-600 text-white px-4 py-2 rounded-lg">

                Back

            </a>

        </div>

        <div class="grid md:grid-cols-2 gap-10">

            <div>

                <h2 class="text-xl font-semibold mb-5">

                    Personal Information

                </h2>

                <p class="mb-2">
                    <strong>Name:</strong>
                    Dr.
                    {{ $doctor->user->first_name }}
                    {{ $doctor->user->last_name }}
                </p>

                <p class="mb-2">
                    <strong>Email:</strong>
                    {{ $doctor->user->email }}
                </p>

                <p class="mb-2">
                    <strong>Phone:</strong>
                    {{ $doctor->phone }}
                </p>

                <p class="mb-2">
                    <strong>Gender:</strong>
                    {{ ucfirst($doctor->gender) }}
                </p>

                <p class="mb-2">
                    <strong>Experience:</strong>
                    {{ $doctor->years_experience }} years
                </p>

            </div>

            <div>

                <h2 class="text-xl font-semibold mb-5">

                    Professional Information

                </h2>

                <p class="mb-2">
                    <strong>Specialty:</strong>
                    {{ $doctor->specialty->name }}
                </p>

                <p class="mb-2">
                    <strong>Consultation Fee:</strong>
                    {{ number_format($doctor->consultation_fee,2) }} DH
                </p>

                <p class="mb-2">
                    <strong>Rating:</strong>
                    ⭐ {{ number_format($doctor->average_rating,1) }}
                </p>

                <p class="mb-2">
                    <strong>Status:</strong>

                    @if($doctor->is_available)

                        <span class="text-green-600 font-semibold">

                            Available

                        </span>

                    @else

                        <span class="text-red-600 font-semibold">

                            Unavailable

                        </span>

                    @endif

                </p>

            </div>

        </div>

        @if($doctor->biography)

            <div class="mt-10">

                <h2 class="text-xl font-semibold mb-3">

                    Biography

                </h2>

                <p class="text-gray-700">

                    {{ $doctor->biography }}

                </p>

            </div>

        @endif

        <div class="mt-10 flex justify-end">

            <a
                href="{{ route('patient.appointments.create',$doctor) }}"
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg">

                Book Appointment

            </a>

        </div>

    </div>

</div>

@endsection