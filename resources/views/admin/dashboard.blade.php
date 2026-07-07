@extends('admin.layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">

    Dashboard

</h1>

<div class="grid grid-cols-4 gap-6">

    <div class="bg-white rounded shadow p-6">

        <p class="text-gray-500">

            Doctors

        </p>

        <h2 class="text-4xl font-bold">

            {{ $doctorCount }}

        </h2>

    </div>

    <div class="bg-white rounded shadow p-6">

        <p class="text-gray-500">

            Patients

        </p>

        <h2 class="text-4xl font-bold">

            {{ $patientCount }}

        </h2>

    </div>

    <div class="bg-white rounded shadow p-6">

        <p class="text-gray-500">

            Pending Doctors

        </p>

        <h2 class="text-4xl font-bold text-orange-500">

            {{ $pendingDoctors }}

        </h2>

    </div>

    <div class="bg-white rounded shadow p-6">

        <p class="text-gray-500">

            Appointments

        </p>

        <h2 class="text-4xl font-bold">

            {{ $appointmentCount }}

        </h2>

    </div>

</div>

@endsection