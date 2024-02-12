<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Mail\RoomBookingConfirmation;
use App\Models\Room;
use App\Models\RoomBooking;
use App\Models\Treatment;
use App\Models\TreatmentBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HotelController extends Controller
{
    public function index()
    {
        $rooms = Room::latest()->get();

        return view('hotel.index', compact('rooms'));
    }

    public function show($slug)
    {
        $room = Room::findBySlug($slug);

        $treatments = Treatment::where('status', 1)->latest()->get();
        
        return view('hotel.show', compact('room', 'treatments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_of_rooms' => 'required',
            'check_in' => 'required',
            'check_out' => 'required|after_or_equal:check_in',
        ]);

        //get room by id
        $room = Room::find($request->room_id);

        //validate no of room less than or equal with the selected room available room count
        if($room->quantity < $request->no_of_rooms) {
            return redirect()
            ->back()
            ->withInput()
            ->with('error', 'you cannot book the rooms over the available number of  rooms');
        }

        //add booking
        $booking = new RoomBooking();
        $booking->user_id = Auth::user()->id;
        $booking->room_id = $room->id;
        $booking->no_of_rooms = $request->no_of_rooms;
        $booking->check_in = $request->check_in;
        $booking->check_out = $request->check_out;
        $booking->save();

        //if available treatments add to the booking
        if(!empty($request->treatments)) {
            foreach($request->treatments as $treatment) {
                TreatmentBooking::create([
                    'room_booking_id' => $booking->id,
                    'treatment_id' => $treatment
                ]);
            }
        }

        //update room quantity
        $room->quantity = ($room->quantity - $request->no_of_rooms);
        $room->update();

        //send confirmation email
        Mail::to(Auth::user()->email)->send(new RoomBookingConfirmation($booking));

        return redirect()->back()->with('success', 'Booking successfully!');
    }
}
