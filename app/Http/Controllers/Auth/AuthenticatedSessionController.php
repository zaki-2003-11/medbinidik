<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = auth()->user();

        // Admin
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // Doctor
        if ($user->role === 'doctor') {

            $doctor = $user->doctor;

            if (!$doctor) {
                auth()->logout();

                return redirect()->route('login')
                    ->withErrors([
                        'email' => 'Doctor profile not found.'
                    ]);
            }

            if ($doctor->approval_status === 'pending') {

                auth()->logout();

                return redirect()->route('login')
                    ->withErrors([
                        'email' => 'Your account is waiting for administrator approval.'
                    ]);
            }

            if ($doctor->approval_status === 'rejected') {

                auth()->logout();

                return redirect()->route('login')
                    ->withErrors([
                        'email' => 'Your account has been rejected. Please contact the administrator.'
                    ]);
            }

            return redirect()->route('doctor.dashboard');
        }

        // Patient
        return redirect()->route('patient.dashboard');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
