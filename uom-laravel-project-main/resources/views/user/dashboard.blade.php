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
                                    <h5> Profile Infromation</h5>
                                    <hr>
                                </div>

                                <form action="{{ route('user.updateProfile') }}" method="post">
                                    @csrf
                                    <div class="row">

                                        <!--name-->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="doctor_shedule" class="form-label">Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="Name" name="name" value="{{ $user->name }}">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <!--Email-->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="doctor_shedule" class="form-label">E-mail <span
                                                        class="text-danger">*</span></label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="E-mail" name="email" value="{{ $user->email }}"
                                                    disabled>
                                                @error('email')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!--phone-->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="doctor_shedule" class="form-label">Phone <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('phone') is-invalid @enderror"
                                                    placeholder="Phone" name="phone" value="{{ $user->phone }}">
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!--nic-->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="doctor_shedule" class="form-label">NIC <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('nic') is-invalid @enderror"
                                                    placeholder="NIC" name="nic" value="{{ $user->nic }}">
                                                @error('nic')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!--dob-->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="doctor_shedule" class="form-label">Birthday <span
                                                        class="text-danger">*</span></label>
                                                <input type="date"
                                                    class="form-control @error('dob') is-invalid @enderror" placeholder=""
                                                    name="dob" value="{{ $user->dob }}">
                                                @error('dob')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!--address-->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="doctor_shedule" class="form-label">Address <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('address') is-invalid @enderror"
                                                    placeholder="Address" name="address" value="{{ $user->address }}">
                                                @error('address')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>


                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
