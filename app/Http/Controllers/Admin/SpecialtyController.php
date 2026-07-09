<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSpecialtyRequest;
use App\Http\Requests\UpdateSpecialtyRequest;
use App\Models\Specialty;
use App\Services\SpecialtyService;

class SpecialtyController extends Controller
{
    public function __construct(
        protected SpecialtyService $specialtyService
    ) {}

    public function index()
    {
        $specialties = $this->specialtyService->getAll(
            request('search')
        );

        return view(
            'admin.specialties.index',
            compact('specialties')
        );
    }

    public function create()
    {
        return view('admin.specialties.create');
    }

    public function store(StoreSpecialtyRequest $request)
    {
        $this->specialtyService
            ->store($request->validated());

        return redirect()
            ->route('specialties.index')
            ->with('success', 'Specialty created successfully.');
    }

    public function edit(Specialty $specialty)
    {
        return view(
            'admin.specialties.edit',
            compact('specialty')
        );
    }

    public function update(
        UpdateSpecialtyRequest $request,
        Specialty $specialty
    ) {

        $this->specialtyService
            ->update(
                $specialty,
                $request->validated()
            );

        return redirect()
            ->route('specialties.index')
            ->with('success', 'Specialty updated successfully.');
    }

   public function destroy(Specialty $specialty)
{
    $deleted = $this->specialtyService->delete($specialty);

    if (! $deleted) {

        return redirect()
            ->route('specialties.index')
            ->with(
                'error',
                'You cannot delete this specialty because it is assigned to one or more doctors.'
            );
    }

    return redirect()
        ->route('specialties.index')
        ->with(
            'success',
            'Specialty deleted successfully.'
        );
}
}