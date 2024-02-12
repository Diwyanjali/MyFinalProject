<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Mail\MedicalBookingConfirmation;
use App\Models\Doctor;
use App\Models\DoctorSpecialization;
use App\Models\MedicalBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MedicalCenterController extends Controller
{
    public function index(Request $request)
    {
        $doctors = (new Doctor)->newQuery();

        if (!empty($request->specialization)) {
            $doctors->where('specialization_id', $request->specialization);
        }

        if (!empty($request->keyword)) {
            $doctors->where('name', 'LIKE', '%' . $request->keyword . '%');
        }

        $doctors = $doctors->latest()->get();

        $specializations = DoctorSpecialization::latest()->get();

        return view('medical_center.index', compact('doctors', 'specializations'));
    }

    public function channel($doctorCode, Request $request)
    {
        $doctor = Doctor::findByCode($doctorCode);

        $timeSlots = MedicalBooking::where('date', $request->date)->where('doctor_id', $doctor->id)->whereNot('status', 'cancel')->pluck('time_slot_id');

        if ($request->ajax()) {

            $html = "";
            $html .= '<option value="">Select the Time Slot</option>';

            $time_slots = $doctor
                ->DoctorTimeSlots
                ->where('date', $request->date)
                ->whereNotIn('time_slot_id', $timeSlots);

            foreach ($time_slots as $time_slot) {
                if ($time_slot->time_slot->status) {
                    $html .= '<option value="' . $time_slot->time_slot->id . '">' . $time_slot->time_slot->slot . '</option>';
                }
            }

            return response()->json(['html' => $html]);
        }

        if ($doctor) {
            return view('medical_center.channel', compact('doctor'));
        }

        abort(404);
    }

    public function makeAppointment(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required',
            'date' => 'required',
            'time_slot' => 'required',
            'disease' => 'required',
        ]);

        $booking = new MedicalBooking();
        $booking->user_id = Auth::user()->id;
        $booking->doctor_id = $request->doctor_id;
        $booking->time_slot_id = $request->time_slot;
        $booking->date = $request->date;
        $booking->disease = $request->disease;
        $booking->status = 'confirm';
        $booking->save();

        //send confirmation email
        Mail::to(Auth::user()->email)->send(new MedicalBookingConfirmation($booking));

        return redirect()->back()->with('success', 'Appointment made successfully!');
    }
}
