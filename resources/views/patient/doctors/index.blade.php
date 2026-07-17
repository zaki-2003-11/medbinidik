@extends('layouts.patient')

@section('content')
    <h1 class="text-3xl font-bold mb-6">

        Find a Doctor

    </h1>
    <form method="GET" class="bg-white shadow rounded-lg p-5 mb-6">

        <div class="grid md:grid-cols-3 gap-4">

            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search doctor..."
                class="border rounded-lg px-3 py-2">

            <select name="specialty" class="border rounded-lg px-3 py-2">

                <option value="">

                    All Specialties

                </option>

                @foreach ($specialties as $specialty)
                    <option value="{{ $specialty->id }}" @selected(request('specialty') == $specialty->id)>

                        {{ $specialty->name }}

                    </option>
                @endforeach

            </select>

            <button class="bg-blue-600 text-white rounded-lg">

                Search

            </button>

        </div>

    </form>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach ($doctors as $doctor)
            <div class="bg-white rounded-xl shadow p-6">

                <h2 class="text-xl font-bold">

                    Dr.
                    {{ $doctor->user->first_name }}
                    {{ $doctor->user->last_name }}

                </h2>

                <p class="text-gray-600">

                    {{ $doctor->specialty->name }}

                </p>

                <p>

                    {{ $doctor->years_experience }} years experience

                </p>

                <p>

                    {{ number_format($doctor->consultation_fee, 2) }} DH

                </p>

                <p>

                    ⭐ {{ number_format($doctor->average_rating, 1) }}

                </p>

                <a href="{{ route('patient.doctors.show', $doctor) }}"
                    class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">

                    View Profile

                </a>

            </div>
        @endforeach

    </div>

    <div class="mt-6">

        {{ $doctors->links() }}

    </div>

    {{ $doctors->links() }}
@endsection
