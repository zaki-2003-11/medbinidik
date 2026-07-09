@extends('admin.layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold">

            Specialties

        </h1>

        <a href="{{ route('specialties.create') }}" class="bg-green-600 text-white px-5 py-2 rounded-lg">

            + Add

        </a>

    </div>

    <x-admin.alert />

    <x-admin.search />

    <div class="mt-6 overflow-x-auto bg-white rounded-xl shadow">

        <table class="min-w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="p-4">#</th>

                    <th class="p-4">Name</th>

                    <th class="p-4">Description</th>

                    <th class="p-4 text-center">Doctors</th>

                    <th class="p-4 text-center">Actions</th>

                </tr>

            </thead>

            <tbody>

                @forelse($specialties as $specialty)
                    <tr class="border-t">

                        <td class="p-4">

                            {{ $specialty->id }}

                        </td>

                        <td class="p-4">

                            {{ $specialty->name }}

                        </td>

                        <td class="p-4">

                            {{ $specialty->description }}

                        </td>
                        <td class="p-4 text-center">

                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full">

                                {{ $specialty->doctors_count }}

                            </span>

                        </td>
                        <td class="p-4 text-center">

                            <a href="{{ route('specialties.edit', $specialty) }}" class="text-blue-600 font-semibold">

                                Edit

                            </a>

                            @if ($specialty->doctors_count == 0)
                                |

                                <form action="{{ route('specialties.destroy', $specialty) }}" method="POST" class="inline">

                                    @csrf
                                    @method('DELETE')

                                    <button onclick="return confirm('Delete this specialty?')"
                                        class="text-red-600 font-semibold">

                                        Delete

                                    </button>

                                </form>
                            @endif

                        </td>
                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="text-center p-6">

                            No specialties found.

                        </td>

                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-6">

        {{ $specialties->links() }}

    </div>
@endsection
