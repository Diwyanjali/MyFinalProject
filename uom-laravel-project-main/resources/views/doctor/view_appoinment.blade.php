@extends('layouts.master')

@section('title', 'Doctor')

@section('content')
    <div class="main-wrapper pb-5 px-5">
        <div class="page-wrapper">
            <div class="page-content">

                <div class="row text-center mb-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h5 class="fw-light">
                            <strong>
                                View Appoinment
                            </strong>
                        </h5>
                    </div>
                </div>

                <div class="row mb-3">
                    <a href="{{ route('doctor.dashboard') }}">Back to Dashboard</a>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h4>Patient's Details</h4>
                                <hr>
                                <ul>
                                    <li>Name : {{ $appoinment->User->name }}</li>
                                    <li>E-mail : {{ $appoinment->User->email }}</li>
                                    <li>Phone : {{ $appoinment->User->phone }}</li>
                                    <li>DOB : {{ $appoinment->User->dob }}</li>
                                    <li>NIC : {{ $appoinment->User->nic }}</li>
                                    <li>Address : {{ $appoinment->User->address }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">

                        @include('layouts.flash_message')

                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <h4>Disease information</h4>
                                    <hr>
                                </div>
                                <p>disease - {{ $appoinment->disease }}</p>

                                @if ($appoinment->status == 'confirm')
                                    <div class="row mt-3">

                                        <form action="{{ route('doctor.appoinment.add_prescription') }}" method="post">
                                            @csrf

                                            <!--medical booking_id-->
                                            <input type="hidden" name="medical_booking_id" value="{{ $appoinment->id }}">

                                            <!--Doctor's comment-->
                                            <div class="mb-3">
                                                <label class="form-label">Doctor's comment <span
                                                        class="text-danger">*</span></label>
                                                <textarea name="doctor_comment" class="form-control @error('doctor_comment') is-invalid @enderror" cols="30"
                                                    rows="5" placeholder="Doctor's comment">{{ old('doctor_comment') }}</textarea>
                                                @error('doctor_comment')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </div>

                                            <!--drugs-->
                                            <div class="mb-3">
                                                <label class="form-label">Drugs <span class="text-danger">*</span></label>
                                                <br>
                                                <button type="button" class="btn btn-success btn-sm mb-3" id="btn-add">
                                                    New Drug
                                                </button>

                                                @if ($errors->any())
                                                    <div class="alert alert-danger alert-dismissible fade show">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                    </div>
                                                @endif

                                                <div id="input-container">

                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-primary btn-sm">
                                                        Add Prescription
                                                    </button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>

                        @if ($appoinment->Prescription)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <h4>Prescription</h4>
                                        <hr>
                                    </div>

                                    <div class="row mt-3">
                                        <strong class="mb-2">Doctor's Feedback</strong>
                                        <p>{{ $appoinment->Prescription->doctor_comment }}</p>

                                        <strong class="mb-2">Drugs</strong>
                                        <ul style="list-style: none">
                                            @foreach ($appoinment->Prescription->PrescriptionDrugs as $prescriptionDrug)
                                                <li>{{ $prescriptionDrug->Drug->name }} X
                                                    {{ $prescriptionDrug->quantity }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <h4>Patient's History</h4>
                                    <hr>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Doctor</th>
                                                <th scope="col">Specialize</th>
                                                <th scope="col">Time Slot</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Disease</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($patient_history as $key => $history)
                                                <tr>
                                                    <th>{{ $key + 1 }}</th>
                                                    <td>{{ $history->Doctor->name }}</td>
                                                    <td>{{ $history->Doctor->doctor_specialization->name }}</td>
                                                    <td>{{ $history->TimeSlot->slot }}</td>
                                                    <td>{{ $history->date }}</td>
                                                    <td>{{ $history->status }}</td>
                                                    <td>{{ $history->disease }}</td>
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

@section('scripts')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#btn-add').on('click', function() {

                const inputRow = $('<div class="input-row">');

                inputRow.append(
                    '<div class="row mt-3"><div class="col-md-4"><label class="form-label">Drug</label><select name="drugs[]" class="form-control" required><option value="">Select the Drug</option>@foreach ($drugs as $drug)<option value="{{ $drug->id }}" @disabled($drug->quantity == 0)>{{ $drug->name }} ({{ $drug->quantity }} Available)</option>@endforeach </select></div><div class="col-md-4"><label class="form-label">Quantity</label><input type="text" class="form-control" name="quantities[]" placeholder="Quantity" required/></div><div class="col-md-2"><label for=""></label></div></div><button type="button" class="btn btn-danger btn-sm btn-remove mt-4">Remove</button>'
                );

                $('#input-container').append(inputRow);

                $('.btn-remove').on('click', function() {
                    $(this).parent().remove();
                });
            });
        });
    </script>

@endsection
