<?php

namespace App\Services;

use App\Models\Specialty;
use Illuminate\Database\QueryException;

class SpecialtyService
{
   public function getAll(?string $search = null)
   {
      return Specialty::withCount('doctors')
         ->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%");
         })
         ->latest()
         ->paginate(10)
         ->withQueryString();
   }

   public function store(array $data): Specialty
   {
      return Specialty::create($data);
   }

   public function update(Specialty $specialty, array $data): bool
   {
      return $specialty->update($data);
   }

   public function delete(Specialty $specialty): bool
   {
      try {

         return $specialty->delete();
      } catch (QueryException $e) {

         return false;
      }
   }
}
