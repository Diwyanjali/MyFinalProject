@extends('layouts.master')

@section('title', 'Medical Center')

@section('content')
    <div class="main-wrapper pb-5 px-5">
        <div class="page-wrapper full-page">
            <div class="page-content">

                <div class="row text-center mb-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light">Our Doctors</h1>
                        <p class="lead text-body-secondary">
                            Embrace a holistic approach to health and wellness, where our experienced practitioners blend
                            traditional Ayurvedic therapies with modern techniques
                        </p>
                    </div>
                </div>

                <div class="row mb-5 align-items-end">
                    <div class="col-12">
                        <form class="row g-3 justify-content-center" method="GET"
                            action="{{ route('web.medical_center.index') }}">

                            <!--search by name-->
                            <div class="col-auto">
                                <input type="text" name="keyword" class="form-control" value="{{ request('keyword') }}" placeholder="Search by name">
                            </div>

                            <!--Specialization-->
                            <div class="col-auto">
                                <select name="specialization" class="form-control">
                                    <option value="">Select the specialization</option>
                                    @foreach ($specializations as $specialization)
                                        <option value="{{ $specialization->id }}" @selected($specialization->id == request('specialization'))>
                                            {{ $specialization->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-auto">
                                <button type="submit" class="btn btn-outline-primary mb-3">Search</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row w-100 mx-0 auth-page">
                    @if (count($doctors))
                        @foreach ($doctors as $doctor)
                            <div class="col-md-3">
                                <div class="card mb-4 rounded-3 shadow-sm">
                                    <div class="card-body">
                                        <h4 class="card-title pricing-card-title">
                                            {{ $doctor->name }}
                                        </h4>

                                        <i class="mt-3 mb-3">
                                            {{ $doctor->doctor_specialization->name }}
                                        </i>

                                        <p class="card-title">
                                            {{ $doctor->description }}
                                        </p>

                                        <a href="{{ route('web.medical_center.channel', $doctor->code) }}"
                                            class="btn btn-sm btn-outline-primary">
                                            Consult
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center">
                            <h4>No Doctors Found</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
