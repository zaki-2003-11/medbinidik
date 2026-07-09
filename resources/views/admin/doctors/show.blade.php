@extends('admin.layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">

Doctor Profile

</h1>

<div class="bg-white rounded-xl shadow p-8">

    <div class="grid md:grid-cols-2 gap-8">

        <div>

            <h2 class="text-xl font-bold mb-5">

                Personal Information

            </h2>

            <p><strong>Name:</strong>
                {{ $doctor->user->first_name }}
                {{ $doctor->user->last_name }}
            </p>

            <p><strong>Email:</strong>
                {{ $doctor->user->email }}
            </p>

            <p><strong>Phone:</strong>
                {{ $doctor->phone }}
            </p>

            <p><strong>Gender:</strong>
                {{ ucfirst($doctor->gender) }}
            </p>

            <p><strong>Date of Birth:</strong>
                {{ $doctor->date_of_birth }}
            </p>

        </div>

        <div>

            <h2 class="text-xl font-bold mb-5">

                Professional Information

            </h2>

            <p><strong>Specialty:</strong>
                {{ $doctor->specialty->name }}
            </p>

            <p><strong>License:</strong>
                {{ $doctor->license_number }}
            </p>

            <p><strong>Experience:</strong>
                {{ $doctor->years_experience }} years
            </p>

            <p><strong>Consultation Fee:</strong>
                {{ $doctor->consultation_fee }} DH
            </p>

            <p><strong>Status:</strong>
                {{ ucfirst($doctor->approval_status) }}
            </p>

            <p><strong>Rating:</strong>
                ⭐ {{ $doctor->average_rating }}
            </p>

        </div>

    </div>

</div>

@endsection