@extends('layouts.patient')

@section('title', 'My Medical History')

@section('content')

<div class="max-w-7xl mx-auto">

    <h1 class="text-3xl font-bold mb-8">

        My Medical History

    </h1>

    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-blue-600 text-white">

                <tr>

                    <th class="p-4 text-left">Reference</th>

                    <th class="p-4 text-left">Doctor</th>

                    <th class="p-4 text-left">Specialty</th>

                    <th class="p-4 text-left">Date</th>

                    <th class="p-4 text-left">Action</th>

                </tr>

            </thead>

            <tbody>

            @forelse($consultations as $consultation)

                <tr class="border-b">

                    <td class="p-4">

                        {{ $consultation->reference }}

                    </td>

                    <td class="p-4">

                        Dr.
                        {{ $consultation->appointment->doctor->user->first_name }}
                        {{ $consultation->appointment->doctor->user->last_name }}

                    </td>

                    <td class="p-4">

                        {{ $consultation->appointment->doctor->specialty->name }}

                    </td>

                    <td class="p-4">

                        {{ $consultation->appointment->appointment_date }}

                    </td>

                    <td class="p-4">

                        <a
                            href="{{ route('patient.consultations.show',$consultation) }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">

                            View

                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center p-8">

                        No consultations found.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection