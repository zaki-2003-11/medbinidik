@extends('admin.layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Edit Doctor
</h1>

<form method="POST"
      action="{{ route('admin.doctors.update',$doctor) }}"
      class="bg-white shadow rounded-xl p-6">

    @csrf
    @method('PUT')

    <div class="grid grid-cols-2 gap-6">

        <div>

            <label class="font-semibold">
                First Name
            </label>

            <input
                type="text"
                name="first_name"
                value="{{ old('first_name',$doctor->user->first_name) }}"
                class="w-full border rounded-lg p-2">

        </div>

        <div>

            <label class="font-semibold">
                Last Name
            </label>

            <input
                type="text"
                name="last_name"
                value="{{ old('last_name',$doctor->user->last_name) }}"
                class="w-full border rounded-lg p-2">

        </div>

        <div>

            <label class="font-semibold">
                Phone
            </label>

            <input
                type="text"
                name="phone"
                value="{{ old('phone',$doctor->phone) }}"
                class="w-full border rounded-lg p-2">

        </div>

        <div>

            <label class="font-semibold">
                Specialty
            </label>

            <select
                name="specialty_id"
                class="w-full border rounded-lg p-2">

                @foreach($specialties as $specialty)

                    <option
                        value="{{ $specialty->id }}"
                        @selected($doctor->specialty_id==$specialty->id)>

                        {{ $specialty->name }}

                    </option>

                @endforeach

            </select>

        </div>

        <div>

            <label class="font-semibold">
                Experience
            </label>

            <input
                type="number"
                name="years_experience"
                value="{{ old('years_experience',$doctor->years_experience) }}"
                class="w-full border rounded-lg p-2">

        </div>

        <div>

            <label class="font-semibold">
                Consultation Fee
            </label>

            <input
                type="number"
                step="0.01"
                name="consultation_fee"
                value="{{ old('consultation_fee',$doctor->consultation_fee) }}"
                class="w-full border rounded-lg p-2">

        </div>

    </div>

    <div class="mt-6">

        <button
            class="bg-blue-600 text-white px-5 py-2 rounded-lg">

            Update Doctor

        </button>

    </div>

</form>

@endsection