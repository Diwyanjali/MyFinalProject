@extends('backend.layouts.app')

@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Hotel Bookings</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer Name</th>
                                        <th>Customer E-mail</th>
                                        <th>Check-In</th>
                                        <th>Check-Out</th>
                                        <th>No of rooms</th>
                                        <th>Room Category</th>
                                        <th>Bed Type</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $key => $booking)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $booking->User->name }}</td>
                                            <td>{{ $booking->User->email }}</td>
                                            <td>{{ $booking->check_in }}</td>
                                            <td>{{ $booking->check_out }}</td>
                                            <td>{{ $booking->no_of_rooms }}</td>
                                            <td>{{ $booking->Room->category }}</td>
                                            <td>{{ $booking->Room->bed_type }}</td>
                                            <td>
                                                @if ($booking->status == 'confirm')
                                                    <span class="badge text-bg-success">Confirm</span>
                                                @else
                                                    <span class="badge text-bg-danger">Cancel</span>
                                                @endif
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
@endsection
