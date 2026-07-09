<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\DoctorApprovalController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\SpecialtyController;
use App\Http\Controllers\Auth\DoctorRegisterController;
use App\Http\Controllers\Auth\PatientRegisterController;
use App\Http\Controllers\Patient\PatientDashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('guest')->group(function () {

    Route::get('/register/patient', [PatientRegisterController::class, 'create'])
        ->name('patient.register');

    Route::post('/register/patient', [PatientRegisterController::class, 'store'])
        ->name('patient.register.store');

    Route::get('/register/doctor', [DoctorRegisterController::class, 'create'])
        ->name('doctor.register');

    Route::post('/register/doctor', [DoctorRegisterController::class, 'store'])
        ->name('doctor.register.store');
});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get(
        '/admin/dashboard',
        [AdminDashboardController::class, 'index']
    )->name('admin.dashboard');

    Route::get(
        '/admin/doctors/pending',
        [DoctorApprovalController::class, 'index']
    )->name('admin.doctors.pending');

    Route::patch(
        '/admin/doctors/{doctor}/approve',
        [DoctorApprovalController::class, 'approve']
    )->name('admin.doctors.approve');

    Route::patch(
        '/admin/doctors/{doctor}/reject',
        [DoctorApprovalController::class, 'reject']
    )->name('admin.doctors.reject');

    Route::get('/admin/doctors', [DoctorController::class, 'index'])
        ->name('admin.doctors.index');

    Route::get('/admin/doctors/{doctor}', [DoctorController::class, 'show'])
        ->name('admin.doctors.show');

    Route::get('/admin/doctors/{doctor}/edit', [DoctorController::class, 'edit'])
        ->name('admin.doctors.edit');

    Route::put('/admin/doctors/{doctor}', [DoctorController::class, 'update'])
        ->name('admin.doctors.update');

    Route::get(
        '/admin/doctors',
        [DoctorController::class, 'index']
    )->name('admin.doctors.index');

    Route::resource('specialties', SpecialtyController::class);
});

Route::middleware(['auth', 'patient'])->group(function () {

    Route::get('/patient/dashboard', [PatientDashboardController::class, 'index'])
        ->name('patient.dashboard');

    Route::get(
        '/patient/doctors',
        [\App\Http\Controllers\Patient\DoctorController::class, 'index']
    )->name('patient.doctors.index');

    Route::get(
        '/patient/doctors/{doctor}',
        [\App\Http\Controllers\Patient\DoctorController::class, 'show']
    )->name('patient.doctors.show');
});

//###
Route::middleware(['auth', 'doctor'])->group(function () {

    Route::get('/doctor/dashboard', function () {
        return 'Doctor Dashboard';
    })->name('doctor.dashboard');
});


//####



// 






require __DIR__ . '/auth.php';
