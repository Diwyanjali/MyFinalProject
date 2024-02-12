@extends('layouts.master')

@section('title', 'Reservation Hotel')

@section('content')
    <div class="main-wrapper pb-5 px-5">
        <div class="page-wrapper">
            <div class="page-content">
                <div class="row justify-content-center">

                    @include('layouts.flash_message')

                    <div class="col-md-4 col-lg-4 col-sm-12 grid-margin stretch-card mb-3">
                        <div class="card align-items-center">
                            <div class="card-hader mt-2">
                                <strong>Room Details</strong>
                            </div>

                            <img src="{{ $room->image }}" class="img-fluid mt-3" alt="{{ $room->category }}"
                                style="width: 80%;">

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

                                    @if ($room->quantity == 0)
                                        <small class="badge text-bg-danger">
                                            Rooms Unavailable
                                        </small>
                                    @else
                                        <small class="badge text-bg-success">
                                            {{ $room->quantity }} Rooms Available
                                        </small>
                                    @endif
                                </div>

                                <hr>
                            </div>

                            <div class="footer py-3">
                                <a href="{{ route('web.hotel.index') }}" class="text-dark">
                                    Back to Rooms
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 col-lg-8 col-sm-12">

                        <form action="{{ route('web.hotel.store') }}" method="post">
                            @csrf

                            
                            <div class="card mb-3">
                                <div class="card-body">

                                    <h6 class="card-title">
                                        Reservation Information
                                    </h6>

                                    
                                    <input type="hidden" name="room_id" value="{{ $room->id }}">

                                    
                                    <div class="row mb-3">
                                        <label for="no_of_rooms" class="form-label">
                                            No of Rooms <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="number" name="no_of_rooms" min="1" max="{{ $room->quantity }}"
                                                class="form-control @error('no_of_rooms') is-invalid @enderror"
                                                placeholder="No of Rooms" value="{{ old('no_of_rooms') }}">
                                        </div>
                                        @error('no_of_rooms')
                                            <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                    </div>

                                    
                                    <div class="row mb-3">
                                        <label for="checkin" class="form-label">
                                            Check-In <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="date" name="check_in"
                                                class="form-control @error('check_in') is-invalid @enderror"
                                                name="checking_date" value="{{ old('check_in') }}" id="check_in">
                                        </div>
                                        @error('check_in')
                                            <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                    </div>

                                    
                                    <div class="row mb-3">
                                        <label for="checkout" class="form-label">
                                            Check-out <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="date" name="check_out"
                                                class="form-control @error('check_out') is-invalid @enderror"
                                                name="checkout_date" value="{{ old('check_out') }}" id="check_out">
                                        </div>
                                        @error('check_out')
                                            <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6 class="card-title mb-3">
                                        Treatment Information
                                    </h6>

                                    <div class="row">
                                        @foreach ($treatments as $treatment)
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="treatments[]"
                                                        value="{{ $treatment->id }}" id="{{ $treatment->id }}">
                                                    <label class="form-check-label" for="{{ $treatment->id }}">
                                                        <strong>{{ $treatment->name }}</strong>
                                                    </label>
                                                    <p>{{ $treatment->description }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary me-2"
                                @disabled($room->quantity == 0)>Reserve</button>
                            <button class="btn btn-secondary">Cancel</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            checkInTime();

            $('#check_in').on('change', function(event) {
                var dtToday = new Date(event.target.value);
                var month = dtToday.getMonth() + 1;
                var day = dtToday.getDate();
                var year = dtToday.getFullYear();
                if (month < 10) {
                    month = '0' + month.toString();
                }
                if (day < 10) {
                    day = '0' + day.toString();
                }
                var maxDate = year + '-' + month + '-' + day;
                $('#check_out').attr('min', maxDate);
            });
        });

        function checkInTime() {
            var dtToday = new Date();
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10) {
                month = '0' + month.toString();
            }
            if (day < 10) {
                day = '0' + day.toString();
            }
            var maxDate = year + '-' + month + '-' + day;
            $('#check_in').attr('min', maxDate);
        }
    </script>
@endsection
