@props([
    'color' => 'blue',
    'href' => null,
])

@php

$colors = [

    'blue' => 'bg-blue-600 hover:bg-blue-700',

    'green' => 'bg-green-600 hover:bg-green-700',

    'red' => 'bg-red-600 hover:bg-red-700',

    'yellow' => 'bg-yellow-500 hover:bg-yellow-600',

];

@endphp

@if($href)

<a href="{{ $href }}"
   {{ $attributes->merge([
        'class' => $colors[$color] . ' text-white px-4 py-2 rounded-lg'
   ]) }}>

    {{ $slot }}

</a>

@else

<button
    {{ $attributes->merge([
        'class' => $colors[$color] . ' text-white px-4 py-2 rounded-lg'
    ]) }}>

    {{ $slot }}

</button>

@endif