@extends('layouts.master')

@section('title', 'Doctor')

@section('content')
    <div class="main-wrapper pb-5 px-5">
        <div class="page-wrapper">
            <div class="page-content">

                <div class="row text-center mb-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h5 class="fw-light">My Appoinments</h5>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Customer Name</th>
                                                <th>Date</th>
                                                <th>Disease</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
    
                                        <tbody>
                                            @foreach ($bookings as $key => $booking)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $booking->User->name }}</td>
                                                    <td>{{ $booking->date }}</td>
                                                    <td>{{ $booking->disease }}</td>
                                                    <td>{{ $booking->status }}</td>
                                                    <td>
                                                        <a href="{{ route('doctor.appoinment.view', $booking->id) }}"
                                                            class="btn btn-primary btn-sm">View Appoinment</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
