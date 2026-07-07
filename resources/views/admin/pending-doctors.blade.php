<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl">
        Pending Doctors
    </h2>
</x-slot>

<div class="py-8">

<div class="max-w-7xl mx-auto">

@if(session('success'))

<div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
    {{ session('success') }}
</div>

@endif

<table class="min-w-full bg-white shadow rounded">

<thead>

<tr>

<th class="p-3 text-left">Doctor</th>
<th class="p-3 text-left">Email</th>
<th class="p-3 text-left">Specialty</th>
<th class="p-3 text-left">Phone</th>
<th class="p-3 text-center">Actions</th>

</tr>

</thead>

<tbody>

@forelse($doctors as $doctor)

<tr class="border-t">

<td class="p-3">
    {{ $doctor->user->first_name }}
    {{ $doctor->user->last_name }}
</td>

<td class="p-3">
    {{ $doctor->user->email }}
</td>

<td class="p-3">
    {{ $doctor->specialty->name }}
</td>

<td class="p-3">
    {{ $doctor->phone }}
</td>

<td class="p-3 text-center">

<form
action="{{ route('admin.doctors.approve',$doctor) }}"
method="POST"
class="inline">

@csrf
@method('PATCH')

<button
class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded">

Approve

</button>

</form>

<form
action="{{ route('admin.doctors.reject',$doctor) }}"
method="POST"
class="inline">

@csrf
@method('PATCH')

<button
class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded">

Reject

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="5" class="p-4 text-center">

No pending doctors.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</x-app-layout>