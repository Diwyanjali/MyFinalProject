@extends('layouts.master')

@section('title', 'Medical Center')

@section('content')
    <div class="main-wrapper pb-5 px-5">
        <div class="page-wrapper full-page">
            <div class="page-content">
                <div class="row justify-content-center">

                    @include('layouts.flash_message')

                    <div class="col-md-4 col-lg-4 col-sm-12 grid-margin stretch-card mb-3">
                        <div class="card align-items-center">
                            <div class="card-hader mt-2">
                                <strong>Doctor's Details</strong>
                            </div>

                            <div class="card-body">
                                <h5 class="card-text">
                                    {{ $doctor->name }}
                                </h5>

                                <p class="card-text">
                                    {{ $doctor->description }}
                                </p>

                                <div class="d-flex justify-content-between align-items-center">
                                    <ul>
                                        <li>Specialization - {{ $doctor->doctor_specialization->name }}</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="footer py-3">
                                <a href="{{ route('web.medical_center.index') }}" class="text-dark">
                                    Back to Medical Center
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 col-lg-8 col-sm-12">
                        <form action="{{ route('web.medical_center.makeAppointment') }}" method="post">
                            @csrf

                            <div class="card mb-3">
                                <div class="card-body">

                                    <h6 class="card-title">
                                        Consultation Information
                                    </h6>

                                    
                                    <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">

                                    
                                    <div class="mb-3">
                                        <label for="doctor_shedule" class="form-label">Select Date <span
                                                class="text-danger">*</span></label>
                                        <input type="date" class="form-control @error('time_slot') is-invalid @enderror"
                                            id="schedule_date" placeholder="" name="date">
                                        @error('date')
                                            <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                    </div>

                                    
                                    <div class="mb-3">
                                        <label for="doctor_shedule" class="form-label">Select Time Slot <span
                                                class="text-danger">*</span></label>
                                        <select name="time_slot" id="time_slots"
                                            class="form-control @error('time_slot') is-invalid @enderror">
                                            <option value="">Select the Time Slot</option>
                                        </select>
                                        @error('time_slot')
                                            <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                    </div>

                                    
                                    <div class="mb-3">
                                        <label for="disease" class="form-label">Describe your disease <span
                                                class="text-danger">*</span></label>
                                        <textarea name="disease" class="form-control @error('disease') is-invalid @enderror" cols="30" rows="6"
                                            placeholder="Describe your disease"></textarea>
                                        @error('disease')
                                            <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Make Appointment</button>
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

            $('#schedule_date').on('change', function() {

                $('#time_slots').html('');

                $.ajax({
                    url: "{{ route('web.medical_center.channel', $doctor->code) }}",
                    method: "get",
                    data: {
                        'date': $(this).val()
                    },
                    dataType: "json",
                    success: function(res) {
                        $('#time_slots').append(res.html);
                    }
                })
            });

            var dtToday = new Date();
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10){
                month = '0' + month.toString();
            }
            if (day < 10) {
                day = '0' + day.toString();
            }
            var maxDate = year + '-' + month + '-' + day;
            $('#schedule_date').attr('min', maxDate);
        });
    </script>
@endsection
