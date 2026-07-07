<?php

use App\Http\Controllers\Auth\PatientRegisterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {

    Route::get('/patient/dashboard', function () {
        return "Patient Dashboard";
    })->name('patient.dashboard');

});

Route::middleware('guest')->group(function () {

    Route::get('/register/patient', [PatientRegisterController::class, 'create'])
        ->name('patient.register');

    Route::post('/register/patient', [PatientRegisterController::class, 'store'])
        ->name('patient.register.store');

});
require __DIR__.'/auth.php';
