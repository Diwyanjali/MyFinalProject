<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DoctorSpecialization;
use Illuminate\Http\Request;

class DoctorSpecializationController extends Controller
{
    public function index()
    {
        $specializations = DoctorSpecialization::latest()->get();

        return view('backend.specializations.index', compact('specializations'));
    }

    public function create()
    {
        return view('backend.specializations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        DoctorSpecialization::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $notification = array(
            'message' => 'Create Successfully..!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.doctors.specializations.index')->with($notification);
    }

    public function show($id)
    {
        $specialization = DoctorSpecialization::findorFail($id);

        return view('backend.specializations.edit', compact('specialization'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        DoctorSpecialization::findorFail($id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $notification = array(
            'message' => 'Update Successfully..!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.doctors.specializations.index')->with($notification);
    }

    public function delete($id)
    {
        DoctorSpecialization::findorFail($id)->delete();

        $notification = array(
            'message' => 'Deleted Successfully..!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
    
}
