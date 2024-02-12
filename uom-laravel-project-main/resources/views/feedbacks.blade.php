@extends('layouts.master')

@section('title', 'Feedbacks')

@section('content')
    <div class="main-wrapper pb-5 px-5">
        <div class="page-wrapper full-page">
            <div class="page-content">

                <div class="row text-center mb-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light">Customer Feedbacks</h1>
                        <p class="lead text-body-secondary">
                            Voice your thoughts, shape better experiences. Customer Feedbacks - Empowering change through
                            your feedback.
                        </p>
                    </div>
                </div>

                <div class="row mb-5 justify-content-center">
                    @foreach ($feedbacks as $feedback)
                        <div class="col-8 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4>{{ $feedback->User->name }}</h4>
                                    <i>{{ $feedback->comment }}</i>
                                    <p class="mt-2">
                                        @if ($feedback->service == 'Medical Service')
                                            {{ $feedback->service }}
                                        @elseif ($feedback->service == 'Hotel Service')
                                            {{ $feedback->service }}
                                        @else
                                            Medical & Hotel Service
                                        @endif
                                        | {{ $feedback->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
