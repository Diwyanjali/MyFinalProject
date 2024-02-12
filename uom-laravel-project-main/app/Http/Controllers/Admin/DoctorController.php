<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\DoctorRegister;
use App\Models\Doctor;
use App\Models\DoctorSpecialization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('doctor_specialization')->latest()->get();

        return view('backend.doctors.index', compact('doctors'));
    }

    public function create()
    {
        $specialization = DoctorSpecialization::latest()->get();

        return view('backend.doctors.create', compact('specialization'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'specialization_id' => 'required',
            'description' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make('111');
        $user->role = 'doctor';
        $user->save();

        Doctor::create([
            'code' => $request->code,
            'name' => $request->name,
            'user_id' => $user->id,
            'specialization_id' => $request->specialization_id,
            'description' => $request->description,
        ]);

        //send login details email
        Mail::to($user->email)->send(new DoctorRegister($user));

        $notification = array(
            'message' => 'Create Successfully..!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.doctors.index')->with($notification);
    }

    public function show($id)
    {
        $doctors = Doctor::findorFail($id);

        $specialization = DoctorSpecialization::latest()->get();

        return view('backend.doctors.edit', compact('doctors', 'specialization'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'specialization_id' => 'required',
            'description' => 'required',
        ]);

        Doctor::findorFail($id)->update([
            'code' => $request->code,
            'name' => $request->name,
            'specialization_id' => $request->specialization_id,
            'description' => $request->description,
        ]);

        $notification = array(
            'message' => 'Update Successfully..!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.doctors.index')->with($notification);
    }

    public function delete($id)
    {
        Doctor::findorFail($id)->delete();

        $notification = array(
            'message' => 'Deleted Successfully..!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
