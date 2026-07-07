<nav class="bg-white shadow">

    <div class="flex justify-between items-center px-8 py-4">

        <h1 class="text-2xl font-semibold">

            Admin Panel

        </h1>

        <div>

            {{ auth()->user()->first_name }}

            {{ auth()->user()->last_name }}

        </div>

    </div>

</nav>