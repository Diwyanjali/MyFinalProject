<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Feedback;
use App\Models\RoomBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        $doctor_count = Doctor::count();

        $feeback_count = Feedback::count();

        $room_booking_count = RoomBooking::where('status', 'confirm')->count();

        return view('backend.index', compact('doctor_count', 'feeback_count', 'room_booking_count'));
    }
}
