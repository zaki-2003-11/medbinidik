@extends('layouts.doctor')

@section('title', 'Appointment Details')

@section('content')

<div class="max-w-5xl mx-auto">

    @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-300 text-green-700 p-4 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-lg p-8">

        <div class="flex justify-between items-center mb-8">

            <div>

                <h2 class="text-3xl font-bold">

                    Appointment Details

                </h2>

                <p class="text-gray-500">

                    Reference :
                    <strong>{{ $appointment->reference }}</strong>

                </p>

            </div>

            <span
                class="px-4 py-2 rounded-full

                @if($appointment->status == 'pending')
                    bg-yellow-100 text-yellow-700
                @elseif($appointment->status == 'confirmed')
                    bg-green-100 text-green-700
                @elseif($appointment->status == 'completed')
                    bg-blue-100 text-blue-700
                @elseif($appointment->status == 'rejected')
                    bg-red-100 text-red-700
                @else
                    bg-gray-100 text-gray-700
                @endif">

                {{ ucfirst($appointment->status) }}

            </span>

        </div>


        <div class="grid grid-cols-2 gap-8">

            <div>

                <h3 class="font-bold text-lg mb-4">

                    Patient Information

                </h3>

                <p>

                    <strong>Name :</strong>

                    {{ $appointment->patient->user->first_name }}
                    {{ $appointment->patient->user->last_name }}

                </p>

                <p class="mt-2">

                    <strong>Email :</strong>

                    {{ $appointment->patient->user->email }}

                </p>

            </div>

            <div>

                <h3 class="font-bold text-lg mb-4">

                    Appointment

                </h3>

                <p>

                    <strong>Date :</strong>

                    {{ $appointment->appointment_date }}

                </p>

                <p class="mt-2">

                    <strong>Time :</strong>

                    {{ $appointment->start_time }}
                    -
                    {{ $appointment->end_time }}

                </p>

                <p class="mt-2">

                    <strong>Type :</strong>

                    {{ ucfirst(str_replace('_',' ', $appointment->appointment_type)) }}

                </p>

            </div>

        </div>


        <hr class="my-8">


        <h3 class="font-bold text-lg mb-3">

            Reason

        </h3>

        <div class="bg-gray-50 rounded-lg p-4">

            {{ $appointment->reason ?: 'No reason provided.' }}

        </div>


        <div class="flex gap-4 mt-10">

            @if($appointment->status == 'pending')

                <form
                    method="POST"
                    action="{{ route('doctor.appointments.confirm', $appointment) }}">

                    @csrf
                    @method('PATCH')

                    <button
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg">

                        Approve Appointment

                    </button>

                </form>


                <form
                    method="POST"
                    action="{{ route('doctor.appointments.reject', $appointment) }}">

                    @csrf
                    @method('PATCH')

                    <button
                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg">

                        Reject Appointment

                    </button>

                </form>

            @endif


            @if($appointment->status == 'confirmed')

                <a
                    href="{{ route('doctor.consultations.create',$appointment) }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">

                    Start Consultation

                </a>

            @endif


            <a
                href="{{ route('doctor.appointments.index') }}"
                class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg">

                Back

            </a>

        </div>

    </div>

</div>

@endsection