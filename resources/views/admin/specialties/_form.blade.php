@csrf

<div class="mb-5">

    <label class="block mb-2 font-semibold">

        Name

    </label>

    <input type="text" name="name" value="{{ old('name', $specialty->name ?? '') }}"
        class="w-full border rounded-lg px-4 py-2" required>

</div>

<div class="mb-5">

    <label class="block mb-2 font-semibold">

        Description

    </label>

    <textarea name="description" rows="4" class="w-full border rounded-lg px-4 py-2">{{ old('description', $specialty->description ?? '') }}</textarea>

</div>

<button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">

    Save

</button>
