@extends('backend.layouts.app')

@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Prescriptions</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Patient</th>
                                        <th>Doctor</th>
                                        <th>Appointment Date</th>
                                        <th>Doctor's Feeback</th>
                                        <th class="text-center">Drugs</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $key => $booking)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $booking->User->name }}</td>
                                            <td>{{ $booking->Doctor->name }}</td>
                                            <td>{{ $booking->date }}</td>
                                            <td>{{ $booking->Prescription->doctor_comment }}</td>
                                            <td>
                                                <ul style="list-style: none">
                                                    @foreach ($booking->Prescription->PrescriptionDrugs as $drug)
                                                        <li>{{ $drug->Drug->name }} x {{ $drug->quantity }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>{{ $booking->status }}</td>
                                            <td class="text-center">
                                                @if ($booking->status == 'consulted')
                                                    <a href="{{ route('admin.drugs.issue', $booking->id) }}"
                                                        class="btn btn-outline-success btn-sm" id="issued">
                                                        Mark as issued
                                                    </a>
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
@endsection
