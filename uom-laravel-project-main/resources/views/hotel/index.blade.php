@extends('layouts.master')

@section('title', 'Hotel')

@section('content')
    <div class="main-wrapper pb-5 px-5">
        <div class="page-wrapper">
            <div class="page-content">

                <div class="row text-center mb-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light">Our Rooms</h1>
                        <p class="lead text-body-secondary">
                            Accommodation at our Colombo Ayurvedic Hotel offers three exclusive options: Ayurvedic Standard, Deluxe, and Premier Rooms. Enjoy stunning ocean views, luxurious amenities, and ample space for a serene stay. Perfect for rejuvenation and relaxation.
                        </p>
                    </div>
                </div>

                <div class="row justify-content-center">
                    @foreach ($rooms as $room)
                        <div class="col-md-4">
                            <div class="card shadow-sm mb-3">

                                <img src="{{ $room->image }}" alt="{{ $room->category }} Room" class="img-fluid"
                                    style="height: 300px;">

                                <div class="card-body">

                                    <h5 class="card-text">
                                        {{ $room->category }}
                                    </h5>

                                    <p class="card-text">
                                        {{ $room->description }}
                                    </p>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <ul>
                                            <li>Air Condition Type - {{ $room->air_condition_type }}</li>
                                            <li>No of Pax - {{ $room->no_of_pax }}</li>
                                            <li>Bed Type - {{ $room->bed_type }}</li>
                                        </ul>

                                        <small class="text-body-secondary">
                                            {{ $room->quantity }} Rooms Available
                                        </small>
                                    </div>

                                    <div class="text-dark">
                                        <a href="{{ route('web.hotel.show', $room->slug )}}" @disabled($room->quantity == 0) class="btn btn-outline-primary btn-sm">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
