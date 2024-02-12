<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Drug;
use App\Models\MedicalBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DrugController extends Controller
{
    public function index()
    {
        $drugs = Drug::latest()->get();

        return view('backend.drugs.index', compact('drugs'));
    }

    public function create()
    {
        return view('backend.drugs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'status' => 'required',
        ]);

        Drug::create([
            'drug_id' => Str::random(9),
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'status' => $request->status,
        ]);

        $notification = array(
            'message' => 'Create Successfully..!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.drugs.index')->with($notification);
    }

    public function show($id)
    {
        $drug = Drug::findorFail($id);

        return view('backend.drugs.edit', compact('drug'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'status' => 'required',
        ]);

        Drug::findorFail($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'status' => $request->status,
        ]);

        $notification = array(
            'message' => 'Update Successfully..!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.drugs.index')->with($notification);
    }

    public function delete($id)
    {
        Drug::findorFail($id)->delete();

        $notification = array(
            'message' => 'Deleted Successfully..!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function prescriptions()
    {
        $bookings = MedicalBooking::where('status', '!=', 'confirm')->latest()->get();

        return view('backend.prescriptions.index', compact('bookings'));
    }

    public function issue($medical_booking_id)
    {
        $booking = MedicalBooking::find($medical_booking_id);
        $booking->status = "completed";
        $booking->update();

        if(!empty($booking->Prescription->PrescriptionDrugs)) {
            foreach($booking->Prescription->PrescriptionDrugs as $PrescriptionDrug) 
            {
                $PrescriptionDrug->Drug->update([
                    'quantity' => ($PrescriptionDrug->Drug->quantity - $PrescriptionDrug->quantity)
                ]);
            }
        }

        $notification = array(
            'message' => 'Drug dispensing successfuly !',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    }
}
