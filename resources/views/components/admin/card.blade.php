<div class="bg-white rounded-xl shadow p-6">

    @isset($title)
        <h2 class="text-xl font-semibold mb-5">
            {{ $title }}
        </h2>
    @endisset

    {{ $slot }}

</div>