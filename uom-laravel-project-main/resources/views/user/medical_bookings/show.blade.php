@extends('layouts.master')

@section('title', 'View Appoinment')

@section('content')
    <div class="main-wrapper pb-5 px-5">
        <div class="page-wrapper full-page">
            <div class="page-content">

                <div class="row text-center mb-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h5 class="fw-light">
                            <strong>
                                View Appoinment - {{ $booking->date }}
                            </strong>
                        </h5>
                    </div>
                </div>
                <div class="row mb-3">
                    <a href="{{ route('user.bookings.medical') }}">Back to Appoinments</a>
                </div>

                <div class="row justify-content-center">

                    
                    <div class="col-md-6 col-sm-6 col-6 col-lg-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h4>Patient's Details</h4>
                                <hr>
                                <ul>
                                    <li>Name : {{ $booking->User->name }}</li>
                                    <li>E-mail : {{ $booking->User->email }}</li>
                                    <li>Phone : {{ $booking->User->phone }}</li>
                                    <li>DOB : {{ $booking->User->dob }}</li>
                                    <li>NIC : {{ $booking->User->nic }}</li>
                                    <li>Address : {{ $booking->User->address }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-md-6 col-sm-6 col-lg-3 col-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h4>Doctor's Details</h4>
                                <hr>
                                <ul>
                                    <li>Name: {{ $booking->Doctor->name }}</li>
                                    <li>Specialization: {{ $booking->Doctor->doctor_specialization->name }}</li>
                                </ul>
                                @if ($booking->Doctor->doctor_specialization->description)
                                    <i>{{ $booking->Doctor->doctor_specialization->description }}</i>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!--Consultation information-->
                    <div class="col-md-12 col-sm-12 col-12 col-lg-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div>
                                    <div class="row">
                                        <h4>Consultation information</h4>
                                        <hr>
                                    </div>
                                    <p><strong>Date</strong> - {{ $booking->date }}</p>
                                    <p><strong>Timeslot</strong> - {{ $booking->TimeSlot->slot }}</p>
                                    <p><strong>Disease</strong> - {{ $booking->disease }}</p>
                                    <p><strong>Doctor's Feedback</strong> - {{ $booking->Prescription->doctor_comment }}
                                    </p>
                                    <p><strong>Status</strong> - <span class="badge text-bg-success">{{ $booking->status }}</span></p>
                                </div>

                                <div class="mt-3">
                                    <strong class="mb-2">Drugs</strong>
                                    <ul class="mt-3">
                                        @foreach ($booking->Prescription->PrescriptionDrugs as $prescriptionDrug)
                                            <li>{{ $prescriptionDrug->Drug->name }} X
                                                {{ $prescriptionDrug->quantity }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
