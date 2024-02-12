@extends('layouts.master')

@section('title', 'Hotel Bookings')

@section('content')
    <div class="main-wrapper pb-5 px-5">
        <div class="page-wrapper full-page">
            <div class="page-content">
                <div class="row">
                    <div class="col-md-2">
                        @include('user.menu')
                    </div>

                    <div class="col-md-10">

                        @include('layouts.flash_message')

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <h5> Hotel Bookings</h5>
                                    <hr>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col" style="width: 20%">Reservation Date</th>
                                                <th scope="col" style="width: 15%">Category</th>
                                                <th scope="col" style="width: 15%">No of Rooms</th>
                                                <th scope="col" style="width: 15%">Check-In</th>
                                                <th scope="col" style="width: 15%">Check-Out</th>
                                                <th scope="col" style="width: 25%">Treatments</th>
                                                <th scope="col" style="width: 15%">Status</th>
                                                <th scope="col" style="width: 15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            @foreach ($bookings as $key => $booking)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $booking->created_at->format('Y-m-d H:m A') }}</td>
                                                    <td>{{ $booking->Room->category }}</td>
                                                    <td>{{ $booking->no_of_rooms }}</td>
                                                    <td>{{ $booking->check_in }}</td>
                                                    <td>{{ $booking->check_out }}</td>
                                                    <td>
                                                        @if (count($booking->TreatmentBookings))
                                                            @foreach ($booking->TreatmentBookings as $treat)
                                                                <span class="badge text-bg-secondary">
                                                                    {{ $treat->Treatment->name }}
                                                                </span>
                                                            @endforeach
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($booking->status == 'confirm')
                                                            <span class="badge text-bg-success">Confirm</span>
                                                        @else
                                                            <span class="badge text-bg-danger">Cancel</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($booking->status == 'confirm')
                                                            <button class="btn btn-outline-danger btn-sm"
                                                                data-bs-toggle="modal" data-bs-target="#modal-delete"
                                                                data-id="{{ $booking->id }}">
                                                                Cancel
                                                            </button>
                                                        @else
                                                            -
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
        </div>
    </div>

    <!--delete alert-->
    <div class="modal fade" id="modal-delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('user.bookings.hotel.cancel', '0') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h3 class="modal-title text-center fs-5" id="staticBackdropLabel">Confirm to Cancel ?</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id" value="">
                        Are you sure to Cancel this Reservation ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-outline-danger">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        document.getElementById('modal-delete').addEventListener('shown.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            $(this).find('#id').val(id);
        });
    </script>
@endsection
