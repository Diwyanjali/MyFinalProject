@extends('layouts.master')

@section('title', 'Feedbacks')

@section('content')
    <div class="main-wrapper pb-5 px-5">
        <div class="page-wrapper full-page">
            <div class="page-content">
                <div class="row">
                    <div class="col-md-3">
                        @include('user.menu')
                    </div>

                    <div class="col-md-9">

                        @include('layouts.flash_message')

                        <div class="card">
                            @if (!$feedback)
                                <div class="card-body">
                                    <div class="row">
                                        <h5> Feedback to Arogya Hela Uyana</h5>
                                        <hr>
                                    </div>

                                    <form action="{{ route('user.reviews.post') }}" method="post">
                                        @csrf

                                        <!--service-->
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <label for="doctor_shedule" class="form-label">Service <span
                                                        class="text-danger">*</span></label>
                                                <select name="service"
                                                    class="form-control @error('service') is-invalid @enderror">
                                                    <option value="">Select the Service</option>
                                                    <option value="Hotel Service" @selected(old('service') == 'Hotel Service')>Hotel Service
                                                    </option>
                                                    <option value="Medical Service" @selected(old('service') == 'Medical Service')>Medical
                                                        Service</option>
                                                    <option value="Both" @selected(old('service') == 'Both')>Both</option>
                                                </select>
                                                @error('service')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!--comment-->
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <label for="doctor_shedule" class="form-label">Your Feedback <span
                                                        class="text-danger">*</span></label>
                                                <textarea name="feedback" class="form-control @error('feedback') is-invalid @enderror" cols="30" rows="5"
                                                    placeholder="Your Feedback">{{ old('feedback') }}</textarea>
                                                @error('feedback')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <div class="card-body">
                                    <div class="row">
                                        <h5> Feedback to Arogya Hela Uyana</h5>
                                        <hr>
                                    </div>

                                    <p>Service :
                                        @if ($feedback->service == 'Medical Service')
                                            {{ $feedback->service }}
                                        @elseif ($feedback->service == 'Hotel Service')
                                            {{ $feedback->service }}
                                        @else
                                            Medical & Hotel Service
                                        @endif
                                    </p>

                                    <p>Comment :</p>

                                    <p><i>{{ $feedback->comment }}</i></p>

                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                        data-bs-target="#modal-delete" data-id="{{ $feedback->id }}">
                                        Delete this feedback
                                    </button>
                                </div>
                            @endif
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
                <form action="{{ route('user.reviews.remove', '0') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h3 class="modal-title text-center fs-5" id="staticBackdropLabel">Confirm to delete ?</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id" value="">
                        Are you sure to delete your feedback ?
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
