<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\DoctorHasTimeSlot;
use App\Models\MedicalBooking;
use App\Models\RoomBooking;
use App\Models\TimeSlot;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function hotelBookings()
    {
        $bookings = RoomBooking::latest()->get();

        return view('backend.bookings.hotel_bookings', compact('bookings'));
    }

    public function doctorCookings()
    {
        $bookings = MedicalBooking::latest()->get();

        return view('backend.bookings.medical_bookings', compact('bookings'));
    }

    public function timeSlots()
    {
        $timeSlots = TimeSlot::get();

        return view('backend.timeSlots.all_time_slots', compact('timeSlots'));
    }

    //doctor time slots

    public function doctorTimeSlots()
    {
        $assingSlots = DoctorHasTimeSlot::with('doctor', 'time_slot')->get();

        return view('backend.timeSlots.doctor_timeslots', compact('assingSlots'));
    }

    public function createDoctorTimeslot()
    {
        $doctors = Doctor::all();

        $time_slots = TimeSlot::all();

        return view('backend.timeSlots.create_doctor_timeslot', compact('doctors', 'time_slots'));
    }

    public function assingDoctorTimeSlots(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required',
            'time_slot_id' => 'required',
            'date' => 'required',
            'status' => 'required'
        ]);

        DoctorHasTimeSlot::create([
            'doctor_id' => $request->doctor_id,
            'time_slot_id' => $request->time_slot_id,
            'date' => $request->date,
            'status' => $request->status
        ]);

        $notification = array(
            'message' => 'Create Successfully..!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.time_slots.doctor')->with($notification);
    }
          //edit
    public function showDoctorTimeSlot($id)
    {
        $doctors = Doctor::all();

        $time_slots = TimeSlot::all();

        $doctor_time_slot = DoctorHasTimeSlot::findorFail($id);

        return view('backend.timeSlots.edit_doctor_timeslot', compact('doctors', 'time_slots', 'doctor_time_slot'));
    }

    public function updateDoctorTimeSlot($id, Request $request)
    {
        $request->validate([
            'doctor_id' => 'required',
            'time_slot_id' => 'required',
            'date' => 'required',
            'status' => 'required'
        ]);

        DoctorHasTimeSlot::findorFail($id)->update([
            'doctor_id' => $request->doctor_id,
            'time_slot_id' => $request->time_slot_id,
            'date' => $request->date,
            'status' => $request->status
        ]);

        $notification = array(
            'message' => 'Update Successfully..!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.time_slots.doctor')->with($notification);
    }

    public function deleteDoctorTimeSlot($id)
    {
        DoctorHasTimeSlot::findorFail($id)->delete();

        $notification = array(
            'message' => 'Deleted Successfully..!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
