<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Services\DoctorRegistrationService;
use App\Models\Specialty;

class DoctorRegisterController extends Controller
{
    public function __construct(
        protected DoctorRegistrationService $doctorRegistrationService
    ) {}



    public function create()
    {
        $specialties = Specialty::orderBy('name')->get();

        return view('auth.register-doctor', compact('specialties'));
    }

    public function store(StoreDoctorRequest $request)
    {
        $this->doctorRegistrationService
            ->register($request->validated());

        return redirect()
            ->route('login')
            ->with(
                'success',
                'Your account has been created successfully. Please wait for administrator approval.'
            );
    }
}
