<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    public function index()
    {
        $treatments = Treatment::latest()->get();

        return view('backend.treatments.index', compact('treatments'));
    }

    public function create()
    {
        return view('backend.treatments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        Treatment::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status
        ]);

        $notification = array(
            'message' => 'Create Successfully..!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.treatments.index')->with($notification);
    }

    public function show($id)
    {
        $treatment = Treatment::findorFail($id);

        return view('backend.treatments.edit', compact('treatment'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        Treatment::findorFail($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status
        ]);

        $notification = array(
            'message' => 'Update Successfully..!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.treatments.index')->with($notification);
    }

    public function delete($id)
    {
        Treatment::findorFail($id)->delete();

        $notification = array(
            'message' => 'Deleted Successfully..!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
