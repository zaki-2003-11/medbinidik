<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Patient Dashboard
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <h1 class="text-3xl font-bold">
                    Welcome {{ auth()->user()->full_name }}
                </h1>

                <p class="mt-4">
                    Your patient space is ready.
                </p>

            </div>

        </div>

    </div>

</x-app-layout>