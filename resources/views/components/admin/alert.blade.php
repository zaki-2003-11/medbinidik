@if(session('success'))

<div
class="mb-5 rounded-lg border border-green-300 bg-green-100 text-green-700 px-4 py-3">

    {{ session('success') }}

</div>

@endif

@if($errors->any())

<div
class="mb-5 rounded-lg border border-red-300 bg-red-100 text-red-700 px-4 py-3">

    {{ $errors->first() }}

</div>

@endif

@if(session('error'))

<div class="mb-5 rounded-lg border border-red-300 bg-red-100 text-red-700 px-4 py-3">

    {{ session('error') }}

</div>

@endif