<x-guest-layout>

    <form method="POST" action="{{ route('doctor.register.store') }}">
        @csrf

        <h2 class="text-2xl font-bold text-center mb-6">
            Doctor Registration
        </h2>

        <!-- First Name -->
        <div class="mt-4">
            <x-input-label for="first_name" value="First Name"/>
            <x-text-input id="first_name" class="block mt-1 w-full"
                type="text"
                name="first_name"
                :value="old('first_name')"
                required />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2"/>
        </div>

        <!-- Last Name -->
        <div class="mt-4">
            <x-input-label for="last_name" value="Last Name"/>
            <x-text-input id="last_name"
                class="block mt-1 w-full"
                type="text"
                name="last_name"
                :value="old('last_name')"
                required />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2"/>
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" value="Email"/>
            <x-text-input id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required />
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phone" value="Phone"/>
            <x-text-input id="phone"
                class="block mt-1 w-full"
                type="text"
                name="phone"
                :value="old('phone')"
                required />
            <x-input-error :messages="$errors->get('phone')" class="mt-2"/>
        </div>

        <!-- Gender -->
        <div class="mt-4">
            <x-input-label for="gender" value="Gender"/>

            <select name="gender"
                    class="block mt-1 w-full rounded-md border-gray-300">

                <option value="">Choose...</option>

                <option value="male">Male</option>

                <option value="female">Female</option>

            </select>

            <x-input-error :messages="$errors->get('gender')" class="mt-2"/>

        </div>

        <!-- Date of Birth -->
        <div class="mt-4">
            <x-input-label for="date_of_birth" value="Date of Birth"/>
            <x-text-input id="date_of_birth"
                class="block mt-1 w-full"
                type="date"
                name="date_of_birth"
                required />
            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2"/>
        </div>

        <!-- Specialty -->
        <div class="mt-4">

            <x-input-label value="Specialty"/>

            <select
                name="specialty_id"
                class="block mt-1 w-full rounded-md border-gray-300">

                @foreach($specialties as $specialty)

                    <option value="{{ $specialty->id }}">
                        {{ $specialty->name }}
                    </option>

                @endforeach

            </select>

        </div>

        <!-- National ID -->

        <div class="mt-4">
            <x-input-label value="National ID"/>
            <x-text-input
                class="block mt-1 w-full"
                type="text"
                name="national_id"/>
        </div>

        <!-- License -->

        <div class="mt-4">
            <x-input-label value="License Number"/>
            <x-text-input
                class="block mt-1 w-full"
                type="text"
                name="license_number"/>
        </div>

        <!-- Experience -->

        <div class="mt-4">
            <x-input-label value="Years of Experience"/>
            <x-text-input
                class="block mt-1 w-full"
                type="number"
                name="years_experience"/>
        </div>

        <!-- Fee -->

        <div class="mt-4">
            <x-input-label value="Consultation Fee"/>
            <x-text-input
                class="block mt-1 w-full"
                type="number"
                step="0.01"
                name="consultation_fee"/>
        </div>

        <!-- Password -->

        <div class="mt-4">
            <x-input-label value="Password"/>
            <x-text-input
                class="block mt-1 w-full"
                type="password"
                name="password"/>
        </div>

        <!-- Confirm Password -->

        <div class="mt-4">
            <x-input-label value="Confirm Password"/>
            <x-text-input
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"/>
        </div>

        <div class="flex justify-end mt-6">

            <x-primary-button>

                Register

            </x-primary-button>

        </div>

    </form>

</x-guest-layout>