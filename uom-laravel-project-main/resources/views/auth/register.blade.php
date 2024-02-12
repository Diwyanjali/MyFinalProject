@extends('layouts.master')

@section('title', 'Register')

@section('content')
    <div class="main-wrapper pb-5">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">

                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="auth-form-wrapper px-4 py-5">
                                <form class="forms-sample" method="post" action="{{ route('register') }}">
                                    @csrf

                                    <div class="row text-center">
                                        <a href="#" class="noble-ui-logo logo-light d-block mb-2">
                                            Arogya Hela <span>Management</span>
                                        </a>

                                        <h5 class="text-muted fw-normal mb-4">
                                            Welcome back! Register to continue.
                                        </h5>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <!--Name-->
                                            <div class="mb-3">
                                                <label for="userEmail" class="form-label">
                                                    Name <span class="text-danger">*</span>
                                                </label>
                                                <input type="text"
                                                    class="form-control  @error('name') is-invalid @enderror "
                                                    id="name" placeholder="Name" name="name"
                                                    value="{{ old('name') }}">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <!--Phone-->
                                            <div class="mb-3">
                                                <label for="userEmail" class="form-label">
                                                    Phone <span class="text-danger">*</span>
                                                </label>
                                                <input type="text"
                                                    class="form-control  @error('phone') is-invalid @enderror "
                                                    id="phone" placeholder="Phone" name="phone"
                                                    value="{{ old('phone') }}">
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <!--Address-->
                                            <div class="mb-3">
                                                <label for="userEmail" class="form-label">
                                                    Address <span class="text-danger">*</span>
                                                </label>
                                                <input type="text"
                                                    class="form-control  @error('address') is-invalid @enderror "
                                                    id="address" placeholder="Address" name="address"
                                                    value="{{ old('address') }}">
                                                @error('address')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <!--NIC-->
                                            <div class="mb-3">
                                                <label for="userEmail" class="form-label">
                                                    NIC <span class="text-danger">*</span>
                                                </label>
                                                <input type="text"
                                                    class="form-control  @error('nic') is-invalid @enderror " id="nic"
                                                    placeholder="NIC" name="nic" value="{{ old('nic') }}">
                                                @error('nic')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <!--DOB-->
                                            <div class="mb-3">
                                                <label for="userEmail" class="form-label">
                                                    Birthday <span class="text-danger">*</span>
                                                </label>
                                                <input type="date"
                                                    class="form-control  @error('dob') is-invalid @enderror " id="nic"
                                                    placeholder="DOB" name="dob" value="{{ old('dob') }}">
                                                @error('dob')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <!--Email-->
                                            <div class="mb-3">
                                                <label for="userEmail" class="form-label">
                                                    E-mail <span class="text-danger">*</span>
                                                </label>
                                                <input type="email"
                                                    class="form-control  @error('email') is-invalid @enderror "
                                                    id="nic" placeholder="Email" name="email"
                                                    value="{{ old('email') }}">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <!--password-->
                                            <div class="mb-3">
                                                <label for="userPassword" class="form-label">
                                                    Password <span class="text-danger">*</span>
                                                </label>
                                                <input type="password"
                                                    class="form-control  @error('password') is-invalid @enderror"
                                                    id="password" autocomplete="current-password" placeholder="Password"
                                                    name="password">
                                                @error('password')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <!--confirm password-->
                                            <div class="mb-3">
                                                <label for="userPassword" class="form-label">
                                                    Confirm Password' <span class="text-danger">*</span>
                                                </label>
                                                <input type="password"
                                                    class="form-control  @error('password_confirmation') is-invalid @enderror"
                                                    id="password" autocomplete="current-password"
                                                    placeholder="Confirm Password'" name="password_confirmation">
                                                @error('password_confirmation')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row text-center mt-5">
                                        <div>
                                            <button type="submit"
                                                class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                                                Register
                                            </button>
                                        </div>

                                        <a href="{{ route('login') }}" class="d-block mt-3 text-muted">
                                            Already registered? Login
                                        </a>
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
