<div class="w-72 bg-slate-900 text-white min-h-screen">

<div class="flex flex-col items-center">

   
   <img src="{{ asset('images/logo medbinidik.png') }}" alt="MED BIN IDIK Logo" class=" w-28 h-28 object-contain mb-5">
   
   
   <div class="p-6 text-2xl font-bold">
      
      MED BIN IDIK
      
   </div>
</div>
   
    <nav class="mt-6">

        <a href="{{ route('admin.dashboard') }}" class="block px-6 py-3 hover:bg-slate-700">

            Dashboard

        </a>

        <a href="{{ route('admin.doctors.pending') }}" class="block px-6 py-3 hover:bg-slate-700">

            Pending Doctors

        </a>

        <a href="{{ route('admin.doctors.index') }}" class="block px-6 py-3 hover:bg-slate-700">

            Doctors

        </a>

        <a href="#" class="block px-6 py-3 hover:bg-slate-700">

            Patients

        </a>

        <a href="{{ route('specialties.index') }}" class="block px-6 py-3 hover:bg-slate-700">

            Specialties

        </a>

        <a href="#" class="block px-6 py-3 hover:bg-slate-700">

            Appointments

        </a>

        <a href="#" class="block px-6 py-3 hover:bg-slate-700">

            Reviews

        </a>

    </nav>

</div>
