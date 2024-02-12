@extends('layouts.master')

@section('title', 'Welcome')

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
                                    <h5> Medical Bookings</h5>
                                    <hr>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col" style="width: 25%">Doctor</th>
                                                <th scope="col" style="width: 25%">Specialization</th>
                                                <th scope="col" style="width: 25%">Time Slot</th>
                                                <th scope="col" style="width: 35%">Disease</th>
                                                <th scope="col" style="width: 15%">Status</th>
                                                <th scope="col" style="width: 25%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            @foreach ($bookings as $key => $booking)
                                                <tr>
                                                    <th>{{ $key + 1 }}</th>
                                                    <td>{{ $booking->Doctor->name }}</td>
                                                    <td>{{ $booking->Doctor->doctor_specialization->name }}</td>
                                                    <td>{{ $booking->TimeSlot->slot }}</td>
                                                    <td style="width:400px">{{ $booking->disease }}</td>
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
                <form action="{{ route('user.bookings.medical.cancel', '0') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h3 class="modal-title text-center fs-5" id="staticBackdropLabel">Confirm to Cancel ?</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id" value="">
                        Are you sure to Cancel this Appointment ?
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