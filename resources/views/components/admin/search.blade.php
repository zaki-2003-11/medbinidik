<form method="GET">

    <div class="flex gap-3">

        <input

            type="text"

            name="search"

            value="{{ request('search') }}"

            placeholder="Search..."

            class="border rounded-lg px-4 py-2 flex-1"

        >

        <button

            class="bg-blue-600 text-white px-5 rounded-lg">

            Search

        </button>

    </div>

</form>