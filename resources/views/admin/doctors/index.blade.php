@extends('admin.layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold">

            Doctors

        </h1>

        <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-lg">

            Total : {{ $doctors->total() }}

        </span>

    </div>
    <form method="GET" class="bg-white rounded-xl shadow p-4 mb-6">

        <div class="grid md:grid-cols-4 gap-4">

            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search doctor..."
                class="border rounded-lg px-3 py-2">

            <select name="status" class="border rounded-lg px-3 py-2">

                <option value="">All Status</option>

                <option value="pending" @selected(request('status') == 'pending')>

                    Pending

                </option>

                <option value="approved" @selected(request('status') == 'approved')>

                    Approved

                </option>

                <option value="rejected" @selected(request('status') == 'rejected')>

                    Rejected

                </option>

            </select>

            <select name="specialty" class="border rounded-lg px-3 py-2">

                <option value="">All Specialties</option>

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
    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="min-w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="p-4">Doctor</th>

                    <th class="p-4">Specialty</th>

                    <th class="p-4">Experience</th>

                    <th class="p-4">Fee</th>

                    <th class="p-4">Status</th>

                    <th class="p-4">Rating</th>

                    <th class="p-4">Actions</th>

                </tr>

            </thead>

            <tbody>

                @forelse($doctors as $doctor)
                    <tr class="border-t">

                        <td class="p-4">

                            <strong>

                                {{ $doctor->user->first_name }}

                                {{ $doctor->user->last_name }}

                            </strong>

                            <br>

                            <small>

                                {{ $doctor->user->email }}

                            </small>

                        </td>

                        <td class="p-4">

                            {{ $doctor->specialty->name }}

                        </td>

                        <td class="p-4">

                            {{ $doctor->years_experience }} years

                        </td>

                        <td class="p-4">

                            {{ number_format($doctor->consultation_fee, 2) }} DH

                        </td>

                        <td class="p-4">
                            @if ($doctor->approval_status == 'approved')
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">

                                    Approved

                                </span>
                            @elseif($doctor->approval_status == 'pending')
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">

                                    Pending

                                </span>
                            @else
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">

                                    Rejected

                                </span>
                            @endif
                        </td>

                        <td class="p-4">

                            ⭐ {{ $doctor->average_rating }}

                        </td>

                        <td class="p-4">
                            <a href="{{ route('admin.doctors.show', $doctor) }}" class="text-blue-600">

                                View

                            </a>
                             |
                            <a href="{{ route('admin.doctors.edit', $doctor) }}" class="text-indigo-600">

                                Edit

                            </a>

                            @if ($doctor->approval_status == 'pending')
                                |

                                <form method="POST" action="{{ route('admin.doctors.approve', $doctor) }}" class="inline">

                                    @csrf
                                    @method('PATCH')

                                    <button class="text-green-600">

                                        Approve

                                    </button>

                                </form>

                                |

                                <form method="POST" action="{{ route('admin.doctors.reject', $doctor) }}" class="inline">

                                    @csrf
                                    @method('PATCH')

                                    <button class="text-red-600">

                                        Reject

                                    </button>

                                </form>
                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center p-6">

                            No doctors found.

                        </td>

                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-6">

        {{ $doctors->links() }}

    </div>
@endsection
