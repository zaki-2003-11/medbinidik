<x-guest-layout>

    <form method="POST" action="{{ route('patient.register.store') }}">
        @csrf

        <h2 class="text-2xl font-bold text-center mb-6">
            Patient Registration
        </h2>

        <!-- First Name -->
        <div class="mt-4">
            <x-input-label for="first_name" value="First Name" />
            <x-text-input
                id="first_name"
                class="block mt-1 w-full"
                type="text"
                name="first_name"
                :value="old('first_name')"
                required
                autofocus
            />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2"/>
        </div>

        <!-- Last Name -->
        <div class="mt-4">
            <x-input-label for="last_name" value="Last Name" />
            <x-text-input
                id="last_name"
                class="block mt-1 w-full"
                type="text"
                name="last_name"
                :value="old('last_name')"
                required
            />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2"/>
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" value="Email" />
            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phone" value="Phone Number" />
            <x-text-input
                id="phone"
                class="block mt-1 w-full"
                type="text"
                name="phone"
                :value="old('phone')"
                required
            />
            <x-input-error :messages="$errors->get('phone')" class="mt-2"/>
        </div>

        <!-- Date of Birth -->
        <div class="mt-4">
            <x-input-label for="date_of_birth" value="Date of Birth" />
            <x-text-input
                id="date_of_birth"
                class="block mt-1 w-full"
                type="date"
                name="date_of_birth"
                :value="old('date_of_birth')"
                required
            />
            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2"/>
        </div>

        <!-- Gender -->
        <div class="mt-4">
            <x-input-label for="gender" value="Gender" />

            <select
                name="gender"
                id="gender"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
            >
                <option value="">Choose...</option>

                <option value="male"
                    {{ old('gender') == 'male' ? 'selected' : '' }}>
                    Male
                </option>

                <option value="female"
                    {{ old('gender') == 'female' ? 'selected' : '' }}>
                    Female
                </option>

            </select>

            <x-input-error :messages="$errors->get('gender')" class="mt-2"/>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="Password" />
            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label
                for="password_confirmation"
                value="Confirm Password"
            />

            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required
            />
        </div>

        <div class="flex items-center justify-end mt-6">

            <a
                class="underline text-sm text-gray-600 hover:text-gray-900"
                href="{{ route('login') }}"
            >
                Already registered?
            </a>

            <x-primary-button class="ms-4">
                Register
            </x-primary-button>

        </div>

    </form>

</x-guest-layout>