@extends('layouts.patient')

@section('content')
    <h1 class="text-3xl font-bold mb-6">

        My Appointments

    </h1>

    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="p-4 text-left">Reference</th>

                    <th class="p-4 text-left">Doctor</th>

                    <th class="p-4 text-left">Date</th>

                    <th class="p-4 text-left">Time</th>

                    <th class="p-4 text-left">Status</th>

                </tr>

            </thead>

            <tbody>

                @forelse($appointments as $appointment)
                    <tr class="border-t">

                        <td class="p-4">

                            {{ $appointment->reference }}

                        </td>

                        <td class="p-4">

                            Dr.
                            {{ $appointment->doctor->user->first_name }}
                            {{ $appointment->doctor->user->last_name }}

                        </td>

                        <td class="p-4">

                            {{ $appointment->appointment_date }}

                        </td>

                        <td class="p-4">

                            {{ $appointment->start_time }}

                            -

                            {{ $appointment->end_time }}

                        </td>

                        <td class="p-4">

                            @switch($appointment->status)
                                @case('pending')
                                    <span class="text-yellow-600 font-semibold">
                                        Pending
                                    </span>
                                @break

                                @case('confirmed')
                                    <span class="text-green-600 font-semibold">
                                        Confirmed
                                    </span>
                                @break

                                @case('completed')
                                    <span class="text-blue-600 font-semibold">
                                        Completed
                                    </span>
                                @break

                                @case('rejected')
                                    <span class="text-red-600 font-semibold">
                                        Rejected
                                    </span>
                                @break

                                @case('cancelled')
                                    <span class="text-gray-600 font-semibold">
                                        Cancelled
                                    </span>
                                @break
                            @endswitch

                        </td>

                    </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center p-6">

                                No appointments found.

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-6">

            {{ $appointments->links() }}

        </div>
    @endsection
