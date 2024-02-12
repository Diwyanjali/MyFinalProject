@extends('backend.layouts.app')

@section('content')
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h4>Doctors</h4>
                        <h2>{{ $doctor_count }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h4>Customer Feedbacks</h4>
                        <h2>{{ $feeback_count }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h4> Hotel Bookings</h4>
                        <h2>{{ $room_booking_count }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h4> Doctor Bookings</h4>
                        <h2>10</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
