<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;

class DoctorApprovalController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with(['user','specialty'])
                    ->where('approval_status','pending')
                    ->get();

        return view('admin.pending-doctors', compact('doctors'));
    }

    public function approve(Doctor $doctor)
    {
        $doctor->update([
            'approval_status' => 'approved'
        ]);

        return back()->with('success','Doctor approved successfully.');
    }

    public function reject(Doctor $doctor)
    {
        $doctor->update([
            'approval_status' => 'rejected'
        ]);

        return back()->with('success','Doctor rejected.');
    }
}