<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientRequest;
use App\Services\PatientRegistrationService;
use Illuminate\Support\Facades\Auth;

class PatientRegisterController extends Controller
{
    public function __construct(
        protected PatientRegistrationService $patientRegistrationService
    ) {}

    public function create()
    {
        return view('auth.register-patient');
    }

    public function store(StorePatientRequest $request)
    {
        $user = $this->patientRegistrationService
            ->register($request->validated());

        Auth::login($user);

        return redirect()->route('patient.dashboard');
    }
}