<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        return view('user.dashboard', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'nic' => 'required',
            'dob' => 'required',
            'address' => 'required',
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->nic = $request->nic;
        $user->dob = $request->dob;
        $user->address = $request->address;
        $user->update();

        return redirect()->route('user.dashboard')->with('success', 'Profile updated!');
    }

    public function hotel_bookings()
    {
        $bookings = Auth::user()->RoomBookings()->latest()->get();

        return view('user.hotel_bookings', compact('bookings'));
    }

    public function medical_bookings()
    {
        $bookings = Auth::user()->MedicalBookings()->latest()->get();

        return view('user.medical_bookings.index', compact('bookings'));
    }

    public function view_medical_booking($id)
    {
        $booking = Auth::user()->MedicalBookings()->where('id', $id)->first();

        if($booking) {
            return view('user.medical_bookings.show', compact('booking'));
        } else {
            abort(404);
        }
    }

    public function reviews()
    {
        $feedback = Auth::user()->Feedback;

        return view('user.reviews', compact('feedback'));
    }

    public function postReview(Request $request)
    {
        $request->validate([
            'service' => 'required',
            'feedback' => 'required'
        ]);

        $user = Auth::user();

        if(count($user->RoomBookings) >= 1 || count($user->MedicalBookings) >= 1) {
            Feedback::create([
                'user_id' => $user->id,
                'service' => $request->service,
                'comment' => $request->feedback
            ]);
    
            return redirect()->back()->with('success', 'Successfully Reviewd !');
            
        } else {
            return redirect()
            ->back()
            ->withInput()
            ->with('error', 'You need at least one hotel reservation or medical reservation to make feedback');
        }       
    }

    public function removeReview(Request $request)
    {
         Auth::user()->Feedback->delete();
         return redirect()->back()->with('success', 'Successfully Delete your Feedback !');
    }

    public function cancel_hotel_booking($id, Request $request)
    {
        $booking = Auth::user()->RoomBookings()->where('id', $request->id)->first();
        $booking->status = "cancel";
        $booking->update();
        $booking->Room->update([
            'quantity' => $booking->no_of_rooms
        ]);
        return redirect()->back()->with('success', 'Successfully Cancel your Reservation !');
    }

    public function cancel_medical_booking($id, Request $request)
    {
        $booking = Auth::user()->MedicalBookings()->where('id', $request->id)->first();
        $booking->status = "cancel";
        $booking->update();
        return redirect()->back()->with('success', 'Successfully Cancel your Appointment !');
    }
}
