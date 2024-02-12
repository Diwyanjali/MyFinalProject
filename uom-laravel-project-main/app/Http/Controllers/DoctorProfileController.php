<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use App\Models\MedicalBooking;
use App\Models\Prescription;
use App\Models\PrescriptionDrug;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorProfileController extends Controller
{
    public function dashboard()
    {
        $bookings = Auth::user()->Doctor->MedicalBookings()->latest()->get();

        return view('doctor.index', compact('bookings'));
    }

    public function appoinmentView($id, Request $request)
    {
        $drugs = Drug::latest()->get();

        $appoinment = MedicalBooking::find($id);

        $patient_history = User::find($appoinment->user_id)->MedicalBookings->where('id', '!=', $appoinment->id);

        return view('doctor.view_appoinment', compact('appoinment', 'patient_history', 'drugs'));
    }

    public function addPrescription(Request $request)
    {
        $request->validate([
            'doctor_comment' => 'required',
            'drugs' => 'required|array',
            'quantities' => 'required|array',
        ]);

        $booking = MedicalBooking::find($request->medical_booking_id);
        $booking->status = "consulted";
        $booking->update();

        $prescription = new Prescription();
        $prescription->medical_booking_id = $request->medical_booking_id;
        $prescription->doctor_comment = $request->doctor_comment;
        $prescription->save();

        if (!empty($request->drugs)) {
            foreach ($request->drugs as $key => $drug) {
                $prescription_drug = new PrescriptionDrug();
                $prescription_drug->prescription_id = $prescription->id;
                $prescription_drug->drug_id = $drug;
                $prescription_drug->quantity = $request->quantities[$key];
                $prescription_drug->save();
            }
        }

        return redirect()->back()->with('success', 'Prescription Successfully Added !');
    }
}
