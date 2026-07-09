<?php

namespace App\Services;

use App\Models\Doctor;

class DoctorService
{
   public function getAll(
      ?string $search = null,
      ?string $status = null,
      ?int $specialty = null
   ) {

      return Doctor::with(['user', 'specialty'])

         ->when($search, function ($query) use ($search) {

            $query->whereHas('user', function ($q) use ($search) {

               $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%");
            });
         })

         ->when($status, function ($query) use ($status) {

            $query->where('approval_status', $status);
         })

         ->when($specialty, function ($query) use ($specialty) {

            $query->where('specialty_id', $specialty);
         })

         ->latest()

         ->paginate(10)

         ->withQueryString();
   }

   public function find(int $id): Doctor
   {
      return Doctor::with([
         'user',
         'specialty',
         'location',
         'schedule',
      ])->findOrFail($id);
   }

   public function approve(Doctor $doctor): bool
   {
      return $doctor->update([
         'approval_status' => 'approved',
      ]);
   }

   public function reject(Doctor $doctor): bool
   {
      return $doctor->update([
         'approval_status' => 'rejected',
      ]);
   }
}
